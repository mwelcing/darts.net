@extends('layouts.app')

@section('content')
    <form action="{{ route('players.update', $player)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control focus" value="{{ $player->name }}">
            @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control">
                @foreach($genders as $gender)
                    <option value="{{ $gender }}" {{ $player->gender == $gender ? 'selected' : '' }}>{{ $gender }}</option>
                @endforeach
            </select>
            @error('gender')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="team_id">Team</label>
            <select name="team_id" id="team_id" class="form-control">
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $player->team->id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                @endforeach
            </select>
            @error('team_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="d-flex justify-content-between">
            <div class="form-group">
                <label for="outs">Outs</label>
                <div>{{ $player->outs }}</div>
            </div>
            <div class="form-group">
                <label for="hats">Hats</label>
                <div>{{ $player->hats }}</div>
            </div>
            <div class="form-group">
                <label for="six">Six</label>
                <div>{{ $player->six }}</div>
            </div>
            <div class="form-group">
                <label for="points">Points</label>
                <div>{{ $player->points }}</div>
            </div>
        </div>
        <div class="d-flex justify-content-between pb-2">
            <div>Created: {{ $player->created_at }}</div>
            <div>Updated: {{ $player->updated_at }}</div>
        </div>
        <button type="submit" class="btn btn-outline-dark">Save Player</button>
    </form>
@endsection
