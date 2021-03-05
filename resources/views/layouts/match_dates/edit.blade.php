@extends('layouts.app')

@section('title')
    Edit Date
@endsection

@section('content')
    <form action="{{ route('matchdates.update', $matchdate) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="week_no">Week #</label>
            <input type="text" class="form-control focus" id="week_no" name="week_no" value="{{ $matchdate->week_no }}"/>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $matchdate->date }}"/>
        </div>
        <div class="form-group">
            <label for="half">Half</label>
            <input type="number" class="form-control" id="half" name="half" value="{{ $matchdate->half }}"/>
        </div>
        <div class="form-group">
            <label for="position_round">Position Round</label>
            <input type="checkbox" class="form-check-inline" id="position_round" name="position_round" {{ $matchdate->position_round ? 'checked':'' }}/>
        </div>
        <div class="d-flex justify-content-between pb-2">
            <div>Created: {{ $matchdate->created_at }}</div>
            <div>Updated: {{ $matchdate->updated_at }}</div>
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit Changes</button>
    </form>
@endsection

