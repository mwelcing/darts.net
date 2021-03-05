@extends('layouts.app')

@section('title')
    Match
@endsection

@section('content')
    <form action="{{ route('matches.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="match_date_id">Date</label>
            <select name="match_date_id" id="match_date_id" class="form-control">
                <option value="0">Please select a date</option>
                @foreach($matchDates as $matchDate)
                    <option value="{{ $matchDate->id }}" {{ $matchdateid == $matchDate->id ? 'selected' : '' }}>{{ $matchDate->week_no }} ({{ $matchDate->date }})</option>
                @endforeach
            </select>
            @error('match_date_id')
            <div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="visiting_team_id">Visiting Team</label>
            <select name="visiting_team_id" id="visiting_team_id" class="form-control focus">
                <option value="0">Please select visiting team</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->team_no }} ({{ $team->name }})</option>
                @endforeach
            </select>
            @error('visiting_team_id')
            <div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="home_team_id">Home Team</label>
            <select name="home_team_id" id="home_team_id" class="form-control">
                <option value="0">Please select home team</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->team_no }} ({{ $team->name }})</option>
                @endforeach
            </select>
            @error('visiting_team_id')
            <div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <h2>
            <button type="submit" class="btn btn-outline-dark" name="save" value="1">Add Match</button>
            <button type="submit" class="btn btn-outline-dark" name="savenadd" value="1">Save and Add Another</button>
        </h2>
    </form>
@endsection

@section('js')
@endsection
