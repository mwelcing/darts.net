@extends('layouts.app')

@section('title')
    Edit Scores
@endsection

@section('content')
    <form action="{{ route('matches.updatescores', $match->match_score) }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="visiting-team-points">Points for {{ $match->visiting_team->name }}</label>
                            <input name="visiting-team-points" type="text" class="form-control form-control-sm" value="{{ $match->match_score->visiting_team_points }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p1">Player #1</label>
                            <select name="v-p1" id="v-p1" class="form-control form-control-sm">
                                @foreach($visiting_players as $player)
                                    <option value="{{ $player->id }}" {{ $player->id == $match->match_score->v_p1 ? "selected" : "" }}>{{ $player->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p1-outs">Outs</label>
                            <input name="v-p1-outs" type="text" class="form-control form-control-sm" value="{{ $match->match_score->v_p1_outs }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p1-hats">Hats</label>
                            <input name="v-p1-hats" type="text" class="form-control form-control-sm" value="{{ $match->match_score->v_p1_hats }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p1-six">Six</label>
                            <input name="v-p1-six" type="text" class="form-control form-control-sm" value="{{ $match->match_score->v_p1_six }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p2">Player #2</label>
                            <select name="v-p2" id="v-p2" class="form-control form-control-sm">
                                @foreach($visiting_players as $player)
                                    <option value="{{ $player->id }}" {{ $player->id == $match->match_score->v_p2 ? "selected" : "" }}>{{ $player->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p2-outs">Outs</label>
                            <input name="v-p2-outs" type="text" class="form-control form-control-sm" value="{{ $match->match_score->v_p2_outs }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p2-hats">Hats</label>
                            <input name="v-p2-hats" type="text" class="form-control form-control-sm" value="{{ $match->match_score->v_p2_hats }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p2-six">Six</label>
                            <input name="v-p2-six" type="text" class="form-control form-control-sm" value="{{ $match->match_score->v_p2_six }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p3">Player #3</label>
                            <select name="v-p3" id="v-p3" class="form-control form-control-sm">
                                @foreach($visiting_players as $player)
                                    <option value="{{ $player->id }}" {{ $player->id == $match->match_score->v_p3 ? "selected" : "" }}>{{ $player->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p3-outs">Outs</label>
                            <input name="v-p3-outs" type="text" class="form-control form-control-sm" value="{{ $match->match_score->v_p3_outs }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p3-hats">Hats</label>
                            <input name="v-p3-hats" type="text" class="form-control form-control-sm" value="{{ $match->match_score->v_p3_hats }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p3-six">Six</label>
                            <input name="v-p3-six" type="text" class="form-control form-control-sm" value="{{ $match->match_score->v_p3_six }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p4">Player #4</label>
                            <select name="v-p4" id="v-p4" class="form-control form-control-sm">
                                @foreach($visiting_players as $player)
                                    <option value="{{ $player->id }}" {{ $player->id == $match->match_score->v_p4 ? "selected" : "" }}>{{ $player->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p4-outs">Outs</label>
                            <input name="v-p4-outs" type="text" class="form-control form-control-sm" value="{{ $match->match_score->v_p4_outs }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p4-hats">Hats</label>
                            <input name="v-p4-hats" type="text" class="form-control form-control-sm" value="{{ $match->match_score->v_p4_hats }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="v-p4-six">Six</label>
                            <input name="v-p4-six" type="text" class="form-control form-control-sm" value="{{ $match->match_score->v_p4_six }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="home-team-points">Points for {{ $match->home_team->name }}</label>
                            <input name="home-team-points" type="text" class="form-control form-control-sm" value="{{ $match->match_score->home_team_points }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p1">Player #1</label>
                            <select name="h-p1" id="h-p1" class="form-control form-control-sm">
                                @foreach($home_players as $player)
                                    <option value="{{ $player->id }}" {{ $player->id == $match->match_score->h_p1 ? "selected" : "" }}>{{ $player->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p1-outs">Outs</label>
                            <input name="h-p1-outs" type="text" class="form-control form-control-sm" value="{{ $match->match_score->h_p1_outs }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p1-hats">Hats</label>
                            <input name="h-p1-hats" type="text" class="form-control form-control-sm" value="{{ $match->match_score->h_p1_hats }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p1-six">Six</label>
                            <input name="h-p1-six" type="text" class="form-control form-control-sm" value="{{ $match->match_score->h_p1_six }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p2">Player #2</label>
                            <select name="h-p2" id="h-p2" class="form-control form-control-sm">
                                @foreach($home_players as $player)
                                    <option value="{{ $player->id }}" {{ $player->id == $match->match_score->h_p2 ? "selected" : "" }}>{{ $player->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p2-outs">Outs</label>
                            <input name="h-p2-outs" type="text" class="form-control form-control-sm" value="{{ $match->match_score->h_p2_outs }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p2-hats">Hats</label>
                            <input name="h-p2-hats" type="text" class="form-control form-control-sm" value="{{ $match->match_score->h_p2_hats }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p2-six">Six</label>
                            <input name="h-p2-six" type="text" class="form-control form-control-sm" value="{{ $match->match_score->h_p2_six }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p3">Player #3</label>
                            <select name="h-p3" id="h-p3" class="form-control form-control-sm">
                                @foreach($home_players as $player)
                                    <option value="{{ $player->id }}" {{ $player->id == $match->match_score->h_p3 ? "selected" : "" }}>{{ $player->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p3-outs">Outs</label>
                            <input name="h-p3-outs" type="text" class="form-control form-control-sm" value="{{ $match->match_score->h_p3_outs }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p3-hats">Hats</label>
                            <input name="h-p3-hats" type="text" class="form-control form-control-sm" value="{{ $match->match_score->h_p3_hats }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p3-six">Six</label>
                            <input name="h-p3-six" type="text" class="form-control form-control-sm" value="{{ $match->match_score->h_p3_six }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p4">Player #4</label>
                            <select name="h-p4" id="h-p4" class="form-control form-control-sm">
                                @foreach($home_players as $player)
                                    <option value="{{ $player->id }}" {{ $player->id == $match->match_score->h_p4 ? "selected" : "" }}>{{ $player->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p4-outs">Outs</label>
                            <input name="h-p4-outs" type="text" class="form-control form-control-sm" value="{{ $match->match_score->h_p4_outs }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p4-hats">Hats</label>
                            <input name="h-p4-hats" type="text" class="form-control form-control-sm" value="{{ $match->match_score->h_p4_hats }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="h-p4-six">Six</label>
                            <input name="h-p4-six" type="text" class="form-control form-control-sm" value="{{ $match->match_score->h_p4_six }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-outline-dark">Save</button>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script>

    </script>
@endsection
