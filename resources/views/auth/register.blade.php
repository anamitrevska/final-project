@extends('layouts.app')
@section('content')
<script src="{{ asset('js/addProfilePic.js')}}"></script>

<div class="container justify-content-center col-md-6 bg-white rounded box-shadow layoutCards">
    <div class="card">
        <div class="card-header">Create User</div>
        <div class="card-body">                        
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row" style="margin-top:10px;">
                    <div class="col-md-5 form-group">
                        <div class=" img-container-user">
                            <img id="profileImage" src="../../img/avatar/default-avatar.jpg" alt="Avatar" name ='avatar' class="image-user" style="border-radius: 10%; object-fit: cover;">
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
                                    <td> <input id="editName" type="text" class="form-control @error('editName') is-invalid @enderror" name="name"  required placeholder="Full name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>Email</td>
                                    <td><input id="editEmail" type="email" class="form-control @error('editEmail') is-invalid @enderror" name="email" required placeholder="E-mail">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror</td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Confirm Password</td>
                                    <td>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm password" required autocomplete="new-password">

                                    </td>
                                </tr>
                                <tr>
                                    <td>User level</td>                                       
                                    <td>
                                        <div class="row">
                                            <div style="margin:5px;margin-left: 38px;">
                                                <input name="userType" type="radio" class="form-check-input" id="exampleCheck1" required>
                                                <label class="form-check-label" for="exampleCheck1" >Admin</label>
                                            </div>
                                            <div style="margin: 5px;margin-left: 70px;">
                                                <input name="userType"  type="radio" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Basic</label>
                                            </div>
                                        </div>
                                    </td>                                                              
                                </tr>          
                            </tbody>
                        </table>
                    </div>
                </div>
                    
                        {{-- <div class="col-md-5">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="col-md-5">
                            <label for="email">E-mail</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    
                            </div>
            
                        <div class="form-row justify-content-center form-group">
        
                            <div class="col-md-5">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
        
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
        
                            <div class="col-md-5">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm password" required autocomplete="new-password">
                            </div>    --}}
                
                            <div class="col-md-10">
                                <label for=""> Select Team</label></label>
                                <select class="form-control" name="UserTeam">
                                    @foreach ($teams as $team)
                                    <option value="{{$team->id}}">{{$team->teams_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                                            
                <button class="button btn btn-sm btn-dark m-3 customWidth" type="submit">Create user</button>
                <a href="/users/list" class="button btn btn-sm btn-warning customWidth">Cancel</a>            
            </form>
        </div>
    </div>
</div>
@endsection
