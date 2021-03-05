@extends('layouts.app')

@section('title')
    <h2>Edit League</h2>
@endsection

@section('content')

    <form action="{{ route('league.update', $league) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control focus" id="name" name="name" value="{{ $league->name }}"/>
            @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" class="form-control" id="year" name="year" value="{{ $league->year }}"/>
            @error('year')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="president_id">President</label>
            <select name="president_id" id="president_id" class="form-control">
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $league->president_id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                @endforeach
            </select>
            @error('president')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $league->email }}"/>
        </div>
        <div class="form-group">
            <label for="pfh">Points for Hat</label>
            <input type="text" class="form-control" id="pfh" name="pfh" value="{{ $league->pfh }}"/>
            @error('pfh')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="pfs">Points for Six</label>
            <input type="text" class="form-control" id="pfs" name="pfs" value="{{ $league->pfs }}"/>
            @error('pfs')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="split_season">Split Season:</label>
            <input type="checkbox" class="form-check-inline" id="split_season" name="split_season" {{ $league->split_season ? 'checked' : '' }}/>
            @error('split_season')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>

        <h2>
            <button type="submit" class="btn btn-outline-primary">Submit Info</button>
        </h2>
    </form>
@endsection

@section('js')
    <script>
        $(function () {

        });
    </script>
@endsection
