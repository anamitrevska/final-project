<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Team;
use App\Task;
use App\User;
use App\User_team_relation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class TeamController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('teams.create');
    }

    public function store(){
        $id = Auth::user()->id;
        $team= new Team();
        $team->teams_name=request('teamsName');;
        $team->description=request('teamNote');
        $team->created_by=$id;
        $team->save();
        return redirect('/teams/'.$team->id);
    }


    public function show($id){
        $userA= Auth::user();
        $team=Team::findorfail($id);
        $usersInTeam = DB::table('user_team_relations')
        ->join('users', 'user_team_relations.userId', '=', 'users.id')
        ->where('user_team_relations.teamId',$id)
        ->whereNull('users.deleted_at')
        ->select('users.*','user_team_relations.created_at as date_added','user_team_relations.id as relation_id')
        ->paginate(5,['*'],'alltasks1');    

        $teamsUsers= DB::table('user_team_relations')
        ->where('teamId',$id)
        ->select('user_team_relations.userId')
        ->get();

        $createdByName=User::where('id',$team->created_by)->value('name');
        $usersInthisTeam = DB::table('user_team_relations')
        ->join('users', 'user_team_relations.userId', '=', 'users.id')
        ->where('user_team_relations.teamId',$id)
        ->whereNull('users.deleted_at')
        ->select('users.id');

        $otherusers=DB::table('users')
           ->whereNotIn('id',$usersInthisTeam)
           ->whereNull('deleted_at')
           ->select('users.*')
           ->get();

        return view('teams.show',['team'=>$team,
        'usersInTeam'=>$usersInTeam,'otherusers'=>$otherusers,'createdByName'=>$createdByName,'userA'=>$userA]);
    }


    public function deleteUser($id){
        $relation=User_team_relation::findorfail($id);
        $relation->delete();
        $relationId=$relation->teamId;
        $path='/teams/'.$relationId;
        return redirect($path);

    }


    public function addUser(){

        $relation=new User_team_relation();
        $relation->userId=request('userId');
        $relation->teamId=request('teamId');
        $relation->save();
        return redirect('/teams/'.request('teamId'));

    }



    public function destroy($id){

        $team=Team::findorfail($id);
        $team->delete();
        $deletedTime=$team->deleted_at;
        $relation=new User_team_relation();
        $relation::where('teamId', $id)
          ->update(['deleted_at' => $deletedTime]);

        return redirect('/teams/list');
    }

    
    public function showList(){
        $userA= Auth::user();
        $teams=Team::paginate(8);
        return view('teams.list',['teams'=>$teams,'userA'=>$userA]);
    }


    public function searchTeams(){
        $userA= Auth::user();
        $param=request("searchTeams");
        $teams = Team::where('teams_name','LIKE','%'.$param.'%')->orWhere('description','LIKE','%'.$param.'%')->paginate(8);
        $teams->appends(['searchTeams' => $param]);
        if(count($teams) > 0)
        return view('teams.list',['teams'=>$teams,'userA'=>$userA])->withDetails($teams)->withQuery ( $param );
        else return view ('teams.list',['userA'=>$userA])->withMessage('No Details found. Try to search again !');
    }

    public function edit($id){
        
        $team=Team::findorfail($id);
        $usersInTeam = DB::table('user_team_relations')
        ->join('users', 'user_team_relations.userId', '=', 'users.id')
        ->where('user_team_relations.teamId',$id)
        ->whereNull('users.deleted_at')
        ->select('users.*','user_team_relations.created_at as date_added','user_team_relations.id as relation_id')
        ->get();

        $teamsUsers= DB::table('user_team_relations')
        ->where('teamId',$id)
        ->select('user_team_relations.userId')
        ->get();

        $createdByName=User::where('id',$team->created_by)->value('name');

        $otherusers=User::all();

        return view('teams.edit',['team'=>$team,'usersInTeam'=>$usersInTeam,'otherusers'=>$otherusers,'createdByName'=>$createdByName]);
    }


    public function update($id){

        $team=Team::findorfail($id);
        $team->teams_name=request('teamsName');;
        $team->description=request('teamNote');
        $team->save();
        return redirect('/teams/'.$team->id);

    }


    public function listUsers(Request $request){
        $teamId=$request->teamId;
        $usersInTeam = DB::table('user_team_relations')
        ->join('users', 'user_team_relations.userId', '=', 'users.id')
        ->where('user_team_relations.teamId',$teamId)
        ->where('users.status','1')
        ->whereNull('users.deleted_at')
        ->select('users.*')
        ->distinct()
        ->get();

        return $usersInTeam;
    }

}
