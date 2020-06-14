<?php

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

Route::get('/', function () {
    return redirect()->route('beranda.index');
});

// hanya untuk tamu yg belum auth
Route::get('/login', 'LoginController@getLogin')->middleware('guest');
Route::post('/login', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@logout');

Route::group(['prefix' => 'user'], function() {
    Route::group(['prefix' => 'profil'], function() {
        Route::get('upcoming', 'UserController@upcoming')->name('profile.upcoming');
        Route::get('past', 'UserController@past')->name('profile.past');

        // Certificate
        Route::get('certificate', 'PelatihanController@certificateFrm')->name('profile.certificate.frm');
        Route::get('print-certificate/{trnid}/{stdid}', 'PelatihanController@certificatePrint')->name('profile.certificate.print');
    });

    Route::get('profil-upt', function() { return view('user.profil-upt.index'); })->name('profilupt.index');
    Route::get('/', function() { return redirect()->route('beranda.index'); });
    Route::get('beranda', function () { return view('user.beranda.index'); })->name('beranda.index');

    Route::group(['prefix' => 'pelatihan', 'middleware' => ['auth:user']], function() {
        Route::get('/', 'PelatihanController@index')->name('pelatihan.index');
        Route::get('detail/{pelatihanid}', 'PelatihanController@detail')->name('pelatihan.detail');
        Route::get('register/{pelatihanid}', 'PelatihanController@register')->name('pelatihan.register');
        Route::get('cancelled/{pelatihanid}', 'PelatihanController@cancelled')->name('pelatihan.cancel');
        Route::get('ticket/{pelatihanid}/{studentid}', 'PelatihanController@ticket')->name('pelatihan.ticket');
        Route::get('ticket/generate/{pelatihanid}/{studentid}', 'PelatihanController@generateTicket')->name('pelatihan.ticket.generate');
    });

    Route::group(['prefix' => 'loker'], function() {
        Route::get('/', 'LokerController@index')->name('loker.index');
        Route::get('detail/{lokerid}', 'LokerController@detail')->name('loker.detail');
        Route::get('q', 'LokerController@search')->name('loker.search');
    });

    Route::group(['prefix' => 'berita'], function() {
        Route::get('/', 'BeritaController@index')->name('berita.index');
        Route::get('detail/{beritaid}', 'BeritaController@detail')->name('berita.detail');
    });

    Route::group(['prefix' => 'kontak'], function() {
        Route::get('/', function() {
            return view('user.kontak.index');
        })->name('kontak.index');
    });
});

Route::group(['prefix' => 'upt'], function() {
    Route::get('/', function() { 
        return redirect()->route('dashboard');
    });
    Route::get('dashboard', function() {
        return view('upt.index');
    })->name('dashboard');

    Route::group(['prefix' => 'pelatihan'], function() {
        Route::get('create', 'PelatihanController@create')->name('upt.pelatihan.create');
        Route::post('store', 'PelatihanController@store')->name('upt.pelatihan.store');
        Route::get('today', 'PelatihanController@today')->name('upt.pelatihan.list');
        Route::get('display/{pelatihanid}', 'PelatihanController@display')->name('upt.pelatihan.display');
        Route::get('edit/{pelatihanid}', 'PelatihanController@edit')->name('upt.pelatihan.edit');
        Route::post('update/{pelatihanid}', 'PelatihanController@update')->name('upt.pelatihan.update');
        Route::get('destroy/{pelatihanid}', 'PelatihanController@destroy')->name('upt.pelatihan.remove');
        Route::get('report', 'PelatihanController@report')->name('upt.pelatihan.report');

        Route::group(['prefix' => 'info'], function() {
            // Pelatihan per satuan tayang
            Route::get('today', 'PelatihanController@today')->name('upt.pelatihan.today');
            Route::get('preview/{pelatihanid}', 'PelatihanController@preview')->name('upt.pelatihan.review');
            Route::get('past', 'PelatihanController@past')->name('upt.pelatihan.past');
            Route::get('upcoming', 'PelatihanController@upcoming')->name('upt.pelatihan.upcoming');

            // Konfirmasi kehadiran dan tutup rsvp
            Route::get('confirm/{pelatihanid}', 'PelatihanController@confirmFrm')->name('upt.pelatihan.comfirm.frm');
            Route::post('confirm', 'PelatihanController@confirmProcess')->name('upt.pelatihan.confirm.process');
            Route::get('close-rsvp/{pelatihanid}', 'PelatihanController@close_rsvp')->name('upt.pelatihan.close.rsvp');

            // Reporting
            Route::get('report', 'PelatihanController@report')->name('upt.pelatihan.report');
            Route::get('rekapitulasi/{pelatihanid}', 'PelatihanController@rekapitulasiFrm')->name('upt.pelatihan.rekapitulasi.frm');

            // Certificate
            Route::get('send-certificate/{trnid}', 'PelatihanController@sendCertificate')->name('upt.pelatihan.send.certificate');
        });
    });

    Route::group(['prefix' => 'berita'], function() {
        Route::get('list', 'BeritaController@list')->name('upt.berita.list');
        Route::get('create', 'BeritaController@create')->name('upt.berita.create');
        Route::post('store', 'BeritaController@store')->name('upt.berita.store');
        Route::get('display/{beritaid}', 'BeritaController@display')->name('upt.berita.display');
        Route::get('edit/{beritaid}', 'BeritaController@edit')->name('upt.berita.edit');
        Route::post('update/{beritaid}', 'BeritaController@update')->name('upt.berita.update');
        Route::get('destroy/{beritaid}', 'BeritaController@destroy')->name('upt.berita.remove');
    }); 

    Route::group(['prefix' => 'loker'], function() {
        Route::get('list', 'LokerController@list')->name('upt.loker.list');
        Route::get('create', 'LokerController@create')->name('upt.loker.create');
        Route::post('store', 'LokerController@store')->name('upt.loker.store');
        Route::get('display/{lokerid}', 'LokerController@display')->name('upt.loker.display');
        Route::get('edit/{lokerid}', 'LokerController@edit')->name('upt.loker.edit');
        Route::post('update/{lokerid}', 'LokerController@update')->name('upt.loker.update');
        Route::get('destroy/{lokerid}', 'LokerController@destroy')->name('upt.loker.remove');
    });
});

Route::group([
    'prefix' => 'laravel-filemanager',
    // 'middleware' => ['web', 'auth']
], function () {
    \UniSharp\Laravelfilemanager\Lfm::routes(); 
});

Route::get('students', function() {
    return view('allstudent');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
