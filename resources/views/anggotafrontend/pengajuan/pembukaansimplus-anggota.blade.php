@extends('anggotafrontend.index-anggota')
@section('content2')
<div class="card dash-card">
    <div class="card-body">
        <form action="#">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Jenis Produk</label>
                        <div class="col-lg-9">
                            <select class="select">
                                <option value="1">PD001-Simpanan Plus</option>
                                <option value="2">-------</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nominal Penempatan</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-lg-5 col-form-label">Jangka Waktu</label>
                        <div class="col-lg-3">
                            <select class="select">
                                <option value="1">1</option>
                                <option value="1">3</option>
                                <option value="1">6</option>
                                <option value="1">12</option>
                                <option value="1">24</option>
                            </select>
                        </div>
                        <label class="col-lg-4 col-form-label">Bulan</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Opsi ARO</label>
                        <div class="col-lg-2">
                            <select class="select">
                                <option value="1">ARO P + I</option>
                                <option value="1">ARO P</option>
                                <option value="1">Non ARO</option>
                            </select>
                        </div>
                        <label class="col-lg-8 col-form-label">Keterangan Simplus akan otomatis dikumulatif Pokok (P) dan Bunga (I) pada saat jatuh tempo</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Nama Bank</label>
                        <div class="col-lg-8">
                            <select class="select">
                                <option value="1">008 - Mandiri</option>
                                <option value="1">212 - BWS</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label">Nominal Penempatan</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Keterangan</label>
                        <div class="col-md-10">
                            <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-form-label col-md-2"></label>
                    <div class="col-md-10">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection('content2')