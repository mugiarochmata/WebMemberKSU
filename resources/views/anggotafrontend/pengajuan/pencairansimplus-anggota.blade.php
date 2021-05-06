@extends('anggotafrontend.index-anggota')
@section('content2')
<div class="card dash-card">
    <div class="card-body">
        <form action="#">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">No. Bilyet</label>
                        <div class="col-lg-6">
                            <select class="select">
                                <option value="1">Dxxxxx - Simplus</option>
                                <option value="2">------</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="appointment-tab">

            <div class="tab-content">

                <!-- Upcoming Appointment Tab -->
                <div class="tab-pane show active" id="upcoming-appointments">
                    <div class="card card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-center mb-0">
                                    <tr>
                                        <th class="text-center">No. Bilyet</th>
                                        <td class="text-center" colspan="3">D00001</td>
                                        <th class="text-center">Kode Produk</th>
                                        <td class="text-center">PD001</td>
                                        <th class="text-center">Jenis Produk</th>
                                        <td class="text-center">Simpanan Plus</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Penempatan</th>
                                        <td class="text-center">Rp. 1.000.000.000</td>
                                        <th class="text-center">Rate Bunga</th>
                                        <td class="text-center">7.5%</td>
                                        <th class="text-center">Tgl. Mulai</th>
                                        <td class="text-center">2020-01-01</td>
                                        <th class="text-center">Tgl. Selesai</th>
                                        <td class="text-center">2020-01-01</td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Nominal Pokok</th>
                                        <td class="text-center" colspan="3">Rp. 100.000.000</td>
                                        <th class="text-center">Akumulasi Bunga</th>
                                        <td class="text-center" colspan="3">PD001</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Upcoming Appointment Tab -->


        </div>
    </div>
</div>
<h5>Keterangan Tambahan</h5>
<div class="card dash-card">
    <div class="card-body">
        <form action="#">
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
                        <label class="col-md-5 col-form-label">No. Rekening</label>
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