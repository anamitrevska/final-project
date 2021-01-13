@extends('layouts.app')
@section('content')

<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body ">
                    <div class="d-flex">
                    <i class="fas fa-tasks mx-3" style="font-size: 2.5rem; "></i>
                    <form action="/tasks/search" method="get" class="form-inline col-md-9 ">
                        @csrf
                        <div class="d-flex col-md-9 ">
                            <input class="form-control  col-md-9 ml-4 mb-3" id="myInput" name="searchTask" type="text" placeholder="Search.."  aria-label="Search">
                            <button class="btn btn-success mr-4 mb-3" type="submit">Search</button>
                        </div>
                    </form>
                    <a href="/tasks/create" type="button" class="btn btn-info mx-1 mb-3 offset-md-4">New Task</a>
                    </div>
                    <div class="table-responsive">
                        @if (isset($tasks))
                   
                        <table class="table list">
                            <thead>
                                <tr>
                                <th ><span>Name</span></th>
                                <th><span>Created</span></th>
                                <th ><span>Status</span></th>
                                <th ><span>Team</span></th>
                                <th><span>Assigend User</span></th>
                                <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                    
                                <tr>
                                    <td>
                                    <a href="/tasks/{{$task->id}}" class="user-link">{{$task->tasks_name}}</a>
                                       
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($task->created_at)->isoFormat('D-M-YY HH:mm')}}</td>
                                    <td>
                                       {{$task->status}}
                                    </td>
                                    <td>
                                        <a href="#">{{$task->teamsName}}</a>
                                    </td>
                                    <td>
                                        <a href="#">{{$task->userName}}</a>
                                    </td>
                                    <td style="width: 20%;" style="text-align: center">
                                    <a href="/tasks/{{$task->id}}" class="table-link text-warning">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                      
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                          {{-- Pagination --}}
                        <div class="d-flex justify-content-center">
                            {{ $tasks->links()}}
                        </div>
                        @elseif(isset($message))
                    <p class="noSearchResults">{{$message}}</p>
                        @endif
                        
                     
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection