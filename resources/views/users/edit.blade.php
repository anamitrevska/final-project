@extends('layouts.app')
@section('content')
<script src="{{ asset('js/addProfilePic.js')}}"></script>
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
            <div class="container border-bottom mr-2  border-gray mb-2">
                <form action="/users/{{$user->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="d-flex">
                        <button type="submit" class="btn btn-sm btn-danger mx-2 customWidth">Save</button>
                        <a href="/users/{{$user->id}}" class="button btn btn-sm btn-warning customWidth">Cancel</a>
                        <button type="button" class="btn btn-primary btn-sm mx-2 customWidth"
                            style="height: fit-content;" data-toggle="modal" data-target="#passwordChange">Change Password</button>
                    </div>
                                                    
                  
                    <div class="form-group row" style="margin-top:10px;">

                        <div class="col-md-5 form-group">
                            <div class=" img-container-user">
                                <img id="profileImage" src="../../img/avatar/{{$user->avatar}}" alt="Avatar" name ='avatar' class="image-user" style="border-radius: 10%; object-fit: cover;">
                                <div class="middle-user">
                                    <input id="addProfilePicture" type="file" class="form-control @error('addProfilePicture') is-invalid @enderror" name="addProfilePicture" hidden onchange="previewPicture(event)">
                                        @error('addProfilePicture')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    <button onclick="defaultBtnActive()" id="custom-btn" type="button" class="btn btn-sm btn-dark mx-2  customWidth">Add pic</button>
                                </div>
                            </div>
                        </div>    

                        <div class="col-md-7">
                            <table class="table ">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td> <input id="editName" type="text" class="form-control @error('editName') is-invalid @enderror" name="editName"  required value="{{$user->name}}">
                                            @error('editName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror</td>
                                        </tr>
                                    <tr>
                                        <td>User level</td>
                                        
                                        <td>
                                            <div class="row">
                                                <div style="margin:5px;margin-left: 38px;">
                                                    <input name="userType" type="radio" class="form-check-input" id="exampleCheck1" {{ ($user->isAdmin==='on') ? 'checked' : '' }} value='on'>
                                                    <label class="form-check-label" for="exampleCheck1">Admin</label>
                                                </div>
                                                <div style="margin: 5px;margin-left: 70px;">
                                                    <input name="userType"  type="radio" class="form-check-input" id="exampleCheck1" {{ ($user->isAdmin==='off') ? 'checked' : '' }} value='off'>
                                                    <label class="form-check-label" for="exampleCheck1">Basic</label>
                                                </div>
                                            </div>
                                        </td>
                                                                
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><input id="editEmail" type="email" class="form-control @error('editEmail') is-invalid @enderror" name="editEmail" required value="{{$user->email}}">
                                            @error('editEmail')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror</td>
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
                                            <input onchange="toggleStatus(event);" data-height="30" data-size="xs" data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ ($user->status=='1') ? 'checked' : '' }}>
                                        </td>
                                
                                    </tr>
                
                                    </tbody>
                            </table>
                        </div>
                        </div>
                    
                    </form>  


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
                                        <td scope="col" class="font-weight-normal">{{$user_teams->teams_name}}</td>
                                        <td scope="col">{{\Carbon\Carbon::parse($user_teams->date_added)->isoFormat('D-M-YY HH:mm')}}</td>
                                        <td scope="col">
                                            <form action='/users/removeTeam/{{$user_teams->relation_id}}' method="post">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="btn btn-light btn-sm">
                                                Remove team
                                            </button>
                                            </form>
                                        </td>
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

     <!-- Modal for change password-->

     <div class="modal fade" id="passwordChange" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <form action="/users/changepassword/{{$user->id}}" method="post">
                 @csrf
                 @method('PUT')
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">                
                            <label for="password">Password</label>
                            <input id="password" type="password" minlength="8" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm password" required autocomplete="new-password">

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