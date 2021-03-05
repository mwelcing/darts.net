@extends('layouts.app')

@section('content')
    <form action="{{ route('matches.update', $match) }}" method="post">
        @csrf
        @method('PUT')
                <div class="form-group">
                    <label for=""></label>
                    <input type="text" id="" name="$input" class="form-control" value="{{ $match->match_date->date }}">
                </div>
                <div class="d-flex justify-content-between pb-2">
                    <div>Created: {{ $match->created_at }}</div>
                    <div>Updated: {{ $match->updated_at }}</div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
    $(function() {

    });
</script>
@endsection
