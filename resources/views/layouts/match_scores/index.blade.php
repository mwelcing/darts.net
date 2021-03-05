@extends('layouts.app')

@section('title')
    Scores
@endsection

@section('content')
    {{ dd($matchscores) }}
<div class="jumbotron">Scores Data</div>
@endsection

@section('js')
<script>

</script>
@endsection
