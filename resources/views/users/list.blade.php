@extends('layouts.app')
@section('content')

<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body ">
                    <div class="d-flex">
                    <i class="fas fa-users mx-3" style="font-size: 2.5rem; "></i>
                    <form action="/users" method="get" class="form-inline col-md-9 ">
                        @csrf
                        <div class="d-flex col-md-9 ">
                            <input class="form-control  col-md-9 ml-4 mb-3" id="myInput" name="searchParam" type="text" placeholder="Search.."  aria-label="Search">
                            <button class="btn btn-success mr-4 mb-3" type="submit">Search</button>
                        </div>
                    </form>
                    @if ($userA->isAdmin==='on')
                    <a href="/register" type="button" class="btn btn-info mx-1 mb-3 offset-md-4">New User</a>
                    @endif
                    </div>
                    <div class="table-responsive">
                 
                        @if (isset($users))
                   
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>User</span></th>
                                <th><span>Created</span></th>
                                <th><span>Status</span></th>
                                <th><span>Email</span></th>
                                <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                    
                                <tr>
                                    <td>
                                        <img src="../img/avatar/{{$user->avatar}}" alt="50x50" class="img-list">
                                    <a href="/users/{{$user->id}}" class="user-link">{{$user->name}}</a>
                                        @if ($user->isAdmin==='on')
                                        <span class="user-subhead">Administrator</span>
                                        @else
                                        <span class="user-subhead">Basic User</span>
                                        @endif
                                    </td>
                                    
                                    <td>{{\Carbon\Carbon::parse($user->created_at)->isoFormat('D-M-YY HH:mm')}}</td>
                                    <td >
                                        @if ($user->status==='1')

                                        <span class="badge badge-success">Active</span>

                                        @else

                                        <span class="badge badge-danger">Inactive</span>

                                        @endif
                                    </td>
                                    <td>
                                        <a href="#">{{$user->email}}</a>
                                    </td>
                                    <td style="width: 20%;">
                                    <a href="/users/{{$user->id}}" class="table-link text-warning">
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
                                {{ $users->links()}}
                                {{-- {{!! $users->appends(Request::all())->links() !!}} --}}

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