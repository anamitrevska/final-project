@extends('layouts.app')
@section('content')
    <div class="col-md-12 container row d-flex">
        <div class="col-md-5 container dashlet-mine" style="padding-left: 0px; padding-right: 0px;">
            <nav class="dashlet-header">
                <p class="font-weight-bold">My tasks</p>
            </nav>
            <table class="table dashletTable">
                <thead>
                    <tr>            
                        <th scope="col">Name</th>
                        <th scope="col">Team</th>
                        <th scope="col">Assigned User</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mytasks as $mytask)
                    <tr>
                        <td scope="col"><a href="/tasks/{{$mytask->id}}">{{$mytask->tasks_name}}</a></td>
                        <td scope="col">{{$mytask->teams_name}}</td>
                        <td scope="col">{{$mytask->user_name}}</td>
                        <td scope="col">{{ \Carbon\Carbon::parse($mytask->created_at)->isoFormat('D/M/YY HH:mm')}}</td>
                        <td scope="col">{{$mytask->status}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
                 {{-- Pagination --}}
                 <div class="d-flex justify-content-center" style="font-size: 0.7rem;">
                    {{ $mytasks->links()}}
                </div>
        </div>


        <div class="col-md-5 container dashlet-mine" style="padding-left: 0px; padding-right: 0px;">
            <nav class="dashlet-header">
                <p class="font-weight-bold">All tasks</p>
            </nav>
            <table class="table dashletTable">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Team</th>
                        <th scope="col">Assigned User</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($alltasks as $alltask)
                    <tr>
          
                        <td scope="col"><a href="/tasks/{{$alltask->id}}">{{$alltask->tasks_name}}</a></td>
                        <td scope="col">{{$alltask->teams_name}}</td>
                        <td scope="col">{{$alltask->user_name}}</td>
                        <td scope="col">{{ \Carbon\Carbon::parse($alltask->created_at)->isoFormat('D/M/YY HH:mm')}}</td>
                        <td scope="col">{{$alltask->status}}</td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center" style="font-size: 0.7rem;">
                    {{ $alltasks->links()}}
                </div>

        </div>

    </div>

@endsection
