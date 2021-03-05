@extends('layouts.app')

@section('title')
League Information
@endsection

@section('addlink')
    <a href="{{ route('league.create') }}" class="btn btn-outline-dark"><span class="fas fa-plus-circle"></span></a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>League Information</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col col-1 border-bottom"></div>
                <div class="col font-weight-bold border-bottom">League Name</div>
                <div class="col font-weight-bold border-bottom">President</div>
                <div class="col font-weight-bold border-bottom">Points for Hat</div>
                <div class="col font-weight-bold border-bottom">Points for Six</div>
                <div class="col font-weight-bold border-bottom">Split Season</div>
            </div>
            <div class="row">
                <div class="col col-1"><a href="{{ route('league.edit', $league->id) }}"><span class="fas fa-edit"></span></a></div>
                <div class="col">{{ $league->name }}</div>
                <div class="col">{{ $league->president->name }}</div>
                <div class="col">{{ $league->pfh }}</div>
                <div class="col">{{ $league->pfs }}</div>
                <div class="col">{{ $league->split_season? 'YES':'NO' }}</div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>

</script>
@endsection
