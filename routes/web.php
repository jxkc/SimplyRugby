<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\TrainingSessionController;
use App\Http\Controllers\PlayerProfileController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\JuniorController;
use App\Http\Controllers\SeniorController;
use App\Http\Controllers\FixtureController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\KinController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', \App\Http\Middleware\AdminMigoddleware::class])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/players', function () {
        return view('players.index');
    })->name('players.index');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/players/junior/manager', [JuniorController::class, 'manager'])->name('junior-members.manager');
        Route::post('/players/junior/store', [JuniorController::class, 'store'])->name('junior-members.store');
    });

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/players/playerprofile', [PlayerProfileController::class, 'index'])->name('players.playerprofile.index');
        Route::post('/players/playerprofile', [PlayerProfileController::class, 'store'])->name('players.playerprofile.store');
    });

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/players/junior/manager', [JuniorController::class, 'manager'])->name('junior-members.manager');
        Route::post('/players/junior/store', [JuniorController::class, 'store'])->name('junior-members.store');
    });

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/players/senior/manager', [SeniorController::class, 'manager'])->name('senior-members.manager');
        Route::post('/players/senior/manager', [SeniorController::class, 'store'])->name('senior-members.manager.submit');
    });

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/fixtures', [FixtureController::class, 'manager'])->name('fixtures.index');
        Route::post('/fixtures/store', [FixtureController::class, 'store'])->name('fixtures.store');
    });

    Route::get('/trainingsessions', [TrainingSessionController::class, 'manager'])->name('trainingsessions.index');
    Route::post('/trainingsessions/store', [TrainingSessionController::class, 'store'])->name('trainingsessions.store');

    Route::get('/members', [MemberController::class, 'manager'])->name('members.index');
    Route::post('/members/store', [MemberController::class, 'store'])->name('members.store');

    Route::middleware(['auth', 'verified'])->group(function () {
        // GET route to display the coach manager view
        Route::get('/coaches', [CoachController::class, 'manager'])->name('coaches.index');

        // POST route to store a new coach
        Route::post('/coaches', [CoachController::class, 'store'])->name('coaches.store');
    });

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
        Route::post('/doctors/store', [DoctorController::class, 'store'])->name('doctors.store');
    });

    Route::get('/contacts', function () {
        return view('contacts.index');
    })->name('contacts.index');

    Route::middleware(['auth', 'verified'])->group(function () {
        // Index route for viewing all guardians
        Route::get('/guardian', [GuardianController::class, 'index'])->name('guardian.index');

        // Store route for creating a new guardian
        Route::post('/guardian', [GuardianController::class, 'store'])->name('guardian.store');
    });

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/kin', [KinController::class, 'index'])->name('kin.index');
        Route::post('/kin/store', [KinController::class, 'store'])->name('kin.store');
    });

    Route::resource('skills', SkillController::class);
});

// Route::middleware(['auth', 'verified', \App\Http\Middleware\AdminMiddleware::class])->group(function () {

// });

require __DIR__ . '/auth.php';
