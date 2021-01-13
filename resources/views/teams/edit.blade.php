@extends('layouts.app')
@section('content')
<div class="container justify-content-center col-md-6 bg-white rounded box-shadow layoutCards">
    <div class="card card-height">
        <div class="card-header">
           {{$team->teams_name}}
        </div>
        <div class="card-body">

            <div class="container border-bottom border-gray mb-2">

                <form action="/teams/update/{{$team->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="d-flex">
                        <button type="submit" class="btn btn-sm btn-danger mx-2  customWidth">Save</button>
                        <a href="/teams/{{$team->id}}" class="button btn btn-sm btn-warning customWidth">Cancel</a>
                    </div>

                    <h6 class="m-2">Team name:</h6>
                    <div class="m-2">
                        <input type="text" class="form-control" id="teamsName" name="teamsName"  @error('teamsName') is-invalid @enderror" placeholder="Team's Name" required value="{{$team->teams_name}}">
                        @error('teamsName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <h6 class="m-2">Team description:</h6>
                    <div class="m-2">
                        <textarea class="form-control" id="teamNote" name="teamNote" rows="3" @error('teamNote') is-invalid @enderror" required>{{$team->description}}</textarea>
                        @error('teamNote')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </form>

                 <!-- Users in this team  -->
    
                 <div class="m-2 mt-3 bg-white rounded box-shadow">
                    <h6 class=" pb-2 mb-0">Users in this team :</h6>
                    <div class="table-responsive-md">
                        <table class="table table_users">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col"> <a href="#">Full Name</a></th>
                                    <th scope="col"><a href="#">Email</a></th>
                                    <th scope="col"><a href="#">Date Added</a></th>
                                    <th scope="col"><a></a></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usersInTeam as $user)
                                    <tr>
                                        <td scope="col">{{$user->name}}</td>
                                        <td scope="col">{{$user->email}}</th>
                                        <td scope="col">{{\Carbon\Carbon::parse($user->date_added)->isoFormat('D-M-YY HH:mm')}}</td>
                                        <td scope="col">
                                            <form action='/teams/removeUser/{{$user->relation_id}}' method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-light btn-sm">
                                                    Remove user
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach                              
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
    </div>
</div> 
@endsection