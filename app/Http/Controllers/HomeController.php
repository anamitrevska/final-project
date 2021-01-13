<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Task;
use App\Team;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;



use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        $id = Auth::user()->id;
        $mytasks = DB::table('tasks')
        ->join('teams', 'teams.id', '=', 'tasks.assigned_team')
        ->join('users','users.id','=','tasks.assigned_user')
        ->where('tasks.assigned_user',$id)
        ->whereNull('tasks.deleted_at')
        ->orderBy('created_at', 'desc')
        ->select('tasks.*', 'teams.teams_name as teams_name','users.name as user_name')
        ->paginate(7,['*'],'mytasks1');


        $alltasks=Task::all();
        $alltasks = DB::table('tasks')
        ->join('teams', 'teams.id', '=', 'tasks.assigned_team')
        ->join('users','users.id','=','tasks.assigned_user')
        ->whereNull('tasks.deleted_at')
        ->orderBy('created_at', 'desc')
        ->select('tasks.*', 'teams.teams_name as teams_name','users.name as user_name')
        ->paginate(7,['*'],'alltasks1');

        return view('home',['mytasks'=>$mytasks,'alltasks'=>$alltasks]);
    }

    public function index1()

    {
        $id = Auth::user()->id;
        $mytasks = DB::table('tasks')
        ->join('teams', 'teams.id', '=', 'tasks.assigned_team')
        ->join('users','users.id','=','tasks.assigned_user')
        ->where('tasks.assigned_user',$id)
        ->whereNull('tasks.deleted_at')
        ->orderBy('created_at', 'desc')
        ->select('tasks.*', 'teams.teams_name as teams_name','users.name as user_name')
        ->paginate(7,['*'],'mytasks1');


        $alltasks=Task::all();
        $alltasks = DB::table('tasks')
        ->join('teams', 'teams.id', '=', 'tasks.assigned_team')
        ->join('users','users.id','=','tasks.assigned_user')
        ->whereNull('tasks.deleted_at')
        ->orderBy('created_at', 'desc')
        ->select('tasks.*', 'teams.teams_name as teams_name','users.name as user_name')
        ->paginate(7,['*'],'alltasks1');

        return view('home1',['mytasks'=>$mytasks,'alltasks'=>$alltasks]);
    }
    
}
