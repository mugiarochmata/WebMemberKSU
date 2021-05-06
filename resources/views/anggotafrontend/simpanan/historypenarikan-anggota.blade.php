@extends('anggotafrontend.index-anggota')
@section('content2')
<div class="card dash-card">
    <div class="card-body">
        <form action="#">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Tanggal Awal</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Tanggal Akhir</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">No. Simpanan</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control">
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
                                            <th class="text-center">No</th>
                                            <th class="text-center">No. Simpanan</th>
                                            <th class="text-center">Jenis Simpanan</th>
                                            <th class="text-center">Tgl. Transaksi</th>
                                            <th class="text-center">Jam Transaksi</th>
                                            <th class="text-center">Saldo Awal</th>
                                            <th class="text-center">Perubahan</th>
                                            <th class="text-center">Saldo Akhir</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">SPS001202101120004</td>
                                            <td class="text-left">Simpanan Pokok</td>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">11:11:11</td>
                                            <td class="text-right">Rp. 10.000</td>
                                            <td class="text-right">Rp. 15.000</td>
                                            <td class="text-right">Rp. 15.000</td>
                                            <td class="text-center"><button type="button" class="btn btn-rounded btn-success">Accepted</button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="text-center">SPS001202101120004</td>
                                            <td class="text-left">Simpanan Wajib</td>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">11:11:11</td>
                                            <td class="text-right">Rp. 10.000</td>
                                            <td class="text-right">Rp. 15.000</td>
                                            <td class="text-right">Rp. 15.000</td>
                                            <td class="text-center"><button type="button" class="btn btn-rounded btn-danger">Rejected</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Upcoming Appointment Tab -->


            </div>
        </div>
    </div>
</div>
@endsection('content2')