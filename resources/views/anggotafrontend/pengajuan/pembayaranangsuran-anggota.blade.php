@extends('anggotafrontend.index-anggota')
@section('content2')
<div class="card dash-card">
    <div class="card-body">
        <form action="#">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label">No. Pinjaman</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-lg-6 col-form-label">Jenis Pinjaman</label>
                        <div class="col-lg-6">
                            <select class="select">
                                <option value="1">Arisan</option>
                                <option value="2">Tidak Disetujui</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-lg-6 col-form-label">Status</label>
                        <div class="col-lg-6">
                            <select class="select">
                                <option value="1">Aktif</option>
                                <option value="2">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-1">
                    <div class="text-right mt-1">
                        <button type="submit" class="btn btn-primary">Filter</button>
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
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No. Pinjaman</th>
                                            <th class="text-center">Plafond</th>
                                            <th class="text-center">Outstanding</th>
                                            <th class="text-center">Tenor</th>
                                            <th class="text-center">Tgl. Mulai</th>
                                            <th class="text-center">Tgl. Akhir</th>
                                            <th class="text-center">Bunga</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">SPS001202101120004</td>
                                            <td class="text-right">Rp. 100.000.000</td>
                                            <td class="text-right">Rp. 100.000.000</td>
                                            <td class="text-center">1 bulan</td>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">7.5 %</td>
                                            <td class="text-center"><button type="button" class="btn btn-rounded btn-success">Aktif</button></td>
                                            <td class="text-center"><button type="button" class="btn btn-rounded btn-primary">Bayar</button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">SPS001202101120004</td>
                                            <td class="text-right">Rp. 100.000.000</td>
                                            <td class="text-right">Rp. 100.000.000</td>
                                            <td class="text-center">1 bulan</td>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">7.5 %</td>
                                            <td class="text-center"><button type="button" class="btn btn-rounded btn-success">Aktif</button></td>
                                            <td class="text-center"><button type="button" class="btn btn-rounded btn-primary">Bayar</button></td>
                                        </tr>
                                    </tbody>
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
<div class="card dash-card">
    <div class="card-body">
        <form action="#">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">Produk Pinjaman</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">Jenis Pinjaman</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">Jumlah Tunggakan</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-8 col-form-label">Pokok</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Bunga</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">Nominal Pembayaran</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Metode Pembayaran</label>
                        <div class="col-lg-8">
                            <select class="select">
                                <option value="1">1</option>
                                <option value="2">---</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Nama Bank</label>
                        <div class="col-lg-8">
                            <select class="select">
                                <option value="1">008-Mandiri</option>
                                <option value="2">---</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">No. Rekening</label>
                        <div class="col-md-8">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2"></label>
                        <div class="col-md-10">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection('content2')