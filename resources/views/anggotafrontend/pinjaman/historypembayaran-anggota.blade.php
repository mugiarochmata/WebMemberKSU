@extends('anggotafrontend.index-anggota')
@section('content2')
<div class="card dash-card">
    <div class="card-body">
        <form action="#">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Periode Pembayaran</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Sampai</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">No. Pinjaman</label>
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
                                            <th class="text-center">Tgl. Bayar</th>
                                            <th class="text-center">No. Pinjaman</th>
                                            <th class="text-center">Nominal Angsuran</th>
                                            <th class="text-center">Nominal Pembayaran</th>
                                            <th class="text-center">Pokok</th>
                                            <th class="text-center">Bunga</th>
                                            <th class="text-center">Angsuran Ke</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">SPS001202101120004</td>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">SPS001202101120004</td>
                                            <td class="text-right">Rp. 100.000.000</td>
                                            <td class="text-right">Rp. 100.000.000</td>
                                            <td class="text-right">Rp. 100.000.000</td>
                                            <td class="text-right">Rp. 100.000.000</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">Terbayar</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">SPS001202101120004</td>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">SPS001202101120004</td>
                                            <td class="text-right">Rp. 20.000.000</td>
                                            <td class="text-right">Rp. 20.000.000</td>
                                            <td class="text-right">Rp. 20.000.000</td>
                                            <td class="text-right">Rp. 20.000.000</td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">Setengah</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content2')