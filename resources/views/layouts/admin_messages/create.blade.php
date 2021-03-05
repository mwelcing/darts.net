@extends('layouts.app')

@section('title')
Admin Message
@endsection

@section('content')
    <form action="{{ route('adminmessages.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control focus" value="{{ old('message') }}"></textarea>
                    @error('message')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit">Save</button>
            </div>
        </div>
    </form>
@endsection

@section('js')
<script>

</script>
@endsection
