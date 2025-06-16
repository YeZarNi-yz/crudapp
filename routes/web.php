<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Article\ArticleController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;

Route::get("/", function () {
  return redirect("/login");
});

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);

Auth::routes();

Route::get('/home', function () {
  $users = User::all();  // Fetch all users
  return view('home', compact('users'));  // Pass users to the view
})->name('home');


Route::middleware(['auth'])->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

  Route::middleware('auth')->group(function () {
    Route::get('/users/manage', function () {
      if (Auth::user()->role !== 'admin') {
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
      }

      $users = User::all();

      return view('users.manage', compact('users'));
    })->name('users.manage');

    Route::get('/users/manage', function (Request $request) {
      if (Auth::user()->role !== 'admin') {
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
      }

      $query = User::query();

      if ($request->has('search') && $request->search != '') {

        $searchTerm = $request->search;

        $query->where(function ($q) use ($searchTerm) {
          $q->where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('email', 'like', '%' . $searchTerm . '%');
        });
      }

      $users = $query->paginate(30);

      return view('users.manage', compact('users'));
    })->name('users.manage');

    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
  });
});
