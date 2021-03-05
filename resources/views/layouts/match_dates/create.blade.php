@extends('layouts.app')

@section('title')
Add Date
@endsection

@section('content')

<form action="{{ route('matchdates.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="week_no">Week #</label>
        <input type="number" class="form-control focus" id="week_no" name="week_no" value="{{  $nextWeekNo ? $nextWeekNo : old('week_no') }}"/>
        @error('week_no')<div class="alert alert-danger">{{ $message }}</div>@enderror
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
        @error('date')<div class="alert alert-danger">{{ $message }}</div>@enderror
    </div>
    <div class="form-group">
        <label for="half">Half</label>
        <input type="number" class="form-control" id="half" name="half" value="{{ old('half') }}">
        @error('half')<div class="alert alert-danger">{{ $message }}</div>@enderror
    </div>
    <div class="form-group">
        <label for="position_round">Position Round?</label>
        <select name="position_round" id="position_round" class="form-control">
            <option value="1">Yes</option>
            <option value="0" selected>No</option>
        </select>
        @error('position_round')<div class="alert alert-danger">{{ $message }}</div>@enderror
    </div>
    <h2><button type="submit" class="btn btn-outline-primary" name="add">Add Match Date</button></h2>
    <h2><button type="submit" class="btn btn-outline-primary" name="mass-create">Start Mass Date Create</button></h2>
</form>
@endsection

@section('js')
    <script>

    </script>
@endsection
