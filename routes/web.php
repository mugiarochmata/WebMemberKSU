<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KsuAuthController;
use App\Http\Controllers\SubmissionController;

//---------------------------------------------------------------------------------------//
//Routes Blog
Route::get('/', 'AppController@berandablog');
Route::get('/profil', 'AppController@profilblog');
Route::get('/layanan', 'AppController@layananblog');
Route::get('/informasi', 'AppController@informasiblog');
Route::get('/kontak', 'AppController@kontakblog');
//Route::get('/login', 'AppController@login');
//---------------------------------------------------------------------------------------//
//Routes Anggota
Route::get('/dashboard', 'Dashboard@dashboardanggota');
Route::get('/simulasi', 'AppController@simulasianggota');
//Simpanan
Route::get('/simpananku', 'AppController@simpanankuanggota');
Route::get('/historyperubahansimpanan', 'AppController@historyperubahansimpanananggota');
Route::get('/historypenarikansimpanan', 'AppController@historypenarikansimpanananggota');
Route::get('/accountstatementsimpanan', 'AppController@accountstatementsimpanananggota');
Route::get('/linksimpananku', 'AppController@linksimpanankuanggota');
//Simplus
Route::get('/simplusku', 'AppController@simpluskuanggota');
Route::get('/accountstatementsimplus', 'AppController@accountstatementsimplusanggota');
Route::get('/historypengajuansimplus', 'AppController@historypengajuansimplusanggota');
Route::get('/historypencairansimplus', 'AppController@historypencairansimplusanggota');
Route::get('/linksimplusku', 'AppController@linksimpluskuanggota');
//Pinjaman
Route::get('/pinjamanku', 'AppController@pinjamankuanggota');
Route::get('/linkpinjamanku', 'AppController@linkpinjamankuanggota');
Route::get('/historypengajuanpinjaman', 'AppController@historypengajuanpinjamananggota');
Route::get('/historypembayaranpinjaman', 'AppController@historypembayaranpinjamananggota');
Route::get('/historypelunasanpinjaman', 'AppController@historypelunasanpinjamananggota');
Route::get('/jadwalangsuranpinjaman', 'AppController@jadwalangsuranpinjamananggota');
//Pengajuan
Route::get('/pengajuanku', 'AppController@pengajuankuanggota');
Route::get('/perubahansimpanan', 'AppController@perubahansimpanananggota');
Route::get('/penarikansimpanan', 'AppController@penarikansimpanananggota');
Route::get('/pengajuansimplus', 'AppController@pengajuansimplusanggota');
Route::get('/pengajuanpinjaman', 'AppController@pengajuanpinjamananggota');
Route::get('/rehabpinjaman', 'AppController@rehabpinjamananggota');
Route::get('/pembayaranangsuran', 'AppController@pembayaranangsurananggota');
Route::get('/pelunasanpinjaman', 'AppController@pelunasanpinjamananggota');
Route::get('/pembukaansimplus', 'AppController@pembukaansimplusanggota');
Route::get('/pencairansimplus', 'AppController@pencairansimplusanggota');
Route::get('/pinjamanbaru', 'AppController@pinjamanbaruanggota');

Route::get('login', [KsuAuthController::class, 'login']);
Route::get('register', [KsuAuthController::class, 'register'])->name('register');
Route::get('cekuser', [KsuAuthController::class, 'cekUser']);
Route::post('logout', [KsuAuthController::class, 'logout'])->name('logout');
Route::post('token', [KsuAuthController::class, 'getToken'])->name('token');
Route::get('user', [KsuAuthController::class, 'getUser'])->name('user');

Route::get('submission/all/{page?}/{size?}/', [SubmissionController::class, 'all'])->name('submission.all');
Route::get('submission/mysubmission/{page?}/{size?}/', [SubmissionController::class, 'mysubmission'])->name('submission.mysubmission');
Route::get('submission/detailsubmission/{id}', [SubmissionController::class, 'detailsubmission'])->name('submission.detail');


