<?php

use App\Helpers\PasienHelper;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SEP\CariController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frond\SepController;
use App\Http\Controllers\SEP\DetailController;
use App\Http\Controllers\SEP\HistoyController;
use App\Http\Controllers\Back\PesertaController;
use App\Http\Controllers\SEP\UnduhSepController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\VerifiedNomorController;
use App\Http\Controllers\Referensi\DpjpController;
use App\Http\Controllers\Rujukan\RujukanController;
use App\Http\Controllers\SEP\FingerPrintController;
use App\Http\Controllers\Frond\NewRujukanController;
use App\Http\Controllers\Back\SEP\CetakSepController;
use App\Http\Controllers\Back\SEP\DeleteSepController;
use App\Http\Controllers\Frond\SuratKontrolController;
use App\Http\Controllers\SEP\HistoryPesertaController;
use App\Http\Controllers\Back\BridgingDokterController;
use App\Http\Controllers\RencanaKontrol\SkdpController;
use App\Http\Controllers\Rujukan\ListRujukanController;
use App\Http\Controllers\Back\SEP\FindByNomorController;
use App\Http\Controllers\Back\Monitoring\KlaimController;
use App\Http\Controllers\Peserta\DetailPesertaController;
use App\Http\Controllers\RencanaKontrol\FindSepController;
use App\Http\Controllers\Pasien\Frond\SelectOpsiController;
use App\Http\Controllers\Back\SEP\CetakSepThermalController;
use App\Http\Controllers\Peserta\FindByNomorKartuController;
use App\Http\Controllers\Auth\AuthenticatedPesertaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Back\Monitoring\KunjunganController;
use App\Http\Controllers\Back\SEP\CreateSepController;
use App\Http\Controllers\Back\SEP\InsertByAnjunganController;
use App\Http\Controllers\Frond\VerifikasiIdentitasController;
use App\Http\Controllers\RencanaKontrol\Sep\CariSepController;
use App\Http\Controllers\cetakSepAdmin\InsertSepAdminController;
use App\Http\Controllers\cetakSepAdmin\SelectOpsiAdminController;
use App\Http\Controllers\RencanaKontrol\RencanaKontrolController;
use App\Http\Controllers\Pasien\Frond\VerifiedIdentitasController;
use App\Http\Controllers\RencanaKontrol\ListSuratKontrolController;
use App\Http\Controllers\RencanaKontrol\DeleteRencanaKontrolController;
use App\Http\Controllers\cetakSepAdmin\VerifiedIdentitasAdminController;
use App\Http\Controllers\IcareController;
use App\Http\Controllers\LembarPengajuanKlaimController;
use App\Http\Controllers\Referensi\PoliController;
use App\Http\Controllers\RencanaKontrol\RencanaKontrolPasienKronisController;
use App\Http\Controllers\TesController;
use App\Models\Pasien;

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

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/dokumentasi', DocumentationController::class)
    ->middleware('auth')
    ->name('dokumentasi');

Route::get('/tes', [TesController::class, 'index'])
    ->name('tes');

// COUNT KLAIM DASHBOARD
Route::get('/status-klaim-rajal', [DashboardController::class, 'countKlaimRajal'])
    ->middleware('auth');
Route::get('/status-klaim-ranap', [DashboardController::class, 'countKlaimRanap'])
    ->middleware('auth');

// ROUTE VERIFIED IDENTITAS
// Route::get('/verify', [VerifiedNomorController::class, 'index'])
//     ->middleware('auth')
//     ->name('login.peserta.index');
// Route::post('/verify', [VerifiedNomorController::class, 'verified'])
//     ->middleware('auth')
//     ->name('verify');
// Route::get('/delete-session-verify', [VerifiedNomorController::class, 'forgetSessionIdentitas'])
//     ->middleware('auth')
//     ->name('back.verify');

// ROUTE RENCANA KONTROL
Route::prefix('rencana-kontrol')->name('rencana_kontrol.')->group(function () {
    Route::resource('kronis', RencanaKontrolPasienKronisController::class);
    Route::post('fetch/noSep', [RencanaKontrolPasienKronisController::class, 'fetchNoSep'])->name('fetchSep');
    Route::get('sep', FindSepController::class)->middleware(['auth'])->name('sep');
    Route::get('/skdp/create', [SkdpController::class, 'index'])->name('skdp.create');
    Route::get('/list', [ListSuratKontrolController::class, 'list'])->name('list');
    Route::get('/delete/{noSurat}', DeleteRencanaKontrolController::class)->name('delete');
});

Route::get('print', [NewRujukanController::class, 'cetak']);

// ROUTE RUJUKAN 
Route::prefix('rujukan')->name('rujukan.')->group(function () {
    Route::get('list', [RujukanController::class, 'list'])->middleware(['auth'])->name('list');
    Route::get('list/rs', [RujukanController::class, 'listRs'])->middleware(['auth'])->name('list.rs');
});

