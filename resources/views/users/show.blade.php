@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

<div class="container justify-content-center col-md-6 bg-white rounded box-shadow layoutCards">
    <div class="card card-height">
        <div class="card-header">
            <i class="far fa-user"></i>
         User Information
        </div>

        <div class="card-body">
            <div class="container border-bottom border-gray mb-2">
                @if ($userA->isAdmin==='on')
                <div class="d-flex">
                    <a href="/users/edit/{{$user->id}}" class="button btn btn-sm btn-warning customWidth">Edit user</a>
                                       
                    <form action="/users/{{$user->id}}" method="post">
                        @csrf
                        @method('DELETE')
    
                        <button type="submit" class="btn btn-sm btn-danger mx-2 customWidth">Delete user</button>

                    </form>
                </div>
                @endif
                <div class="form-group row" style="margin-top:10px;">

                    <div class="col-md-5 img-container-user">
                        <img id="UserAvatar" src="../img/avatar/{{$user->avatar}}" alt="Avatar" name ='UserAvatar' class="image-user" style="border-radius: 10%; object-fit: cover;">
                    </div>

                    <div class="col-md-7">
                        <table class="table ">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{$user->name}}</td>
                                    </tr>
                                <tr>
                                    <td>User level</td>
                                    @if ($user->isAdmin==='on')
                                    <td>Administrator</td>
                                    @else
                                    <td>Basic User</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td>Registered since</td>
                                    <td>{{\Carbon\Carbon::parse($user->created_at)->isoFormat('D-M-YY HH:mm')}}</td>
                                </tr>
                                <tr>
                                    <td>Last modified</td>                             
                                    <td>{{\Carbon\Carbon::parse($user->updated_at)->isoFormat('D-M-YY HH:mm')}}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <input @if($userA->isAdmin==='off') disabled  @endif onchange="toggleStatus(event);" data-height="30" data-size="xs" data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ ($user->status=='1') ? 'checked' : '' }}>
                                    </td>
                            
                                </tr>
            
                                </tbody>
                        </table>
                    </div>
                    </div>
                
                

                    <!-- User's teams  -->

                    <div class="m-2 mt-3 bg-white rounded box-shadow">
                        <h6 class=" pb-2 mb-0">User belongs to this teams:</h6>
                        <div class="table-responsive-md">
                            <table class="table table_users">

                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Team's Name</th>
                                        <th scope="col">Date Added</th>
                                        <th scope="col"></th>

                                    </tr>
                            </thead>

                            <tbody>
                                @foreach ($user_teams as $user_teams)
 
                                <tr>
                                    <td scope="col">{{$user_teams->teams_name}}</td>   
                                    <td scope="col">{{\Carbon\Carbon::parse($user->created_at)->isoFormat('D-M-YY HH:mm')}}</td>
                                    @if ($userA->isAdmin==='on')
                                    <td scope="col">
                                        <form action='/users/removeTeam/{{$user_teams->relation_id}}' method="post">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-light btn-sm">
                                            Remove team
                                          </button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <script>
                    var timeout;
                    function toggleStatus(e) {
                        if(timeout) {
                            clearTimeout(timeout);
                        }
                        timeout = setTimeout(function() {
                            var status = e.target.checked ? 0 : 1;
                            var user_id = e.target.getAttribute('data-id');
                            console.log(e.target.checked, status, user_id);
                            fetch('/users/changeStatus', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    'status': status,
                                    'user_id': user_id
                                })
                            })
                            e.target.checked = !e.target.checked;
                        }, 50)
                    }
                  </script>
               
            </div>
        </div>
    </div>
</div>

@endsection