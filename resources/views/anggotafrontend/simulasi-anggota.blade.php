@extends('anggotafrontend.index-anggota')
@section('content2')
<div class="row">
    <div class="col-md-12">
        <div class="appointment-tab">

            <!-- Appointment Tab -->
            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                <li class="nav-item">
                    <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Simplus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#today-appointments" data-toggle="tab">Pinjaman</a>
                </li>
            </ul>
            <!-- /Appointment Tab -->

            <div class="tab-content">

                <!-- Upcoming Appointment Tab -->
                <div class="tab-pane show active" id="upcoming-appointments">
                    <div class="card">
                        <div class="row" style="margin: 5px;">
                            <div class="card-body">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-md-4 col-form-label">Penempatan</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Bunga</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Jangka Waktu</label>
                                                <div class="col-lg-6">
                                                    <select class="select">
                                                        <option>1</option>
                                                        <option value="1">1</option>
                                                        <option value="1">2</option>
                                                        <option value="1">3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-right mt-1">
                                                <button type="submit" class="btn btn-primary">Simulasi</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="margin: 5px;">
                            <div class="card-body">
                                <h4>Informasi Simulasi</h4>
                                <div class="table-responsive">
                                    <table class="table  table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Pokok</th>
                                                <th class="text-right">Rp. 300.000</th>
                                                <th>Bunga</th>
                                                <th class="text-right">Rp. 100.000</th>
                                                <th>Estimasi Pencairan</th>
                                                <th class="text-right">Rp. 100.000</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>Accrue Bunga</h4>
                    <div class="card card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Tgl. Accrue</th>
                                            <th class="text-center">Nominal Penempatan</th>
                                            <th class="text-center">Pokok</th>
                                            <th class="text-center">Bunga</th>
                                            <th class="text-center">Kumulatif Bunga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">1</td>
                                            <td style="text-align: center;">2021-01-01</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">2</td>
                                            <td style="text-align: center;">2021-01-01</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Upcoming Appointment Tab -->

                <!-- Today Appointment Tab -->
                <div class="tab-pane" id="today-appointments">
                    <div class="card">
                        <div class="row" style="margin: 5px;">
                            <div class="card-body">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-md-4 col-form-label">Plafond</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Bunga</label>
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-lg-6 col-form-label">Jangka Waktu</label>
                                                <div class="col-lg-6">
                                                    <select class="select">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-right mt-1">
                                                <button type="submit" class="btn btn-primary">Simulasi</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="margin: 5px;">
                            <div class="card-body">
                                <h4>Informasi Simulasi</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 20%;">Angsuran Per Bulan</th>
                                                <th class="text-right">Rp. 300.000</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>Jadwal Angsuran</h4>
                    <div class="card card-table mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Tgl. Bayar</th>
                                            <th class="text-center">Outstanding</th>
                                            <th class="text-center">Pokok</th>
                                            <th class="text-center">Bunga</th>
                                            <th class="text-center">Total Angsuran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">1</td>
                                            <td style="text-align: center;">2021-01-01</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">2</td>
                                            <td style="text-align: center;">2021-01-01</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                            <td style="text-align: right;">Rp. 100.000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Today Appointment Tab -->

            </div>
        </div>
    </div>
</div>
@endsection('content2')