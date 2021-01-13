@extends('layouts.app')
@section('content')
<script src="{{ asset('js/comments.js')}}"></script>

<div class="container justify-content-center col-md-6 bg-white rounded box-shadow layoutCards">
    <div class="card card-height">
        <div class="card-header">
            {{$task->tasks_name}}
        </div>
        <div class="card-body">
            <div class="container border-bottom border-gray mb-2">

                <form action="/tasks/update/{{$task->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="d-flex">
                        <button type="submit" class="btn btn-sm btn-danger mx-2  customWidth">Save</button>
                        <a href="/tasks/{{$task->id}}" class="button btn btn-sm btn-warning customWidth">Cancel</a>
                    </div>
                    <h6 class="m-2">Task name:</h6>
                    <div class="m-2">
                        <input type="text" class="form-control" id="taskName" name="taskName"  @error('taskName') is-invalid @enderror" placeholder="Task Name" value="{{$task->tasks_name}}">
                            @error('taskName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <h6 class="m-2">Task description:</h6>
                    <div class="m-2">
                        <textarea class="form-control" id="taskNote" name="taskNote"  @error('taskNote') is-invalid @enderror rows="3">{{$task->description}}</textarea>
                        @error('taskNote')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

    
                </form>

            <!-- Comment section  -->

            <div class="m-2 p-3 bg-white rounded box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-0">Comment section</h6>

                @foreach ($allComments as $comment)

                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="37x37"
                        class="mr-2 rounded img-comment"
                        src="../../img/avatar/{{$comment->avatar}}"
                        data-holder-rendered="true">
                    <p class="media-body pb-2 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">{{$comment->userName}}</strong>
                        {!!nl2br($comment->comment_desc)!!}
                        <small class="d-block text-right mt-3">
                            <a href="#" {{$disabled}}>Edit Comment</a>
                        </small>
                    </p>
                    
                </div>

                @endforeach
                   
                <form action="/tasks/addcomment/{{$task->id}}" method="post">
                    @csrf
                    <div class="media text-muted pt-3">
                        <img data-src="holder.js/32x32?theme=thumb&amp;bg=6f42c1&amp;fg=6f42c1&amp;size=1" alt="32x32"
                            class="mr-2 rounded img-comment"
                            src="../../img/avatar/{{$userA->avatar}}"
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
    </div>

    <!-- Modal for forward task button-->

    <div class="modal fade" id="forwardTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/tasks/forward/{{$task->id}}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Forward task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
              
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="selectTeam">Select Team</label>
                        <select class="form-control" id="selectTeam" name="selectTeam">
                            <option disabled></option>

                            @foreach ($teams as $team)
                        <option value="{{$team->id}}">{{$team->teams_name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selectTeam">Select user</label>
                        <select class="form-control" id="selectTeam">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="forwardComment">Comment</label>
                        <textarea class="form-control" id="forwardComment" rows="3"></textarea>
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