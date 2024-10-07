<?php



use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ProductController;

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
Route::get('/carasewa', [ViewController::class, 'carasewa']);
Route::get('/admin/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginPost']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/', [ViewController::class, 'index']);
Route::get('/detail/show={product:kode_produk}', [ViewController::class, 'detail']);
Route::get('/transaksi={product:kode_produk}', [ViewController::class, 'transaksi']);
Route::get('/hasiltransaksi', [TransactionController::class, 'hasil']);
Route::post('/pesanproduct={product:id}', [TransactionController::class, 'pesan']);

Route::middleware('isAuth')->group(function () {
    Route::get('/admin/dashboard', [ViewController::class, 'dashboard']);
    Route::get('/admin/transaksi/detail/{id}',[ViewController::class,'detailtransaksi']);

    Route::get('/admin/dataproduk', [ViewController::class, 'dataproduk']);
    Route::get('/admin/addproduk', [ViewController::class, 'addproduk']);
    Route::get('/admin/editproduk={product:id}', [ViewController::class, 'editproduk']);
    Route::post('/addproduk', [ProductController::class, 'addproduk']);
    Route::delete('/deleteproduk/{id}', [ProductController::class, 'deleteproduk'])->name('deleteproduk');
    Route::post('/editproduk={product:id}', [ProductController::class, 'editproduk']);

    Route::get('/admin/kontak', [ViewController::class, 'kontak']);
    Route::get('/admin/addkontak', [ViewController::class, 'addkontak']);
    Route::get('/admin/editkontak={contact:id}', [ViewController::class, 'editkontak']);

    Route::post('/addkontak', [ContactController::class, 'addkontak']);
    Route::post('/editkontak={contact:id}', [ContactController::class, 'editkontak']);
    Route::delete('/deletekontak/{contact:id}', [ContactController::class, 'deletekontak']);
});