// ROUTE SEP
Route::prefix('sep')->name('sep.')->middleware(['auth'])->group(function () {
    Route::get('create/{noKartu}', [CreateSepController::class, 'create'])->name('create');
    Route::get('history', HistoryPesertaController::class)->name('history');
    Route::get('delete/{noSep}', DeleteSepController::class)->name('delete');
    Route::get('print/{noSep}', CetakSepController::class)->name('print');
    Route::get('print/thermal/{noSep}', CetakSepThermalController::class)->name('print.thermal');
    Route::get('detail/{noSep}', DetailController::class)->name('detail');
    Route::get('unduh/{noSep}', UnduhSepController::class)->name('unduh');
    Route::get('finger/list', [FingerPrintController::class, 'index'])->name('finger');
    Route::get('by-anjungan', [InsertByAnjunganController::class, 'index'])->name('by.anjungan');
});

//  LEMBAR PENGAJUAN KLAIM
Route::prefix('lpk')->name('lpk.')->group(function () {
    Route::get('/', [LembarPengajuanKlaimController::class, 'index'])->name('index');
});

// ROUTE CETAK SEP PETUGAS
Route::prefix('cetaksep')->name('cetaksep.')->group(function () {
    Route::get('/verify', [VerifiedIdentitasAdminController::class, 'index'])->name('verify');
    Route::post('/verify', [VerifiedIdentitasAdminController::class, 'store'])->name('verify');
    Route::get('/forget-session', [VerifiedIdentitasAdminController::class, 'forgetSessionIdentitas'])->name('forget');
    Route::get('/select-item', [SelectOpsiAdminController::class, 'index'])->name('dashboard');
    // Route::get('/rujukan', [RujukanNewController::class, 'insertSEP'])->name('rujukan.sep');
    Route::get('/sep/create/byRujukan', [InsertSepAdminController::class, 'byNewRujukan'])->name('rujukan.sep');
    Route::get('/sep/create/kontrol', [InsertSepAdminController::class, 'byOldSepAndAddSuratKontrol'])->name('rencankontrol.sep');
});

// ROUTE PESERTA 
Route::get('peserta/{param}', [PesertaController::class, 'index'])->middleware(['auth'])
    ->name('peserta');
Route::get('peserta/detail/{noKartu}', DetailPesertaController::class)->middleware(['auth'])->name('peserta.detail');


// MONITORING
Route::prefix('monitoring')->name('monitoring.')->group(function () {
    Route::get('klaim', [KlaimController::class, 'index'])->middleware(['auth'])->name('klaim');
    Route::get('kunjungan', [KunjunganController::class, 'index'])->middleware(['auth'])->name('kunjungan');
});

// BRIDGING RS || BPJS
Route::prefix('bridging')->name('bridging.')->group(function () {
    Route::resource('dokter', BridgingDokterController::class)->middleware(['auth']);
    Route::post('find-dokter', [BridgingDokterController::class, 'findDokter'])->middleware(['auth'])->name('findDokter');
});

Route::get('test', function () {
    $noMR = PasienHelper::generateNoMR('0001405144754');
    dd($noMR);
});

// // 
// Route::prefix('SEP')->name('sep.')->group(function () {
//     // Route::get('cari', [FindByNomorController::class, 'index'])->middleware(['auth'])->name('cari');
//     Route::get('detail/{noSep}', DetailController::class)->middleware(['auth'])->name('detail');
//     Route::get('delete/{noSep}', [FindByNomorController::class, 'deleteSep'])->middleware(['auth'])->name('delete');
// });


Route::get('/select', [VerifikasiIdentitasController::class, 'index']);
Route::post('/verifikasi', [VerifikasiIdentitasController::class, 'proses'])->name('verifikasi.identitas');
Route::get('/rujukan/{nomorKartu}', [VerifikasiIdentitasController::class, 'selectRujukan'])->name('rujukan.select');
Route::get('/rujukan/baru/{nomorKartu}', [NewRujukanController::class, 'index'])->name('rujukan.baru');
Route::get('/suratkontrol/{nomorKartu}', [SuratKontrolController::class, 'index'])->name('surat.kontrol');

// SEP  back end

// Route::get('sep/{nomorKartu}', [SepController::class, 'index']);
// Route::get('sep/cari/{nomorSep}', [CariController::class, 'index']);
// Route::get('rencana', [RencanaKontrolController::class, 'index']);
// Route::get('khusus', [RujukanController::class, 'listRujukanKhusus']);
// Route::get('sep/history/{nomorKartu}', [HistoyController::class, 'index']);


Route::get('/rujukan/biodata/{noIdentitas}', [VerifikasiIdentitasController::class, 'identitas'])->middleware(['auth'])->name('rujukan.biodata');
// Route::get('/rujukan/list/{noIdentitas}', [VerifikasiIdentitasController::class, 'listRujukan'])->middleware(['auth'])->name('rujukan.list');



Route::get('rujukan/{nomorRujukan}', [RujukanController::class, 'byNomorRujukan'])->name('rujukan.index');

Route::get('dpjp', [DpjpController::class, 'getDpjp']);
Route::get('poli/{kodePoli}', [PoliController::class, 'getPoli']);



// Route::get('SEP/{nomorSEP}', [CariController::class, 'index']);
// Route::get('/SEP/finger/{tanggal}', [FingerPrintController::class, 'index']);
// Route::get('SEP/{noSEP}', [CariController::class, 'index']);

require __DIR__ . '/auth.php';
require __DIR__ . '/pasien.php';
require __DIR__ . '/manage_user.php';
require __DIR__ . '/anjungan.php';
