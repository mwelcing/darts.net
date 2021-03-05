@extends('layouts.app')

@section('title')
Add Player
@endsection

@section('content')
<form action="{{ route('players.store') }}" method="post" id="create-form">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control focus" id="name" name="name" value="{{ old('name') }}"/>
        @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="form-control">
            @foreach($genders as $gender)
                <option value="{{ $gender }}">{{ $gender }}</option>
            @endforeach
        </select>
        @error('gender')<div class="alert alert-danger">{{ $message }}</div>@enderror
    </div>
    <div class="form-group">
        <label for="team_id">Team</label>
        <select name="team_id" id="team_id" class="form-control">
            @foreach($teams as $team)
                <option value="{{ $team->id }}" {{ $teamId == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
            @endforeach
        </select>
        @error('team_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
    </div>
</form>
<h2><button type="submit" form="create-form" class="btn btn-outline-primary">Add Player</button></h2>
@endsection
