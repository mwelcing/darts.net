@extends('layouts.app')

@section('title')
    Score Entry
@endsection

@section('content')
    <form action="{{ route('matches.savescores') }}" method="post">
        @csrf
        <input type="hidden" name="matchdateid" value="{{ $matchdateid }}">
        <div class="row">
            @foreach($matches as $match)
                <div class="col-sm-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <input type="hidden" name="match-id[{{ $loop->iteration }}]" value="{{ $match->id }}">
                            <h3 class="text-center font-weight-bold">{{ $match->visiting_team->name }} @ {{ $match->home_team->name }}</h3>
                            <div class="text-center">{{ \Carbon\Carbon::parse($match->match_date->date)->format('F j, Y') }}</div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col text-left bg-dark text-white">
                                    <div class="d-inline-block">{{ $match->visiting_team->name }}</div>
                                    <div class="d-inline-block col-3"><input type="text" class="form-control form-control-sm" name="visiting-team-points[{{ $loop->iteration }}]" value="0"></div>
                                    <input type="hidden" name="visiting-team-id[{{ $loop->iteration }}]" value="{{ $match->visiting_team->id }}">
                                </div>
                                <div class="col text-right bg-dark text-white">
                                    <div class="d-inline-block col-3"><input type="text" class="form-control form-control-sm" name="home-team-points[{{ $loop->iteration }}]" value="0"></div>
                                    <div class="d-inline-block">{{ $match->home_team->name }}</div>
                                    <input type="hidden" name="home-team-id[{{ $loop->iteration }}]" value="{{ $match->home_team->id }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col border-right">
                                    <table class="table table-sm table-striped table-bordered table-hover">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th class="d-inline-block col-6">Player</th>
                                            <th class="d-inline-block col-2">Outs</th>
                                            <th class="d-inline-block col-2">Hats</th>
                                            <th class="d-inline-block col-2">Six</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="d-inline-block col-6">
                                                <select class="form-control form-control-sm" name="v-p1[{{ $loop->iteration }}]" id="v1">
                                                    @foreach($match->visiting_team->playersByName as $player)
                                                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="v-p1-outs[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="v-p1-hats[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="v-p1-six[{{ $loop->iteration }}]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="d-inline-block col-6">
                                                <select class="form-control form-control-sm" name="v-p2[{{ $loop->iteration }}]" id="v-p2">
                                                    @foreach($match->visiting_team->playersByName as $player)
                                                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="v-p2-outs[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="v-p2-hats[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="v-p2-six[{{ $loop->iteration }}]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="d-inline-block col-6">
                                                <select class="form-control form-control-sm" name="v-p3[{{ $loop->iteration }}]" id="v3">
                                                    @foreach($match->visiting_team->playersByName as $player)
                                                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="v-p3-outs[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="v-p3-hats[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="v-p3-six[{{ $loop->iteration }}]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="d-inline-block col-6">
                                                <select class="form-control form-control-sm" name="v-p4[{{ $loop->iteration }}]" id="v4">
                                                    @foreach($match->visiting_team->playersByName as $player)
                                                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="v-p4-outs[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="v-p4-hats[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="v-p4-six[{{ $loop->iteration }}]">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col">
                                    <table class="table table-sm table-striped table-bordered table-hover">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th class="d-inline-block col-6">Player</th>
                                            <th class="d-inline-block col-2">Outs</th>
                                            <th class="d-inline-block col-2">Hats</th>
                                            <th class="d-inline-block col-2">Six</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="d-inline-block col-6">
                                                <select class="form-control form-control-sm" name="h-p1[{{ $loop->iteration }}]" id="h-p1">
                                                    @foreach($match->home_team->playersByName as $player)
                                                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="h-p1-outs[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="h-p1-hats[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="h-p1-six[{{ $loop->iteration }}]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="d-inline-block col-6">
                                                <select class="form-control form-control-sm" name="h-p2[{{ $loop->iteration }}]" id="h-p2">
                                                    @foreach($match->home_team->playersByName as $player)
                                                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="h-p2-outs[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="h-p2-hats[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="h-p2-six[{{ $loop->iteration }}]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="d-inline-block col-6">
                                                <select class="form-control form-control-sm" name="h-p3[{{ $loop->iteration }}]" id="h-p3">
                                                    @foreach($match->home_team->playersByName as $player)
                                                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="h-p3-outs[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="h-p3-hats[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="h-p3-six[{{ $loop->iteration }}]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="d-inline-block col-6">
                                                <select class="form-control form-control-sm" name="h-p4[{{ $loop->iteration }}]" id="h4">
                                                    @foreach($match->home_team->playersByName as $player)
                                                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="h-p4-outs[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="h-p4-hats[{{ $loop->iteration }}]">
                                            </td>
                                            <td class="d-inline-block col-2">
                                                <input type="text" class="form-control form-control-sm" value="0" name="h-p4-six[{{ $loop->iteration }}]">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="btn btn-outline-dark" type="submit" id="save-forms">Save Scores</button>
    </form>
@endsection

@section('js')

@endsection
