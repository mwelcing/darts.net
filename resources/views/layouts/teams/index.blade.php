@extends('layouts.app')

@section('title')
    Teams
@endsection

@section('addlink')
    <a href="{{ route('teams.create') }}" class="btn btn-outline-dark"><span class="fas fa-plus-circle"></span></a>
@endsection

@section('content')
    <div class="row">
        @foreach($teams as $team)
            <div class="col-12 col-md-6 pb-2">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route("teams.edit", $team) }}" class="float-left"><h3>{{ $team->name }}</h3></a>
                        <a href="{{ route("players.create", $team->id) }}" class="btn btn-outline-dark float-right"><span class="fas fa-plus-circle"></span></a>
                    </div>

                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col col-1"></div>
                                <div class="col col-3 font-weight-bold border-bottom">
                                    Player
                                </div>
                                <div class="col col-2 text-right font-weight-bold border-bottom">
                                    Points
                                </div>
                                <div class="col col-2 text-right font-weight-bold border-bottom">
                                    Outs
                                </div>
                                <div class="col col-2 text-right font-weight-bold border-bottom">
                                    Hats
                                </div>
                                <div class="col col-2 text-right font-weight-bold border-bottom">
                                    Six
                                </div>
                            </div>
                            {{-- loop through players --}}
                            @foreach($team->players as $player)
                                <div class="row">
                                    <div class="col col-1">
                                        <a href="{{ route('players.edit', $player->id) }}">
                                            <span class="fas fa-edit"></span>
                                        </a>
                                    </div>
                                    <div class="col col-3">
                                        {{ $player->name }}
                                    </div>
                                    <div class="col col-2 text-right">
                                        {{ $player->points }}
                                    </div>
                                    <div class="col col-2 text-right">
                                        {{ $player->outs }}
                                    </div>
                                    <div class="col col-2 text-right">
                                        {{ $player->hats }}
                                    </div>
                                    <div class="col col-2 text-right">
                                        {{ $player->six }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
@endsection
