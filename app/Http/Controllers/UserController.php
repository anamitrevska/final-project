<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Team;
use Illuminate\Support\Facades\Auth;
use App\User_team_relation;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;


class UserController extends Controller
{
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' =>['sometimes','image','mimes:jpg,jpeg,png,bmp,svg','max:5000'],
        ]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id){
        $userA= Auth::user();
        $user=User::findorfail($id);
        $user_teams = DB::table('user_team_relations')
        ->join('teams', 'user_team_relations.teamId', '=', 'teams.id')
        ->where('user_team_relations.userId',$id)
        ->whereNull('teams.deleted_at')
        ->select('teams.*','user_team_relations.created_at as date_added','user_team_relations.id as relation_id')
        ->get();
        $createdByName=User::where('id',$user->created_by)->value('name');
        return view('users.show',['user'=>$user,'user_teams'=>$user_teams,'createdByName'=>$createdByName,'userA'=>$userA]);

    }

    public function removeTeam($id){
        $relation=User_team_relation::findorfail($id);
        $userId=$relation->userId;
        $relation->delete();
        $path='/users/'.$userId;
       return redirect($path);
    }

    public function destroy($id){
   
        $user=User::findorfail($id);
        $user->delete();
        $deletedTime=$user->deleted_at;
        $relation=new User_team_relation();
        $relation::where('userId', $id)
        ->update(['deleted_at' => $deletedTime]);
        return redirect('/home');
    }



    public function showList(){
        $userA= Auth::user();
        $users=User::paginate(8);
        return view('users.list',['users'=>$users,'userA'=>$userA]);
    }

    public function searchUsers(){
        $userA= Auth::user();
        $param=request("searchParam");
        // $users = User::where('name','LIKE','%'.$param.'%')->orWhere('email','LIKE','%'.$param.'%')->paginate(8,['*'],'users');
        $users=DB::table('users')
        ->where('name','LIKE','%'.$param.'%')
        ->orWhere('email','LIKE','%'.$param.'%')
        ->select('*')
        ->paginate(8,['*'],'users');
        $users->appends(['searchParam' => $param]);
        if(count($users) > 0)
        return view('users.list',['users'=>$users,'userA'=>$userA])->withDetails($users)->withQuery ( $param );
        else 
        return view ('users.list',['userA'=>$userA])->withMessage('No Details found. Try to search again !');


    }


    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();

    }


    public function edit($id){
        
        $user=User::findorfail($id);
        $user_teams = DB::table('user_team_relations')
        ->join('teams', 'user_team_relations.teamId', '=', 'teams.id')
        ->where('user_team_relations.userId',$id)
        ->whereNull('teams.deleted_at')
        ->select('teams.*','user_team_relations.created_at as date_added','user_team_relations.id as relation_id')
        ->get();
        $createdByName=User::where('id',$user->created_by)->value('name');
        return view('users.edit',['user'=>$user,'user_teams'=>$user_teams,'createdByName'=>$createdByName]);

    }

    public function update($id){
        $user=User::findorfail($id);
        if(request()->has('addProfilePicture')){
            $avatarUpload = request()->file('addProfilePicture');
            $avatarName = time() . '.'.$avatarUpload->getClientOriginalExtension();
            $avatarPath = public_path('/img/avatar');
            $avatarUpload -> move($avatarPath,$avatarName);
            $user->name = request('editName');
            $user->email = request('editEmail');
            $user->isAdmin = request('userType');
            $user->avatar = $avatarName;
            $user->save();
        }
        else{
            $user->name = request('editName');
            $user->email = request('editEmail');
            $user->isAdmin = request('userType');
            $user->save();

        }
     return redirect('users/'.$user->id);

    }

    
}
