@extends('layouts.app')

@section('title')
    Admin Messages
@endsection

@section('addlink')
    <a href="{{ route('adminmessages.create') }}" class="btn btn-outline-dark"><span class="fas fa-plus-circle"></span></a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @foreach($adminMessages as $adminmessage)
                <div class="row">
                    <div class="col col-1 d-inline-flex align-items-center border-bottom">
                        <a href="{{ route('adminmessages.edit', $adminmessage) }}"><span class="fas fa-edit"></span></a>
                        <form action="{{ route('adminmessages.destroy', $adminmessage) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm text-danger"><span class="fas fa-trash"></span></button>
                        </form>
                    </div>
                    <div class="col border-bottom">
                        <div>{{ $adminmessage->message }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('js')
    <script>

    </script>
@endsection
