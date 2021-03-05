@extends('layouts.app')

@section('title')
Add Excluded Date
@endsection

@section('content')
<form action="{{ route('excludeddates.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" class="form-control focus" id="date" name="date" value="{{ old('date') }}"/>
    </div>
    <h2><button type="submit" class="btn btn-outline-primary">Add Date</button></h2>
</form>
@endsection

@section('js')
    <script>
        $(function() {

        });
    </script>
@endsection
