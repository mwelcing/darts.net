<!-- This example requires Tailwind CSS v2.0+ -->
<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen px-4 pb-20 text-center sm:block sm:p-0">
        <!--
          Background overlay, show/hide based on modal state.

          Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <!--
          Modal panel, show/hide based on modal state.

          Entering: "ease-out duration-300"
            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            To: "opacity-100 translate-y-0 sm:scale-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100 translate-y-0 sm:scale-100"
            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        -->
        <div class="inline-block align-bottom bg-white rounded-lg text-xs text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-left sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                             {{ $team->name }}
                        </h3>
                        <div class="mt-2">
                            <div class="flex mb-4">
                                <div class="w-1/2">
                                    <table class="border-r-2 border-black">
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
                                                <td>{{ \Carbon\Carbon::parse($match->match_date->date)->format('m/d') }}</td>
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
                                <div class="w-1/2">
                                    <table>
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
                                                <td>{{ \Carbon\Carbon::parse($match->match_date->date)->format('m/d') }}</td>
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
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button id="team-close" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
