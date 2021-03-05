@extends('layouts.app')

@section('title')
    Missing Scores
@endsection

@section('content')
    <form action="{{ route('missingscores.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="match_date_id">Date</label>
                    <select name="match_date_id" id="match_date_id" class="form-control form-control-sm">
                        <option value="-">Please select a date</option>
                        @foreach($matchdates as $matchdate)
                            <option value="{{ $matchdate->id }}">Week#: {{ $matchdate->week_no }} ({{ \Carbon\Carbon::parse($matchdate->date)->format('m/d/Y') }})</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="match_id">Match</label>
                    <select name="match_id" id="match_id" class="form-control form-control-sm">
                        <option value="-">-</option>
                    </select>
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
    $(function() {
        $('#match_date_id').change(function() {
            $.ajax({
                url: '{{ route('missingscores.matches') }}',
                type: 'POST',
                data: {'matchdateid':$(this).val(), '_token':'{{ csrf_token() }}'}
            }).done(function(_matches) {
                var _selectMatch = $('#match_id');
                _selectMatch.empty();
                $.each(_matches, function(){
                    var _matchid = this.id;
                    var _ht = this.home_team.name;
                    var _vt = this.visiting_team.name;
                    _selectMatch.append($('<option>', {value: _matchid}).text(_vt + ' @ ' + _ht));
                });
            }).fail(function(xhr, responseText, Error){
                alertify.error(xhr.responseText);
            });
        })
    });
</script>
@endsection
