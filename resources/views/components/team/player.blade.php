{{--Variable for this view $team --}}
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ $team->name }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col">
                    <table class="table table-sm">
                        <caption>Home Matches</caption>
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Team</th>
                            <th>Score</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($team->home_matches as $match)
                            <tr>
                                <td>{{ $match->match_date->date }}</td>
                                <td>{{ $match->visiting_team->name }}</td>
                                <td>
                                    @if($match->match_score)
                                        {{ $match->match_score->home_team_points }}-{{ $match->match_score->visiting_team_points }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <table class="table table-sm">
                        <caption>Visiting Matches</caption>
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Team</th>
                            <th>Score</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($team->visiting_matches as $match)
                            <tr>
                                <td>{{ $match->match_date->date }}</td>
                                <td>{{ $match->home_team->name }}</td>
                                <td>
                                    @if($match->match_score)
                                        {{ $match->match_score->visiting_team_points }}-{{ $match->match_score->home_team_points }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
