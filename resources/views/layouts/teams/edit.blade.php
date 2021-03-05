@extends('layouts.app')

@section('title')
    Edit Team
@endsection

@section('content')
    <form action="{{ route('teams.update', $team) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control focus" id="name" name="name" value="{{ $team->name }}"/>
        </div>
        <div class="form-group">
            <label for="team_no">Team #</label>
            <input type="text" class="form-control" id="team_no" name="team_no" value="{{ $team->team_no }}">
        </div>
        <div class="form-group">
            <label for="phone_no">Phone #</label>
            <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{ $team->phone_no }}">
        </div>
        <div class="form-group">
            <label for="gps_lat">GPS Latitude</label>
            <input type="text" class="form-control" id="gps_lat" name="gps_lat" value="{{ $team->gps_lat }}">
        </div>
        <div class="form-group">
            <label for="gps_long">GPS Longitude</label>
            <input type="text" class="form-control" id="gps_long" name="gps_long" value="{{ $team->gps_long }}">
        </div>
        <div class="d-flex justify-content-between pb-2">
            <div>Created: {{ $team->created_at }}</div>
            <div>Updated: {{ $team->updated_at }}</div>
        </div>
        <button type="submit" class="btn btn-outline-primary">Save Changes</button>
    </form>
@endsection

