@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($teams as $team)
            <div class="col col-sm-1 col-md-6 pb-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">{{ $team->name }}</h3>
                        <button class="btn btn-outline-info float-right">+</button>
                    </div>

                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col col-4 font-weight-bold border-bottom">
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
                                    <div class="col col-4">
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
    </div>
@endsection
