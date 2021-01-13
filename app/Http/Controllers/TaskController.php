<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Task;
use App\Team;
use App\User;
use App\File;
use App\User_team_relation;
use App\TaskStatus;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show($id){
        $userA= Auth::user();
        $task=Task::findorfail($id);
        $team=Task::where('id',$id)->value('assigned_team');
        $teams_name=Team::where('id',$team)->value('teams_name');
        $createdByName=User::where('id',$task->created_by)->value('name');
        $assignedTo=User::where('id',$task->assigned_user)->value('name');
        $teams=Team::all();
        $allComments=DB::table('comments')
        ->join('users','users.id','=','comments.created_by')
        ->where('comments.task_id',$id)
        ->select('comments.*','users.name as userName','users.avatar as avatar')
        ->paginate(5);

        if ($task->status==='Closed') {
           $disabled='disabled';
        } else {
            $disabled='';       
        }

        $statusarray=['New','In progress','Pending','Resolved'];
        $currentStatus=$task->status;
        if($currentStatus!=='New'){
            $key = array_search('New', $statusarray);
            unset($statusarray[$key]);
        }

        $files=DB::table('files')
        ->where('task_id',$id)
        ->get();
        return view('tasks.show',
        ['task'=>$task,'teamsName'=>$teams_name,'teams'=>$teams,'createdByName'=>$createdByName,'assignedTo'=>$assignedTo,
        'allComments'=>$allComments,'disabled'=>$disabled,'statusarray'=>$statusarray,
        'currentStatus'=>$currentStatus,'files'=>$files,'userA'=>$userA]);
    }

    public function create(){
        $teams= Team::all();
        return view('tasks.create',['teams'=>$teams]);
    }

    public function store(Request $req){
        $id = Auth::user()->id;
        $task= new Task(); 
        $task->created_by=$id;
        $task->tasks_name=request('taskName');
        $task->assigned_team=request('selectTeam');
        $task->assigned_user=request('teamUsers');
        $task->status='New';
        $task->description=request('taskNote');
        $task->save();
        // $req->validate([
        //     'file' => 'required|mimes:csv,txt,xlx,xls,pdf'
        //     ]);
        $fileUpload = request()->file('file');
        $fileModel = new File;
    
        if(request()->has('file')) {
            $fileName = time().'_'.$fileUpload->getClientOriginalName();
            $filePath = $fileUpload->storeAs('uploads', $fileName, 'public');
            $fileModel->name = $fileName;
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->task_id=$task->id;
            $fileModel->user_id=$id;
            $fileModel->save();
        }
        return redirect('/tasks/'.$task->id);
    }

    public function destroy($id){

        $task=Task::findorfail($id);
        $task->delete();
        return redirect('/home');
    }

    public function closeStatus($id){
        $task=Task::findorfail($id);
        $task->status='Closed';
        $task->save();
        return redirect('/tasks/'.$id);
    }


    public function updateTeam($id){
        $task=Task::findorfail($id);
        $task->assigned_team=request('selectTeam');
        $task->save();
        $team=Task::where('id',$id)->value('assigned_team');
        $teams_name=Team::where('id',$team)->value('teams_name');
        $teams=Team::all();
        return view('tasks.show',['task'=>$task,'teamsName'=>$teams_name,'teams'=>$teams]);
    }


    public function edit($id){
        $userA= Auth::user();
        $task=Task::findorfail($id);
        $team=Task::where('id',$id)->value('assigned_team');
        $teams_name=Team::where('id',$team)->value('teams_name');
        $createdByName=User::where('id',$task->created_by)->value('name');
        $assignedTo=User::where('id',$task->assigned_user)->value('name');
        $teams=Team::all();

        $allComments=DB::table('comments')
        ->join('users','users.id','=','comments.created_by')
        ->where('comments.task_id',$id)
        ->select('comments.*','users.name as userName','users.avatar as avatar')
        ->paginate(5);

        if ($task->status==='Closed') {
           $disabled='disabled';
        } else {
            $disabled='';        }
        
        
        return view('tasks.edit',['task'=>$task,'teamsName'=>$teams_name,'teams'=>$teams,'createdByName'=>$createdByName,'assignedTo'=>$assignedTo,'allComments'=>$allComments,'disabled'=>$disabled,'userA'=>$userA]);
      }


    public function showList(){
        $tasks=DB::table('tasks')
        ->join('teams', 'tasks.assigned_team', '=', 'teams.id')
        ->join('users','users.id','=','tasks.assigned_user')
        ->whereNull('tasks.deleted_at')
        ->select('tasks.id','tasks.tasks_name','tasks.created_at','tasks.status','teams.teams_name as teamsName','users.name as userName')
        ->paginate(8);
        return view('tasks.list',['tasks'=>$tasks]);
    }

    public function searchTasks(){
        $param=request("searchTask");

        $tasks =DB::table('tasks')
        ->join('teams', 'tasks.assigned_team', '=', 'teams.id')
        ->join('users','users.id','=','tasks.assigned_user')
        ->whereNull('tasks.deleted_at')
        ->select('tasks.id','tasks.tasks_name','tasks.created_at','tasks.status','teams.teams_name as teamsName','users.name as userName')
        ->where(function ($query) {
            $param=request("searchTask");
            $query->where('tasks.tasks_name','LIKE','%'.$param.'%')->orWhere('tasks.description','LIKE','%'.$param.'%');
           }

        )->paginate(8);
        $tasks->appends(['searchTask' => $param]);
        if(count($tasks) > 0)
        return view('tasks.list',['tasks'=>$tasks])->withDetails($tasks)->withQuery ( $param );
        else return view ('tasks.list')->withMessage('No Details found. Try to search again !');
    }

    public function addComment($id){
        $comment=new Comment();
        $comment->comment_desc=request('addComment');
        $comment->created_by=Auth::user()->id;
        $comment->task_id=$id;
        $comment->save();
        return redirect('/tasks/'.$id);

    }

    public function update($id){
        $task=Task::findorfail($id);
        // $task->tasks_name=request('taskName');
        $task->description=request('taskNote');
        $task->save();
        return redirect('/tasks/'.$id);
    }

    public function editcomment($taskid,$id){
        $task=Task::findorfail($taskid);
        $comment=Comment::findorfail($id);
        $comment->comment_desc=request('editComment');
        $comment->save();
        return redirect('/tasks/'.$task->id);
    }

    public function changeStatus($id){
        $task=Task::findorfail($id);
        $task->status=request('currentStatus');
        $task->save();
        return redirect('/tasks/'.$id);

    }

    public function forwardTask($id)
    {
        $task=Task::findorfail($id);
        $task->assigned_team=request('selectTeam');
        $task->assigned_user=request('teamUsers');
        $comment=new Comment();
        $comment->comment_desc=request('forwardComment');
        $comment->created_by=Auth::user()->id;
        $comment->task_id=$id;
        $comment->save();
        $task->save();
        return redirect('/tasks/'.$id);
        
    }


    function getFile($filename){
    	$file=Storage::disk('public')->get('uploads/'.$filename);
 
		return (new Response($file, 200))
              ->header('Content-Type', 'application/docx');
    }

    function Upload($id){
        $fileUpload = request()->file('filename');
        $fileModel = new File;
    
        if(request()->has('filename')) {
            $user_id = Auth::user()->id;
            $fileName = time().'_'.$fileUpload->getClientOriginalName();
            $filePath = $fileUpload->storeAs('uploads', $fileName, 'public');
            $fileModel->name = $fileName;
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->task_id=$id;
            $fileModel->user_id=$user_id;
            $fileModel->save();
            return redirect('/tasks/'.$id);
        }
    }
}

