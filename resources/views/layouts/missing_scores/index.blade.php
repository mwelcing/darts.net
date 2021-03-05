@extends('layouts.app')

@section('title')
    Missing Scores
@endsection

@section('addlink')
    <a href="{{ route('missingscores.create') }}" class="btn btn-outline-dark"><span class="fas fa-plus-circle"></span></a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @foreach($missingscores as $missingscore)
                <div class="row">
                    <div class="col col-1 border-bottom">
                        <form action="{{ route('missingscores.destroy', $missingscore) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm"><span class="fas fa-trash"></span></button>
                        </form>
                    </div>
                    <div class="col border-bottom">
                        <div>
                            {{ \Carbon\Carbon::parse($missingscore->match->match_date->date)->format('m/d/Y') }}:
                            {{ $missingscore->match->visiting_team->name }} @ {{ $missingscore->match->home_team->name }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('js')
    <script>

    </script>
@endsection