Route::get('submission/loadData/', [SubmissionController::class, 'loadData'])->name('submission.loadData');
Route::get('submission/register/', [SubmissionController::class, 'register'])->name('submission.register');
Route::post('submission/submitregister', [SubmissionController::class, 'submitRegister'])->name('submission.submitregister');
Route::get('submission/pinjaman/', [SubmissionController::class, 'pinjaman'])->name('submission.pinjaman');
Route::post('submission/submitpinjaman', [SubmissionController::class, 'submitPinjaman'])->name('submission.submitpinjaman');
Route::get('submission/transaksi/', [SubmissionController::class, 'transaksi'])->name('submission.transaksi');
Route::post('submission/submittransaksi', [SubmissionController::class, 'submitTransaksi'])->name('submission.submittransaksi');
Route::get('submission/perubahan-simpanan/', [SubmissionController::class, 'perubahanSimpanan'])->name('submission.perubahanSimpanan');
Route::post('submission/submit-perubahan-simpanan', [SubmissionController::class, 'submitPerubahanSimpanan'])->name('submission.submitPerubahanSimpanan');
Route::get('submission/penarikan-simpanan/', [SubmissionController::class, 'penarikanSimpanan'])->name('submission.penarikanSimpanan');
Route::post('submission/submit-penarikan-simpanan', [SubmissionController::class, 'submitPenarikanSimpanan'])->name('submission.submitPenarikanSimpanan');
Route::get('submission/getsaving/{id}',  [SubmissionController::class, 'getSaving'])->name('submission.getSaving');
Route::get('submission/pembukaan-simplus/', [SubmissionController::class, 'pembukaanSimplus'])->name('submission.pembukaanSimplus');
Route::post('submission/submit-pembukaan-simplus', [SubmissionController::class, 'submitPembukaanSimplus'])->name('submission.submitPembukaanSimplus');
Route::get('submission/break-simplus/', [SubmissionController::class, 'breakSimplus'])->name('submission.breakSimplus');
Route::post('submission/submit-break-simplus', [SubmissionController::class, 'submitBreakSimplus'])->name('submission.submitBreakSimplus');
Route::get('submission/getdeposito/{id}',  [SubmissionController::class, 'getDeposito'])->name('submission.getDeposito');
Route::get('submission/perubahan-pinjaman/', [SubmissionController::class, 'perubahanPinjaman'])->name('submission.perubahanPinjaman');
Route::post('submission/submit-perubahan-pinjaman', [SubmissionController::class, 'submitPerubahanPinjaman'])->name('submission.submitPerubahanPinjaman');
Route::get('submission/getloan/{id}',  [SubmissionController::class, 'getLoan'])->name('submission.getLoan');
Route::get('submission/getdetailloan/{id}',  [SubmissionController::class, 'getDetailLoan'])->name('submission.getDetailLoan');
Route::get('submission/getdetailloans/{id}',  [SubmissionController::class, 'getDetailLoans'])->name('submission.getDetailLoans');
Route::get('submission/bayar-manual-angsuran/', [SubmissionController::class, 'bayarManualAngsuran'])->name('submission.bayarManualAngsuran');
Route::post('submission/submit-bayar-manual-angsuran', [SubmissionController::class, 'submitBayarManualAngsuran'])->name('submission.submitBayarManualAngsuran');
Route::get('submission/pelunasan-dipercepat/', [SubmissionController::class, 'pelunasanDipercepat'])->name('submission.pelunasanDipercepat');
Route::post('submission/submit-pelunasan-dipercepat', [SubmissionController::class, 'submitPelunasanDipercepat'])->name('submission.submitPelunasanDipercepat');
Route::get('submission/pelunasan-sebagian/', [SubmissionController::class, 'pelunasanSebagian'])->name('submission.pelunasanSebagian');
Route::post('submission/submit-pelunasan-sebagian', [SubmissionController::class, 'submitPelunasanSebagian'])->name('submission.submitPelunasanSebagian');
Route::post('submission/getmembersaving', [SubmissionController::class, 'getMembersaving'])->name('submission.getMembersaving');
Route::post('submission/getmembersavinglist', [SubmissionController::class, 'getMembersavinglist'])->name('submission.getMembersavinglist');
Route::post('submission/getmember', [SubmissionController::class, 'getMember'])->name('submission.getMember');
Route::get('submission/getproductloan/{id}', [SubmissionController::class, 'getProductLoan'])->name('submission.getProductLoan');
Route::get('submission/getproductloankind/{id}', [SubmissionController::class, 'getProductLoanKindId'])->name('submission.getProductLoanKindId');
Route::post('submission/getmemberloanlist', [SubmissionController::class, 'getMemberloanlist'])->name('submission.getMemberloanlist');
Route::post('submission/getsimpluslist', [SubmissionController::class, 'getSimpluslist'])->name('submission.getSimpluslist');
Route::get('submission/getcoa/{id}', [SubmissionController::class, 'getCoa'])->name('submission.getcoa');
Route::get('submission/getjurnal/{id}', [SubmissionController::class, 'getJurnal'])->name('submission.getjurnal');
Route::post('submission/getlimit', [SubmissionController::class, 'getLimit'])->name('submission.getlimit');


