<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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


Route::get("/", function () {
    $new_user = new App\Models\Users();

    $new_user->name = "Reda";
    $new_user->save();

    $new_user = App\Models\users::find(4);
    $new_user->name = "Grain";
    $new_user->save();

    return $new_user;
});


Route::get("/blog", function (Request $request) {
    // $name = $request->input("name");
    // return [
    //     "link" => $request->path(),
    //     "Name" => $name,
    // ];
    return ["link" => \route("blog.show", ['nom' => 'how-to-ust-laravel', 'id' => 10])];
})->name("blog.index");




Route::get("/blog/{nom}-{id}", function (string $nome, int $id) {
    return [
        "Nom de Post" => $nome,
        "Id" => $id,
    ];
})->where(
        [
            "id" => '[0-9]+',
            'nom' => '[a-zA-Z\-]+',
        ]
    )->name('blog.show');