<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\User;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');

    //fetch all users
    // $users=DB::table('users')->get();
    // $users=DB::table("users")->first();
    // $users=User::get();
    // $users=User::all();
    $users=User::find(9);

    ///create users
    // $users=DB::insert("insert into users(id,name,email,password)values(?,?,?,?)",[2,'Joey Falls','joey.falls12@gmail.com','joey@1234']);

    // update users

    // $users=DB::update("update users set email='joey999@gmail.com' where email=?",['joey.falls12@gmail.com']);

    // delete
    // $users=DB::delete("delete from users where email=?",['joey999@gmail.com']);

    /// insert
    // $users=DB::table("users")->insert([
    //     'name'=>'Joey Falls',
    //     'email'=>'joey.falls12@gmail.com',
    //     'password'=>'joey@1234'
    // ]);

    //update
    // $users=DB::table('users')->where('id',3)->update([
    //     'email'=>'updateemail@gmail.com'
    // ]);

    // delete
    // $users=DB::table("users")->where('id',3)->delete();

    ///create
    // $users=User::create([
    //     'name'=>'All Joey',
    //         'email'=>'all.falls19@gmail.com',
    //         'password'=>'joey@1234'
    // ]);
    ///update
    // $users=User::where('id',5)->update([
    //     'email'=>'hello@gmail.com'
    // ]);


    ///delete
    // $users=User::where('id',4)->delete();

    dd($users->name);

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
