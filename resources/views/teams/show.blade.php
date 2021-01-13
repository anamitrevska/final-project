@extends('layouts.app')
@section('content')
<div class="container justify-content-center col-md-6 bg-white rounded box-shadow layoutCards">
    <div class="card card-height">
        <div class="card-header">
           {{$team->teams_name}}
        </div>

        <div class="card-body">

            <div class="container border-bottom border-gray mb-2">
                @if ($userA->isAdmin==='on')
                <div class="d-flex">
                    <a href="/teams/edit/{{$team->id}}" class="button btn btn-sm btn-warning customWidth">Edit team</a>
                        <button type="button" class="btn btn-sm btn-info mx-2  customWidth" data-toggle="modal" data-target="#addUsersToTeam">Add users
                            to team</button>                  
                    <form action="/teams/{{$team->id}}" method="post">
                        @csrf
                        @method('DELETE')
    
                        <button type="submit" class="btn btn-sm btn-danger mx-2  customWidth">Delete team</button>

                    </form>
                </div>
                @endif
                
                <div class="row">
                    <div class="row m-2 col-sm">
                        <p class="font-weight-bold mb-0">Created by:</p>
                        <p class="pl-2 mb-0">{{$createdByName}}</p>
                    </div>
                    <div class="row my-2 col-sm">
                        <p class="font-weight-bold mb-0">Created at:</p>
                        <p class="pl-2 mb-0">{{\Carbon\Carbon::parse($team->created_at)->isoFormat('D-M-YY HH:mm')}}</p>
                    </div>
                     <div class="row my-2 col-sm">
                        <p class="font-weight-bold mb-0">Last modified:</p>
                        
                        <p class="pl-2 mb-0">{{\Carbon\Carbon::parse($team->updated_at)->isoFormat('D-M-YY HH:mm')}}</p>
                    </div>
                
                </div>
                <h6 class="m-2">Team description:</h6>
                <div class="m-2 border border-secondary rounded">
                    <p class="m-2">{{$team->description}}</p>
                </div>


                <!-- Users in this team  -->

                <div class="m-2 mt-3 bg-white rounded box-shadow">
                    <h6 class=" pb-2 mb-0">Users in this team :</h6>
                    <div class="table-responsive-md">
                        <table class="table table_users">

                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Date Added</th>
                                    <th scope="col"></th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($usersInTeam as $user)                                   
                                <tr>
                                    <td scope="col">{{$user->name}}</td>
                                    <td scope="col">{{$user->email}}</td>
                                    <td scope="col">{{\Carbon\Carbon::parse($user->date_added)->isoFormat('D-M-YY HH:mm')}}</td>
                                    @if ($userA->isAdmin==='on')
                                    <td scope="col">
                                        <form action='/teams/removeUser/{{$user->relation_id}}' method="post">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn btn-light btn-sm">Remove user</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach                            
                            </tbody>     
                        </table>
                        <div class="d-flex justify-content-center" style="font-size: 0.7rem;">
                            {!! $usersInTeam->render()!!}
                            {{-- {{ $mytasks->append(['alltasks1'=>$alltasks->currentPage()])->links()}} --}}
        
                        </div>
                    </div>
                </div>


            </div>
    </div>
</div>

<!-- Modal for button add users to team -->

<div class="modal fade" id="addUsersToTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Select Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="/teams/addUser" method="post">
                    @csrf
                <select class="custom-select" multiple name="userId">
                    <option disabled>Users</option>
                    @foreach ($otherusers as $otheruser)
                    <option value="{{$otheruser->id}}">{{$otheruser->email}}</option>
                    @endforeach
                </select>
            <input type="hidden" name ="teamId" value="{{$team->id}}">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
    </div>
</div>   
@endsection
        