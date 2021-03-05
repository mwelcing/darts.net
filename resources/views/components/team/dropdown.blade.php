<div class="form-group">
    <label for="team_id">Team:</label>
    <select name="team_id" id="team_id" class="form-control-sm">
        @foreach($teams as $team)
            <option value="{{ $team->id }}" {{$selectedid === $team->id ? 'selected' : ''}}>{{ $team->name }}</option>
        @endforeach
    </select>
</div>
