@extends('layouts.app')
@section('content')
<div class="container justify-content-center col-md-6 bg-white rounded box-shadow layoutCards" style="padding: 0px;">
        <div class="card card-height">
            <div class="card-header">
                Create Team
            </div>
        <div class="card-body">
            <form action="/teams" method="post">
                @csrf
                <div class="form-group">
                    <label for="teamsName">Team's name:</label>
                    <input type="text" class="form-control" id="teamsName" name="teamsName"  @error('teamsName') is-invalid @enderror" placeholder="Team's Name" required>
                    @error('teamsName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="teamNote">Team description:</label>
                    <textarea class="form-control" id="teamNote" name="teamNote" rows="3" @error('teamNote') is-invalid @enderror" required></textarea>
                    @error('teamNote')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="button" class="btn btn-secondary">Close</button>
                <button type="submit" class="btn btn-primary">Save Team</button>

        </form>
        </div>
        </div>
</div>   
@endsection

