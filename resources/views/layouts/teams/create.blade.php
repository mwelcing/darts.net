@extends('layouts.app')

@section('title')
Add Team
@endsection

@section('content')
    <form action="{{ route('teams.store') }}" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control focus" id="name" name="name" value="{{ old('name') }}"/>
            @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="team_no">Team #</label>
            <input type="text" class="form-control" id="team_no" name="team_no" value="{{ old('team_no') }}">
            @error('team_no')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="phone_no">Phone #</label>
            <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{ old('phone_no') }}">
            @error('phone_no')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="gps_lat">GPS Latitude</label>
            <input type="text" class="form-control" id="gps_lat" name="gps_lat" value="{{ old('gps_lat') }}">
        </div>
        <div class="form-group">
            <label for="gps_long">GPS Longitude</label>
            <input type="text" class="form-control" id="gps_long" name="gps_long" value="{{ old('gps_long') }}">
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit Team</button>
        @csrf
    </form>
@endsection

