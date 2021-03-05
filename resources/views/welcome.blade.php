<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

    <style>
        body {
            font-family: 'Roboto Mono';
        }
        .text-xxs {
            font-size: 0.65rem;
            line-height: 0.85rem;
        }
    </style>
</head>
<body class="antialiased">
<!-- This example requires Tailwind CSS v2.0+ -->
<div>
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="/"><img class="h-9 w-9" src="/DartBoard.svg" alt="{{ config('app.name') }}"></a>
                    </div>
                    <div class="hidden md:block">
                        @auth
                            <a href="/content/LeagueScoreSheet.pdf" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Score Sheet</a>
                            <a href="/content/Schedule.pdf" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Schedule</a>
                            <a href="/matches" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Admin</a>
                        @else
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="/content/LeagueScoreSheet.pdf" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Score Sheet</a>
                            <a href="/content/Schedule.pdf" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Schedule</a>
                            <a href="/login" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        @endauth
                    </div>
                </div>
                <div class="flex text-center text-white md:hidden">
                    {{ config('app.name') }}
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                            class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false"
                            onclick="document.getElementById('mobile-menu').classList.toggle('hidden');"
                    >
                        <span class="sr-only">Open main menu</span>
                        <!--
                          Heroicon name: outline/menu

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="hidden" id="mobile-menu">
            <div class="flex items-baseline justify-between">
                @auth
                    <a href="/content/LeagueScoreSheet.pdf" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Score Sheet</a>
                    <a href="/content/Schedule.pdf" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Schedule</a>
                    <a href="/matches" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Admin</a>
                @else
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="/content/LeagueScoreSheet.pdf" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Score Sheet</a>
                    <a href="/content/Schedule.pdf" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Schedule</a>
                    <a href="/login" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="font-bold text-2xl text-center">{{ \Carbon\Carbon::parse($nextDate->date)->format('m/d/Y') }}</div>
            <div class="flex inline justify-between bg-gray-50 border-t-2 border-b-2 font-bold uppercase">
                <div>Visiting Team</div>
                <div>Home Team</div>
            </div>
            @foreach($nextMatches as $match)
                <div class="flex inline justify-between border-b-2">
                    <div>{{ $match->visiting_team->name }}</div>
                    <div>{{ $match->home_team->name }}</div>
                </div>
            @endforeach
        </div>
    </header>
    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" colspan="2" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        First Half
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Team
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Points
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($f_teams as $team)
                                    <tr>
                                        <td class="flex inline px-6 py-4 whitespace-nowrap items-center">
                                            <button class="w-8 pr-4" onclick="displayTeam({{ $team }})">
                                                <x-eye></x-eye>
                                            </button>
                                            <div>
                                                {{ $team->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-right whitespace-nowrap">
                                            {{ $team->fhp }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" colspan="2" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Second Half
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Team
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Points
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($s_teams as $team)
                                    <tr>
                                        <td class="flex inline px-6 py-4 whitespace-nowrap items-center">
                                            <div class="w-8 pr-4">
                                                <button class="w-8 pr-4" onclick="displayTeam({{ $team }})">
                                                    <x-eye></x-eye>
                                                </button>
                                            </div>
                                            <div>
                                                {{ $team->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-right whitespace-nowrap">
                                            {{ $team->fhp }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" colspan="2" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Men's Standings
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Player
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Points
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($m_players as $player)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $player->name }} ({{ $player->team->name }})
                                        </td>
                                        <td class="px-6 py-4 text-right whitespace-nowrap">
                                            {{ $player->points }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" colspan="2" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Women's Standings
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Player
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Points
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($f_players as $player)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $player->name }} ({{ $player->team->name }})
                                        </td>
                                        <td class="px-6 py-4 text-right whitespace-nowrap">
                                            {{ $player->points }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="popup-modal" class="hidden">
        {{-- TEAM STATUS POPUP --}}
        </div>
    </main>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    $(function () {
        if ($("#flash-success").length) {
            alertify.success($("#flash-success").data("message"));
        }
        if ($("#flash-deleted").length) {
            alertify.warning($("#flash-deleted").data("message"))
        }
    });

    function displayTeam(team) {
        let _teamId = team.id
        let _popup = $('#popup-modal')
        axios.get('{{ route('welcome.team.match') }}', {
            params: {
                team: _teamId
            }
        })
        .then(response => {
            _popup.html(response.data)
            _popup.removeClass('hidden')
            $('#team-close').click(function() {
                _popup.addClass('hidden');
            })
        })
    }
</script>
</body>
</html>