//This Routes of root template
Route::get('/2', function () {
    return view('index');
})->name('page');

Route::get('/home', function () {
    return view('index');
})->name('page');

Route::get('/index', function () {
    return view('index');
})->name('page');

Route::get('/index-1', function () {
    return view('index-1');
})->name('index-1');
Route::get('/index-2', function () {
    return view('index-2');
})->name('index-2');
Route::get('/index-3', function () {
    return view('index-3');
})->name('index-3');
Route::get('/index-slide', function () {
    return view('index-slide');
})->name('index-slide');
Route::get('/doctor-dashboard', function () {
    return view('doctor-dashboard');
});
Route::get('/appointments', function () {
    return view('appointments');
});
Route::get('/schedule-timings', function () {
    return view('schedule-timings');
});
Route::get('/my-patients', function () {
    return view('my-patients');
});
Route::get('/patient-profile', function () {
    return view('patient-profile');
});
Route::get('/chat-doctor', function () {
    return view('chat-doctor');
})->name('chat-doctor');
Route::get('/invoices', function () {
    return view('invoices');
});
Route::get('/doctor-profile-settings', function () {
    return view('doctor-profile-settings');
});
Route::get('/reviews', function () {
    return view('reviews');
});
Route::get('/doctor-register', function () {
    return view('doctor-register');
})->name('doctor-register');
Route::get('/map-grid', function () {
    return view('map-grid');
})->name('map-grid');
Route::get('/map-list', function () {
    return view('map-list');
})->name('map-list');
Route::get('/search', function () {
    return view('search');
})->name('search');
Route::get('/doctor-profile', function () {
    return view('doctor-profile');
})->name('doctor-profile');
Route::get('/booking', function () {
    return view('booking');
})->name('booking');
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
Route::get('/booking-success', function () {
    return view('booking-success');
})->name('booking-success');
Route::get('/patient-dashboard', function () {
    return view('patient-dashboard');
})->name('patient-dashboard');
Route::get('/favourites', function () {
    return view('favourites');
})->name('favourites');
Route::get('/change-password', function () {
    return view('change-password');
})->name('change-password');
Route::get('/profile-settings', function () {
    return view('profile-settings');
})->name('profile-settings');
Route::get('/chat', function () {
    return view('chat');
})->name('chat');
Route::get('/voice-call', function () {
    return view('voice-call');
})->name('voice-call');
Route::get('/video-call', function () {
    return view('video-call');
})->name('video-call');
Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');
Route::get('/components', function () {
    return view('components');
})->name('components');
Route::get('/invoice-view', function () {
    return view('invoice-view');
})->name('invoice-view');
Route::get('/blank-page', function () {
    return view('blank-page');
})->name('blank-page');
Route::get('/login2', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');
Route::get('/blog-list', function () {
    return view('blog-list');
})->name('blog-list');
Route::get('/blog-grid', function () {
    return view('blog-grid');
})->name('blog-grid');
Route::get('/blog-details', function () {
    return view('blog-details');
})->name('blog-details');
Route::get('/add-billing', function () {
    return view('add-billing');
});
Route::get('/add-prescription', function () {
    return view('add-prescription');
});
Route::get('/edit-billing', function () {
    return view('edit-billing');
});
Route::get('/edit-prescription', function () {
    return view('edit-prescription');
});
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');
Route::get('/social-media', function () {
    return view('social-media');
})->name('social-media');
Route::get('/term-condition', function () {
    return view('term-condition');
})->name('term-condition');
Route::get('/doctor-change-password', function () {
    return view('doctor-change-password');
})->name('doctor-change-password');
Route::get('/cart', function () {
    return view('cart');
})->name('cart');
Route::get('/doctor-add-blog', function () {
    return view('doctor-add-blog');
})->name('doctor-add-blog');
Route::get('/doctor-blog', function () {
    return view('doctor-blog');
})->name('doctor-blog');
Route::get('/doctor-pending-blog', function () {
    return view('doctor-pending-blog');
})->name('doctor-pending-blog');
Route::get('/edit-blog', function () {
    return view('edit-blog');
})->name('edit-blog');
Route::get('/payment-success', function () {
    return view('payment-success');
})->name('payment-success');
Route::get('/pharmacy-details', function () {
    return view('pharmacy-details');
})->name('pharmacy-details');
Route::get('/pharmacy-index', function () {
    return view('pharmacy-index');
})->name('pharmacy-index');
Route::get('/pharmacy-search', function () {
    return view('pharmacy-search');
})->name('pharmacy-search');
Route::get('/product-all', function () {
    return view('product-all');
})->name('product-all');
Route::get('/product-checkout', function () {
    return view('product-checkout');
})->name('product-checkout');
Route::get('/product-description', function () {
    return view('product-description');
})->name('product-description');
Route::get('/product-healthcare', function () {
    return view('product-healthcare');
})->name('product-healthcare');
/*****************ADMIN ROUTES*******************/
Route::Group(['prefix' => 'admin'], function () {
    Route::get('/index_admin', function () {
        return view('admin.index_admin');
    })->name('pagee');
    Route::get('/appointment-list', function () {
        return view('admin.appointment-list');
    })->name('appointment-list');
    Route::get('/specialities', function () {
        return view('admin.specialities');
    })->name('specialities');
    Route::get('/doctor-list', function () {
        return view('admin.doctor-list');
    })->name('doctor-list');
    Route::get('/patient-list', function () {
        return view('admin.patient-list');
    })->name('patient-list');
    Route::get('/reviews', function () {
        return view('admin.reviews');
    })->name('reviews');
    Route::get('/transactions-list', function () {
        return view('admin.transactions-list');
    })->name('transactions-list');
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');
    Route::get('/invoice-report', function () {
        return view('admin.invoice-report');
    })->name('invoice-report');
    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('profile');
    Route::get('/login', function () {
        return view('admin.login');
    })->name('login');
    Route::get('/register', function () {
        return view('admin.register');
    })->name('register');
    Route::get('/forgot-password', function () {
        return view('admin.forgot-password');
    })->name('forgot-password');
    Route::get('/lock-screen', function () {
        return view('admin.lock-screen');
    })->name('lock-screen');
    Route::get('/error-404', function () {
        return view('admin.error-404');
    })->name('error-404');
    Route::get('/error-500', function () {
        return view('admin.error-500');
    })->name('error-500');
    Route::get('/blank-page', function () {
        return view('admin.blank-page');
    })->name('blank-page');
    Route::get('/components', function () {
        return view('admin.components');
    })->name('components');
    Route::get('/form-basic-inputs', function () {
        return view('admin.form-basic-inputs');
    })->name('form-basic');
    Route::get('/form-input-groups', function () {
        return view('admin.form-input-groups');
    })->name('form-inputs');
    Route::get('/form-horizontal', function () {
        return view('admin.form-horizontal');
    })->name('form-horizontal');
    Route::get('/form-vertical', function () {
        return view('admin.form-vertical');
    })->name('form-vertical');
    Route::get('/form-mask', function () {
        return view('admin.form-mask');
    })->name('form-mask');
    Route::get('/form-validation', function () {
        return view('admin.form-validation');
    })->name('form-validation');
    Route::get('/tables-basic', function () {
        return view('admin.tables-basic');
    })->name('tables-basic');
    Route::get('/data-tables', function () {
        return view('admin.data-tables');
    })->name('data-tables');
    Route::get('/invoice', function () {
        return view('invoice');
    })->name('invoice');
    Route::get('/calendar', function () {
        return view('admin.calendar');
    })->name('calendar');
    Route::get('/blog', function () {
        return view('admin.blog');
    })->name('blog');
    Route::get('/blog-details', function () {
        return view('admin.blog-details');
    })->name('blog-details');
    Route::get('/add-blog', function () {
        return view('admin.add-blog');
    })->name('add-blog');
    Route::get('/edit-blog', function () {
        return view('admin.edit-blog');
    })->name('edit-blog');
    Route::get('/product-list', function () {
        return view('admin.product-list');
    })->name('product-list');
    Route::get('/pharmacy-list', function () {
        return view('admin.pharmacy-list');
    })->name('pharmacy-list');
    Route::get('/pending-blog', function () {
        return view('admin.pending-blog');
    })->name('pending-blog');
});
/********************ADMIN ROUTES END******************************/
/********************PHARMACY ADMIN********************************/
Route::Group(['prefix' => 'pharmacy-admin'], function () {
    Route::get('/index_pharmacy_admin', function () {
        return view('pharmacy-admin.index_pharmacy_admin');
    })->name('pagees');
    Route::get('/products', function () {
        return view('pharmacy-admin.products');
    })->name('products');
    Route::get('/add-product', function () {
        return view('pharmacy-admin.add-product');
    })->name('add-product');
    Route::get('/outstock', function () {
        return view('pharmacy-admin.outstock');
    })->name('outstock');
    Route::get('/expired', function () {
        return view('pharmacy-admin.expired');
    })->name('expired');
    Route::get('/categories', function () {
        return view('pharmacy-admin.categories');
    })->name('categories');
    Route::get('/purchase', function () {
        return view('pharmacy-admin.purchase');
    })->name('purchase');
    Route::get('/add-purchase', function () {
        return view('pharmacy-admin.add-purchase');
    })->name('add-purchase');
    Route::get('/order', function () {
        return view('pharmacy-admin.order');
    })->name('order');
    Route::get('/sales', function () {
        return view('pharmacy-admin.sales');
    })->name('sales');
    Route::get('/supplier', function () {
        return view('pharmacy-admin.supplier');
    })->name('supplier');
    Route::get('/add-supplier', function () {
        return view('pharmacy-admin.add-supplier');
    })->name('add-supplier');
    Route::get('/transactions-list', function () {
        return view('pharmacy-admin.transactions-list');
    })->name('transactions-list');
    Route::get('/invoice-report', function () {
        return view('pharmacy-admin.invoice-report');
    })->name('invoice-report');
    Route::get('/profile', function () {
        return view('pharmacy-admin.profile');
    })->name('profile');
    Route::get('/settings', function () {
        return view('pharmacy-admin.settings');
    })->name('settings');
    Route::get('/customer-orders', function () {
        return view('pharmacy-admin.customer-orders');
    })->name('customer-orders');
    Route::get('/edit-product', function () {
        return view('pharmacy-admin.edit-product');
    })->name('edit-product');
    Route::get('/edit-purchase', function () {
        return view('pharmacy-admin.edit-purchase');
    })->name('edit-purchase');
    Route::get('/edit-supplier', function () {
        return view('pharmacy-admin.edit-supplier');
    })->name('edit-supplier');
    Route::get('/invoice', function () {
        return view('pharmacy-admin.invoice');
    })->name('invoice');
    Route::get('/product-list', function () {
        return view('pharmacy-admin.product-list');
    })->name('product-list');
});
