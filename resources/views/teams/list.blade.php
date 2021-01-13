@extends('layouts.app')
@section('content')

<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body ">
                    <div class="d-flex">
                    <i class="fas fa-chalkboard-teacher mx-3" style="font-size: 2.5rem; "></i>
                    <form action="/teams/search" method="get" class="form-inline col-md-9 ">
                        @csrf
                        <div class="d-flex col-md-9 ">
                            <input class="form-control  col-md-9 ml-4 mb-3" id="myInput" name="searchTeams" type="text" placeholder="Search.."  aria-label="Search">
                            <button class="btn btn-success mr-4 mb-3" type="submit">Search</button>
                        </div>
                    </form>
                    @if ($userA->isAdmin==='on')
                    <a href="/teams/create" type="button" class="btn btn-info mx-1 mb-3 offset-md-4">New Team</a>
                    @endif
                    </div>
                    <div class="table-responsive">
                 
                        @if (isset($teams))
                   
                        <table class="table list">
                            <thead>
                                <tr>
                                <th><span>Team</span></th>
                                <th><span>Created</span></th>
                                <th class="text-center"><span>Description</span></th>
                                <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                    
                                <tr>
                                    <td>
                                    <a href="/teams/{{$team->id}}" class="user-link" style="    font-size: 1em;">{{$team->teams_name}}</a>
                                    
                                    </td>
                                    
                                    <td>{{ \Carbon\Carbon::parse($team->created_at)->isoFormat('D-M-YY HH:mm')}}</td>
                                    <td>{{$team->description}}</td>
                                    <td style="width: 20%;">
                                    <a href="/teams/{{$team->id}}" class="table-link text-warning">
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
                        <div class="d-flex justify-content-center">
                            {{ $teams->links()}}
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