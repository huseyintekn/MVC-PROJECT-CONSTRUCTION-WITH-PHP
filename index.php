<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
ob_start();
session_start();
include __DIR__ . "/vendor/autoload.php";

use Routers\Route;
use App\Http\Controllers\Books\BookController;
use App\Http\Controllers\Employee\EmployeeController;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

Route::get("/employee", [EmployeeController::class, "index"]);
Route::get("/employee/{url}", [EmployeeController::class, "edit"]);
//Route::post("/employeee", [EmployeeController::class, "index"]);

Route::get("/book", [BookController::class, "index"]);
Route::get("/book/create", [BookController::class, "create"]);
Route::post("/book/save", [BookController::class, "store"]);

Route::get("/login", function (){
    echo "<h1>Login Page</h1>";
});

Route::get("/", function () {
    $_SESSION["user_name"] = "hsyntkn";
});