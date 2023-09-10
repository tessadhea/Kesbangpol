<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Query\IndexHint;
use App\Http\Controllers\OrmasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PremissionController;
use App\Http\Controllers\IbadahController;
use App\Http\Controllers\KeramaianController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\RejectedController;
use App\Http\Controllers\Surat1Controller;
use App\Http\Controllers\Surat2Controller;
use App\Http\Controllers\Surat3Controller;
use App\Http\Controllers\Surat4Controller;
use App\Models\penelitian;
use App\Models\rejected;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('landing');
})->middleware(['auth', 'role:user'])->name('dashboard');

// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware(['auth', 'role:admin'])->name('admin.index');

Route::middleware(['auth','role:admin'])->name('admin.')->prefix('admin')->group(function() {
           Route::get('/', [IndexController::class, 'index'])->name('index');
           Route::resource('roles', RoleController::class);
           Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
           Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])-> name('roles.permissions.revoke');
           Route::resource('permission', PremissionController::class);
           Route::post('/permission/{permission}/roles',[PremissionController::class, 'assignRole'])->name('permissions.roles');
           Route::delete('/permission/{permission}/roles/{role}',[PremissionController::class, 'removeRole'])->name('permissions.roles.remove');
           Route::get('/user',[UserController::class , 'index'])->name('user.index');
           Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
           Route::delete('/user/{user}',[UserController::class , 'destroy'])->name('user.destroy');
           Route::post('/user/{user}/roles',[UserController::class, 'assignRole'])->name('user.roles');
           Route::delete('/user/{user}/roles/{role}',[UserController::class, 'removeRole'])->name('user.roles.remove');
           Route::post('/user/{user}/permissions}',[UserController::class, 'givePermission'])->name('user.permissions');
           Route::delete('/user/{user}/permissions/{permission}',[UserController::class, 'revokePermission'])->name('user.permissions.revoke');






});

