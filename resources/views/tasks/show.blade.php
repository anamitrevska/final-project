@extends('layouts.app')
@section('content')
<div class="container justify-content-center col-md-6 bg-white rounded box-shadow layoutCards">   
    <div class="card card-height">
        <div class="card-header">
            {{$task->tasks_name}}
        </div>
        <div class="card-body">
            <div class="container border-bottom border-gray mb-2">
                <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-warning mx-2  customWidth" {{$disabled}}><a href="/tasks/edit/{{$task->id}}">Edit task</a></button>
                <form action="/tasks/closeStatus/{{$task->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-sm btn-info mx-2  customWidth" {{$disabled}}>Close task</button>
                </form>
                <form action="/tasks/{{$task->id}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-danger mx-2  customWidth" {{$disabled}}>Delete task</button>

                </form>
            </div>
            
                <div class="row m-2">
                    <div class="row  col-sm">
                        <p class="font-weight-bold mb-0">Created by:</p>
                        <p class="pl-2 mb-0">{{$createdByName}}</p>
                    </div>
                    <div class="row col-sm">
                        <p class="font-weight-bold mb-0">Created at:</p>
                        <p class="pl-2 mb-0">{{\Carbon\Carbon::parse($task->created_at)->isoFormat('D-M-YY HH:mm')}}</p>
                    </div>
                    <div class="row col-sm">
                        <p class="font-weight-bold mb-0">Last modified:</p>
                        <p class="pl-2 mb-0">{{\Carbon\Carbon::parse($task->updated_at)->isoFormat('D-M-YY HH:mm')}}</p>
                    </div>
                </div>
            </div>

            <!-- Task assigned -->

            <div class="container m-1 ">
                <div class="row">
                    <div class="row m-1 col-sm">
                        <p class="font-weight-bold mb-0">Team:</p>
                        <p class="pl-2 mb-0">{{$teamsName}}</p>
                    </div>
                    <div class="row m-1 col-sm">
                        <p class="font-weight-bold mb-0">Assigned to:</p>
                        <p class="pl-2 mb-0">{{$assignedTo}}</p>
                    </div>
                    <div class="row m-1 col-sm">
                        <button type="button" class="btn btn-secondary btn-sm col-sm mb-0"
                            style="height: fit-content;" data-toggle="modal" data-target="#forwardTask" {{$disabled}}>Forward
                            task</button>
                    </div>
                </div>
            </div>

            <!-- Status -->
            <form action="/tasks/changeStatus/{{$task->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="container mb-2 ml-2">
                    <div class="form-inline">
                        <label class="my-1 mr-2 font-weight-bold" for="currentStatus">Status:</label>
                        <select class="custom-select my-1 mr-sm-2" id="currentStatus" name="currentStatus" onchange="changeStatus()" value={{$currentStatus}} {{$disabled}}>
                            @foreach ($statusarray as $status)
                                <option {{$status == $currentStatus ? 'selected' : ''}} value="{{$status}}">{{$status}}</option>               
                            @endforeach                     
                        </select>

                        <button type="submit" class="btn btnIcon" id="confirmBtn" style="display: none"><i class="fas fa-check-square fa-lg"></i></button>
                        <button class="btn btnIcon" id="cancelBtn" style="display: none"><i class="fas fa-window-close fa-lg"></i></button>               
                    </div>
                </div>
        </form>

            <!-- Task description -->

            <div class="container m-2">
                <p class="font-weight-bold mb-1">Task description:</p>
                <p class="mb-0 p-2 border rounded" id="taskDesc" onclick="editTaskDesc();"> {!!nl2br($task->description)!!}</p>
                <form action="/tasks/update/{{$task->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <div style="display: none" id="taskDescEdit">
                        <textarea class="form-control"  name="taskNote"  @error('taskNote') is-invalid @enderror rows="3">{{$task->description}}</textarea>
                        @error('taskNote')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <small class="d-block text-right mt-3">
                            <button type="submit" class="linkBtn">Save</button>
                            <button type="button" class="linkBtn" onclick="cancelEditText()">Cancel</button>
                        </small>
                    </div>
                </form>

            </div>

            <!-- Attached files -->

            <div class="container m-2">
                <p class="font-weight-bold mb-1">Attached files:</p>
                @foreach ($files as $file)
                <div class="row">
                    <div class="col-md-7"><a href="/tasks/download/{{$file->name}}">{{$file->name}}</a></div>
                    <div class="col-md-5">
                        <small class="dateTime" style="float: right;">
                        {{ \Carbon\Carbon::parse($file->created_at)->isoFormat('MMM Do YYYY, h:mm a')}}
                        </small>
                    </div>
                </div>
                    
                @endforeach

                <form action="/tasks/uploadFile/{{$task->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-file my-2 col-md-6">
                        <input type="file" class="custom-file-input" id="customFile" name="filename">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <button type="submit" class="btn btn-sm btn-danger  customWidth" id="uploadBtn" style="display: none">Upload</button>
                </form>
            </div>

            <!-- Comment section  -->

            <div class="m-2 p-3 bg-white rounded box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-0">Comment section</h6>

                @foreach ($allComments as $comment)

                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="37x37"
                        class="mr-2 rounded img-comment"
                        src="../img/avatar/{{$comment->avatar}}"
                        data-holder-rendered="true">
                    <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-gray" id="theText_{{$comment->id}}">
                        <strong class="d-block text-gray-dark">{{$comment->userName}} <span style="margin-left:4px">{{ \Carbon\Carbon::parse($comment->created_at)->isoFormat('MMM Do YYYY, h:mm a')}}</span></strong>
                        <span >{!!nl2br($comment->comment_desc)!!}</span>
                        @if ($userA->id==$comment->created_by)
                        <small class="d-block text-right mt-3">
                            <button class="linkBtn" {{$disabled}} onclick="doEdit({{$comment->id}});">Edit Comment</button>
                        </small>  
                        @endif
                        
                    </p>

                    {{-- the edit comment part --}}

                    <form action="/tasks/editcomment/{{$task->id}}/{{$comment->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-gray" id="editor_{{$comment->id}}" style="display: none">
                                <strong class="d-block text-gray-dark"><?php echo urldecode('%40')?>{{Auth::user()->name}}</strong>
                                <textarea id='editComment_{{$comment->id}}' class="form-control" name="editComment" cols="90" rows="3" oninput="onTextareaInput(event);">{{$comment->comment_desc}}</textarea>
                                <small class="d-block text-right mt-3">
                                    <button type="submit" class="linkBtn">Save comment</button>
                                    <button type="button" class="linkBtn" onclick="cancelEdit({{$comment->id}})">Cancel</button>
                                </small>
                        </p>
                    </form>
                </div>

                @endforeach
                   
                <form action="/tasks/addcomment/{{$task->id}}" method="post">
                    @csrf
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&amp;bg=6f42c1&amp;fg=6f42c1&amp;size=1" alt="37x37"
                            class="mr-2 rounded img-comment"
                            src="../img/avatar/{{$userA->avatar}}"
                            data-holder-rendered="true">
                            <p class="media-body pb-2 mb-0 small lh-125 ">
                                <strong class="d-block text-gray-dark"><?php echo urldecode('%40')?>{{Auth::user()->name}}</strong>
                                <textarea class="form-control" name="addComment" id="" cols="90" rows="1" placeholder="Add Comment.." oninput="onTextareaInput(event);"></textarea>
                            </p>
                    </div>
                    <small class="d-block text-right mt-3">
                        <button type="submit" class="btn btn-primary btn-sm " {{$disabled}}>Add comment</button>
                    </small>
                </form>
            </div>

        </div>
    </div>

    <!-- Modal for forward task button-->

    <div class="modal fade" id="forwardTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/tasks/forward/{{$task->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Forward task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">                
                        <div class="form-group">
                            <label for="selectTeam">Select Team</label>
                            <select class="form-control" id="selectTeam" name="selectTeam" onchange="returnUsers()">
                                <option disabled selected></option>
                                @foreach ($teams as $team)
                                <option value="{{$team->id}}">{{$team->teams_name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selectTeam">Select user</label>
                            <select class="form-control" id="teamUsers" name="teamUsers">
                        
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="forwardComment">Comment</label>
                            <textarea class="form-control" name="forwardComment" id="forwardComment" rows="3"></textarea>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  

@endsection


