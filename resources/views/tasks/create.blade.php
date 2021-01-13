@extends('layouts.app')
@section('content')
<div class="container justify-content-center col-md-6 bg-white rounded box-shadow layoutCards">
    <div class="card card-height">
        <div class="card-header">
            Create Task
        </div>
        <div class="card-body">
            <form action="/tasks" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="taskName">Task name:</label>
                    <input type="text" class="form-control" id="taskName" name="taskName"  @error('taskName') is-invalid @enderror" placeholder="Task Name" required>
                        @error('taskName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="form-inline">
                    <label class="my-1 mr-2" for="selectedTeam">Select team:</label>
                    <select class="custom-select my-1 mr-sm-2" id="selectTeam" name="selectTeam" onchange="returnUsers()">
                        <option selected disabled>Choose...</option>
                        @foreach ($teams as $team)
                        <option value="{{$team->id}}">{{$team->teams_name}}</option>
                        @endforeach
                    
                    </select>
                    <label class="my-1 mr-2" for="selectedUser">Select user:</label>
                    <select class="custom-select my-1 mr-sm-2" id="teamUsers" name="teamUsers">
                  
                    </select>                            
                   
                </div>
    
                <div class="form-group">
                    <label for="taskNote">Task description:</label>
                    <textarea class="form-control" id="taskNote" name="taskNote"  @error('taskName') is-invalid @enderror rows="3"></textarea>
                    @error('taskNote')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
    
            <div class="form-group">
                <div class="custom-file my-2 col-md-6">
                    <input type="file" class="custom-file-input" id="customFile" name="file">
                    <label class="custom-file-label" for="customFile">Attach files</label>
                </div>
            </div>
            <button type="submit" class="button btn btn-sm btn-warning customWidth">Save</button>
            <a href="/tasks/list"  class="button btn btn-sm btn-warning customWidth" >Close</a>
            </form>
        </div>
    </div>
</div>


@endsection
        