Route::middleware('auth')->name('ormas.')->prefix('ormas')->group(function() {
    Route::get('/', [OrmasController::class, 'index'])->name('index');
    Route::get('/ormas',[OrmasController::class, 'create'])->name('ormas.create');
    Route::post('/ormas',[OrmasController::class, 'store'])->name('ormas.store');
    Route::get('/ormas/{ormas}',[OrmasController::class, 'edit'])->name('ormas.edit');
    Route::get('/ormas/{ormas}/validasi',[OrmasController::class, 'validasi'])->name('ormas.validasi');
    Route::post('/ormas/{ormas}/selesai',[OrmasController::class, 'selesai'])->name('ormas.selesai');
    Route::delete('/ormas/{ormas}',[OrmasController::class, 'destroy'])->name('ormas.destroy');
    Route::get('ormas/ssp/{filename}',[OrmasController::class, 'download'])->name('ormas.ssp');
    Route::get('ormas/mendagri/{filename}',[OrmasController::class, 'download1'])->name('ormas.mendagri');
    Route::get('ormas/ad_art/{filename}',[OrmasController::class, 'download2'])->name('ormas.adart');
    Route::get('ormas/proker/{filename}',[OrmasController::class, 'download3'])->name('ormas.proker');
    Route::get('ormas/ktp/{filename}',[OrmasController::class, 'download4'])->name('ormas.ktp');
    Route::get('ormas/npwp/{filename}',[OrmasController::class, 'download5'])->name('ormas.npwp');
    Route::get('ormas/domisili/{filename}',[OrmasController::class, 'download6'])->name('ormas.domisili');
    Route::get('ormas/kantor/{filename}',[OrmasController::class, 'download7'])->name('ormas.kantor');
    Route::get('ormas/pernyataan/{filename}',[OrmasController::class, 'download8'])->name('ormas.pernyataan');
    Route::get('ormas/data/{filename}',[OrmasController::class, 'download9'])->name('ormas.data');
    Route::get('ormas/sspView/{filename}',[OrmasController::class, 'view'])->name('ormas.sspView');
    Route::get('ormas/mendagriView/{filename}',[OrmasController::class, 'view1'])->name('ormas.mendagriView');
    Route::get('ormas/ad_artView/{filename}',[OrmasController::class, 'view2'])->name('ormas.adartiView');
    Route::get('ormas/prokerView/{filename}',[OrmasController::class, 'view3'])->name('ormas.prokerView');
    Route::get('ormas/ktpView/{filename}',[OrmasController::class, 'view4'])->name('ormas.ktpView');
    Route::get('ormas/npwpView/{filename}',[OrmasController::class, 'view5'])->name('ormas.npwpView');
    Route::get('ormas/domisiliView/{filename}',[OrmasController::class, 'view6'])->name('ormas.domisiliView');
    Route::get('ormas/kantorView/{filename}',[OrmasController::class, 'view7'])->name('ormas.kantorView');
    Route::get('ormas/pernyataanView/{filename}',[OrmasController::class, 'view8'])->name('ormas.pernyataanView');
    Route::get('ormas/dataView/{filename}',[OrmasController::class, 'view9'])->name('ormas.dataView');
    Route::post('/ormas/{ormas}/update',[OrmasController::class, 'update'])->name('ormas.update');
    Route::post('/ormas/{ormas}/tolak',[OrmasController::class, 'tolak'])->name('ormas.tolak');
    Route::post('/ormas/{ormas}/tolak/send',[OrmasController::class, 'send'])->name('ormas.send');
    Route::get('/ormas/{ormas}/pesanDitolak',[OrmasController::class, 'pesanDitolak'])->name('ormas.pesanDitolak');
    Route::post('/ormas/{ormas}/resubmit',[OrmasController::class, 'resubmit'])->name('ormas.resubmit');
    Route::delete('/ormas/pesan/{rejected}',[RejectedController::class, 'destroy'])->name('pesan.destroy');
    Route::get('/ormas/{ormas}/pdf',[OrmasController::class, 'pdf'])->name('ormas.pdf');
    Route::post('/ormas/{ormas}/surat',[Surat3Controller::class, 'create'])->name('ormas.surat');
    Route::post('/ormas/{ormas}/suratrev',[Surat3Controller::class, 'edit'])->name('ormas.suratrev');
    Route::post('/ormas/{surat}/suratrev/update',[Surat3Controller::class, 'update'])->name('ormas.suratrev.update');
    Route::post('/ormas/{ormas}/final',[OrmasController::class, 'final'])->name('ormas.final');
    Route::get('ormas/final/{filename}',[OrmasController::class, 'viewfinal'])->name('ormas.finalview');
    Route::get('ormas/finalD/{filename}',[OrmasController::class, 'downloadfinal'])->name('ormas.finalD');
    Route::get('/search',[OrmasController::class, 'search'])->name('ormas.search');
    Route::get('/search1',[OrmasController::class, 'search1'])->name('ormas.search1');
    Route::get('/search2',[OrmasController::class, 'search2'])->name('ormas.search2');



});
Route::middleware('auth')->name('ibadah.')->prefix('ibadah')->group(function() {
    Route::get('/', [IbadahController::class, 'index'])->name('index');
    Route::get('/ibadah',[IbadahController::class, 'create'])->name('ibadah.create');
    Route::post('/ibadah',[IbadahController::class, 'store'])->name('ibadah.store');
    Route::get('/ibadah/{ibadah}',[IbadahController::class, 'edit'])->name('ibadah.edit');
    Route::get('/ibadah/{ibadah}/validasi',[IbadahController::class, 'validasi'])->name('ibadah.validasi');
    Route::get('ibadah/SKTM/{filename}',[IbadahController::class, 'download'])->name('ibadah.SKTM');
    Route::get('ibadah/sk_kementrian/{filename}',[IbadahController::class, 'download1'])->name('ibadah.sk_kementrian');
    Route::get('ibadah/sk_SpengurusPusat/{filename}',[IbadahController::class, 'download2'])->name('ibadah.sk_SpengurusPusat');
    Route::get('ibadah/sk_pengurus/{filename}',[IbadahController::class, 'download3'])->name('ibadah.sk_pengurus');
    Route::get('ibadah/bio_pengurus/{filename}',[IbadahController::class, 'download4'])->name('ibadah.bio_pengurus');
    Route::get('ibadah/pasfoto_pengurus/{filename}',[IbadahController::class, 'download5'])->name('ibadah.pasfoto_pengurus');
    Route::get('ibadah/ktp_pengurus/{filename}',[IbadahController::class, 'download6'])->name('ibadah.ktp_pengurus');
    Route::get('ibadah/sk_domisili/{filename}',[IbadahController::class, 'download7'])->name('ibadah.sk_domisili');
    Route::get('ibadah/foto_ibadah/{filename}',[IbadahController::class, 'download8'])->name('ibadah.foto_ibadah');
    Route::get('ibadah/SKTMView/{filename}',[IbadahController::class, 'view'])->name('ibadah.SKTMView');
    Route::get('ibadah/sk_kementrianView/{filename}',[IbadahController::class, 'view1'])->name('ibadah.sk_kementrianView');
    Route::get('ibadah/sk_SpengurusPusatView/{filename}',[IbadahController::class, 'view2'])->name('ibadah.sk_SpengurusPusatView');
    Route::get('ibadah/sk_pengurusView/{filename}',[IbadahController::class, 'view3'])->name('ibadah.sk_pengurusView');
    Route::get('ibadah/bio_pengurusView/{filename}',[IbadahController::class, 'view4'])->name('ibadah.bio_pengurusView');
    Route::get('ibadah/pasfoto_pengurusView/{filename}',[IbadahController::class, 'view5'])->name('ibadah.pasfoto_pengurusView');
    Route::get('ibadah/ktp_pengurusView/{filename}',[IbadahController::class, 'view6'])->name('ibadah.ktp_pengurusView');
    Route::get('ibadah/sk_domisiliView/{filename}',[IbadahController::class, 'view7'])->name('ibadah.sk_domisiliView');
    Route::get('ibadah/foto_ibadahView/{filename}',[IbadahController::class, 'view8'])->name('ibadah.foto_ibadahView');
    Route::post('/ibadah/{ibadah}/selesai',[IbadahController::class, 'selesai'])->name('ibadah.selesai');
    Route::delete('/ibadah/{ibadah}',[IbadahController::class, 'destroy'])->name('ibadah.destroy');
    Route::post('/ibadah/{ibadah}/update',[IbadahController::class, 'update'])->name('ibadah.update');
    Route::post('/ibadah/{ibadah}/tolak',[IbadahController::class, 'tolak'])->name('ibadah.tolak');
    Route::post('/ibadah/{ibadah}/tolak/send',[IbadahController::class, 'send'])->name('ibadah.send');
    Route::post('/ibadah/{ibadah}/resubmit',[IbadahController::class, 'resubmit'])->name('ibadah.resubmit');
    Route::get('/ibadah/{ibadah}/pesanDitolak',[IbadahController::class, 'pesanDitolak'])->name('ibadah.pesanDitolak');
    Route::post('/ibadah/{ibadah}/surat',[Surat1Controller::class, 'create'])->name('ibadah.surat');
    Route::get('/ibadah/{ibadah}/pdf',[IbadahController::class, 'pdf'])->name('ibadah.pdf');
    Route::post('/ibadah/{ibadah}/suratrev',[Surat1Controller::class, 'edit'])->name('ibadah.suratrev');
    Route::post('/ibadah/{surat}/suratrev/update',[Surat1Controller::class, 'update'])->name('ibadah.suratrev.update');
    Route::post('/ibadah/{ibadah}/final',[IbadahController::class, 'final'])->name('ibadah.final');
    Route::get('ibadah/final/{filename}',[IbadahController::class, 'viewfinal'])->name('ibadah.finalview');
    Route::get('ibadah/finalD/{filename}',[IbadahController::class, 'downloadfinal'])->name('ibadah.finalD');
    Route::get('/search',[IbadahController::class, 'search'])->name('ibadah.search');
    Route::get('/search1',[IbadahController::class, 'search1'])->name('ibadah.search1');
    Route::get('/search2',[IbadahController::class, 'search2'])->name('ibadah.search2');
    

   
    



});
Route::middleware('auth')->name('penelitian.')->prefix('penelitian')->group(function() {
    Route::get('/', [PenelitianController::class, 'index'])->name('index');
    Route::get('/peneliian',[PenelitianController::class, 'create'])->name('penelitian.create');
    Route::post('/penelitian',[PenelitianController::class, 'store'])->name('penelitian.store');
    Route::delete('/penelitian/{penelitian}',[PenelitianController::class, 'destroy'])->name('penelitian.destroy');
    Route::get('/penelitian/{penelitian}',[PenelitianController::class, 'edit'])->name('penelitian.edit');
    Route::post('/penelitian/{penelitian}/update',[PenelitianController::class, 'update'])->name('penelitian.update');
    Route::get('penelitian/pengantar/{filename}',[PenelitianController::class, 'download'])->name('penelitian.pengantar');
    Route::get('penelitian/ktp/{filename}',[PenelitianController::class, 'download1'])->name('penelitian.ktp');
    Route::get('penelitian/pengantarView/{filename}',[PenelitianController::class, 'view'])->name('penelitian.pengantarView');
    Route::get('penelitian/ktpView/{filename}',[PenelitianController::class, 'view1'])->name('penelitian.ktpView');
    Route::get('/penelitian/{penelitian}/validasi',[PenelitianController::class, 'validasi'])->name('penelitian.validasi');
    Route::get('/penelitian/{penelitian}/pdf',[PenelitianController::class, 'pdf'])->name('penelitian.pdf');
    Route::post('/penelitian/{penelitian}/tolak',[PenelitianController::class, 'tolak'])->name('penelitian.tolak');
    Route::post('/penelitian/{penelitian}/tolak/send',[PenelitianController::class, 'send'])->name('penelitian.send');
    Route::get('/penelitian/{penelitian}/pesanDitolak',[PenelitianController::class, 'pesanDitolak'])->name('penelitian.pesanDitolak');
    Route::post('/penelitian/{penelitian}/resubmit',[PenelitianController::class, 'resubmit'])->name('penelitian.resubmit');
    Route::post('/penelitian/{penelitian}/selesai',[PenelitianController::class, 'selesai'])->name('penelitian.selesai');
    Route::post('/penelitian/{penelitian}/surat',[Surat2Controller::class, 'create'])->name('penelitian.surat');
    Route::post('/penelitian/{penelitian}/suratrev',[Surat2Controller::class, 'edit'])->name('penelitian.suratrev');
    Route::post('/penelitian/{surat}/suratrev/update',[Surat2Controller::class, 'update'])->name('penelitian.suratrev.update');
    Route::post('/penelitian/{penelitian}/final',[PenelitianController::class, 'final'])->name('penelitian.final');
    Route::get('penelitian/final/{filename}',[PenelitianController::class, 'viewfinal'])->name('penelitian.finalview');
    Route::get('penelitian/finalD/{filename}',[PenelitianController::class, 'downloadfinal'])->name('penelitian.finalD');
    Route::get('/search',[PenelitianController::class, 'search'])->name('penelitian.search');
    Route::get('/search1',[PenelitianController::class, 'search1'])->name('penelitian.search1');
    Route::get('/search2',[PenelitianController::class, 'search2'])->name('penelitian.search2');
    
    










});
Route::middleware('auth')->name('keramaian.')->prefix('keramaian')->group(function() {
    Route::get('/', [KeramaianController::class, 'index'])->name('index');
    Route::get('/keramaian',[KeramaianController::class, 'create'])->name('keramaian.create');
    Route::post('/keramaian',[KeramaianController::class, 'store'])->name('keramaian.store');
    Route::get('/keramaian/{keramaian}',[KeramaianController::class, 'edit'])->name('keramaian.edit');
    Route::get('keramaian/permohonan/{filename}',[KeramaianController::class, 'download'])->name('keramaian.permohonan');
    Route::get('keramaian/ktp/{filename}',[KeramaianController::class, 'download1'])->name('keramaian.ktp');
    Route::get('keramaian/permohonanView/{filename}',[KeramaianController::class, 'view'])->name('keramaian.permohonanView');
    Route::get('keramaian/ktpView/{filename}',[KeramaianController::class, 'view1'])->name('keramaian.ktpView');
    Route::post('/keramaian/{keramaian}/update',[KeramaianController::class, 'update'])->name('keramaian.update');
    Route::delete('/keramaian/{keramaian}',[KeramaianController::class, 'destroy'])->name('keramaian.destroy');
    Route::post('/keramaian/{keramaian}/tolak',[KeramaianController::class, 'tolak'])->name('keramaian.tolak');
    Route::post('/keramaian/{keramaian}/tolak/send',[KeramaianController::class, 'send'])->name('keramaian.send');
    Route::get('/keramaian/{keramaian}/pesanDitolak',[KeramaianController::class, 'pesanDitolak'])->name('keramaian.pesanDitolak');
    Route::post('/keramaian/{keramaian}/validasi',[KeramaianController::class, 'validasi'])->name('keramaian.validasi');
    Route::post('/keramaian/{keramaian}/selesai',[KeramaianController::class, 'selesai'])->name('keramaian.selesai');
    Route::post('/keramaian/{keramaian}/surat',[Surat4Controller::class, 'create'])->name('keramaian.surat');
    Route::post('/keramaian/{keramaian}/suratrev',[Surat4Controller::class, 'edit'])->name('keramaian.suratrev');
    Route::post('/keramaian/{surat}/suratrev/update',[Surat4Controller::class, 'update'])->name('keramaian.suratrev.update');
    Route::get('/keramaian/{keramaian}/pdf',[KeramaianController::class, 'pdf'])->name('keramaian.pdf');
    Route::post('/keramaian/{keramaian}/final',[KeramaianController::class, 'final'])->name('keramaian.final');
    Route::get('keramaian/final/{filename}',[KeramaianController::class, 'viewfinal'])->name('keramaian.finalview');
    Route::get('keramaian/finalD/{filename}',[KeramaianController::class, 'downloadfinal'])->name('keramaian.finalD');
    Route::get('/search',[KeramaianController::class, 'search'])->name('keramaian.search');
    Route::get('/search1',[KeramaianController::class, 'search1'])->name('keramaian.search1');
    Route::get('/search2',[KeramaianController::class, 'search2'])->name('keramaian.search2');






});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
