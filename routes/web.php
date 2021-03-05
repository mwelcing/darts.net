<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\ExcludedDateController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\MatchDateController;
use App\Http\Controllers\MatchScoreController;
use App\Http\Controllers\MissingScoreController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/welcome/team_match', [WelcomeController::class, 'team_match'])->name('welcome.team.match');
Route::get('/welcome/player/{player}', [WelcomeController::class, 'player_stats'])->name('welcome.player.stats');
Route::get('phpinfo', function() {
    phpinfo();
});
//Route::get('/android/{date}', [AndroidController::class, 'getMatch']);

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::middleware('auth')->group(function() {
    Route::redirect('database', 'phpliteadmin.php');
    Route::get('admin/calcscores', [MatchController::class, 'splitSeasonCalcScores'])->name('admin.calcscores');
    Route::resource('teams', TeamController::class);
    Route::get('players/create/{teamid}', [PlayerController::class, 'create'])->name('players.create');
    Route::resource('players', PlayerController::class, ['except' => 'create']);
    Route::resource('league', LeagueController::class);
    Route::resource('matchdates', MatchDateController::class);
    Route::get('matchdates/masscreate', [MatchDateController::class, 'massCreate'])->name('matchdates.masscreate');
    Route::resource('excludeddates', ExcludedDateController::class);
    Route::resource("matches", MatchController::class, ['except' => 'create']);
    Route::get('matches/create/{matchdateid}', [MatchController::class, 'create'])->name('matches.create');
    Route::get('matches/enterscores/{matchdateid}', [MatchController::class, 'enterscores'])->name('matches.enterscores');
    Route::post('matches/savescores', [MatchController::class, 'savescores'])->name('matches.savescores');
    Route::post('matches/updatescores/{matchscore}', [MatchController::class, 'updatescores'])->name('matches.updatescores');
    Route::get('admin/matchdatesview', [AdminController::class, 'getMatchDatesView'])->name('admin.viewmatchdates');
    Route::post('admin/generatedates', [AdminController::class, 'genMatchDates'])->name('admin.gendates');
    Route::get('admin/generatematches', [AdminController::class, 'generateMatches'])->name('admin.generatematches');
    Route::resource('matchscores', MatchScoreController::class);
    Route::resource('adminmessages', AdminMessageController::class);
    Route::resource('missingscores', MissingScoreController::class);
    Route::post('missingscores/matches', [MissingScoreController::class, 'matches'])->name('missingscores.matches');

    Route::get('/optimize', function() {
        $status = Artisan::call('optimize:clear');
        if ($status) {
            return '<h1>Artisan command <code>optimize:clear</code> FAILED</h1>';
        }
        $status = Artisan::call('optimize');
        if ($status) {
            return '<h1>Artisan command <code>optimize</code> FAILED</h1>';
        }
        return '<h1>Settings Optimized</h1>';
    })->name('admin.optimize');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
