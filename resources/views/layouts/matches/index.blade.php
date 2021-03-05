<x-app-layout>
    <x-slot name="header">
        <div class="flex inline">
            {{ __('Matches') }}
        </div>
    </x-slot>
    <div class="row">
        @foreach($matchDates as $md)
            <div class="col-12 col-md-6 pb-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="float-left">{{ \Illuminate\Support\Carbon::parse($md->date)->format("F j, Y") }}</h3>
                        @if(!$md->scores_entered)
                            <a href="{{ route("matches.enterscores", $md->id) }}" class="btn btn-outline-dark float-right"><i class="fas fa-plus-circle pr-1"></i></a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row bg-dark text-white border-bottom">
                                <div class="col text-center">
                                    Away
                                </div>
                                <div class="col-1 text-center">

                                </div>
                                <div class="col text-center">
                                    Home
                                </div>
                            </div>
                            @foreach($md->matches as $match)
                                <div class="row border-bottom">
                                    @if($match->match_score)
                                        <div class="col-1 text-center">
                                            <a href="{{ route('matches.edit', $match) }}"><span class="fas fa-edit"></span></a>
                                        </div>
                                    @endif
                                    <div class="col text-center">
                                        {{ $match->visiting_team->name }}
                                    </div>
                                    <div class="col-1 text-center">
                                        @
                                    </div>
                                    <div class="col text-center">
                                        {{ $match->home_team->name }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>

{{--@extends('layouts.app')--}}

{{--@section('title')--}}
{{--    Matches--}}
{{--@endsection--}}

{{--@section('addlink')--}}
{{--    <a href="{{ route('matchdates.create') }}" class="btn btn-outline-dark"><span class="fas fa-plus-circle"></span></a>--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    <div class="row">--}}
{{--        @foreach($matchDates as $md)--}}
{{--            <div class="col-12 col-md-6 pb-2">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="float-left">{{ \Illuminate\Support\Carbon::parse($md->date)->format("F j, Y") }}</h3>--}}
{{--                        @if(!$md->scores_entered)--}}
{{--                        <a href="{{ route("matches.enterscores", $md->id) }}" class="btn btn-outline-dark float-right"><i class="fas fa-plus-circle pr-1"></i></a>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="container">--}}
{{--                            <div class="row bg-dark text-white border-bottom">--}}
{{--                                <div class="col text-center">--}}
{{--                                    Away--}}
{{--                                </div>--}}
{{--                                <div class="col-1 text-center">--}}

{{--                                </div>--}}
{{--                                <div class="col text-center">--}}
{{--                                    Home--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @foreach($md->matches as $match)--}}
{{--                                <div class="row border-bottom">--}}
{{--                                    @if($match->match_score)--}}
{{--                                        <div class="col-1 text-center">--}}
{{--                                            <a href="{{ route('matches.edit', $match) }}"><span class="fas fa-edit"></span></a>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                    <div class="col text-center">--}}
{{--                                        {{ $match->visiting_team->name }}--}}
{{--                                    </div>--}}
{{--                                    <div class="col-1 text-center">--}}
{{--                                        @--}}
{{--                                    </div>--}}
{{--                                    <div class="col text-center">--}}
{{--                                        {{ $match->home_team->name }}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--@endsection--}}

{{--@section('js')--}}
{{--@endsection--}}
