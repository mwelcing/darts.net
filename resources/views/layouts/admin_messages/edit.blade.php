@extends('layouts.app')

@section('title')
    Admin Message
@endsection

@section('content')
    <form action="{{ route('adminmessages.update', $adminmessage) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control focus">{{ $adminmessage->message }}</textarea>
                    @error('message')<div class="alert alert-danger">{{ $adminmessage }}</div>@enderror
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
