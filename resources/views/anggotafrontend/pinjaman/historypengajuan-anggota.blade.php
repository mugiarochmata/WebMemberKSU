@extends('anggotafrontend.index-anggota')
@section('content2')
<div class="card dash-card">
    <div class="card-body">
        <form action="#">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Periode Pengajuan</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Sampai</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label class="col-lg-6 col-form-label">Status</label>
                        <div class="col-lg-6">
                            <select class="select">
                                <option value="1">Disetujui</option>
                                <option value="2">Tidak Disetujui</option>
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
                                            <th class="text-center">No. Pengajuan</th>
                                            <th class="text-center">Tgl. Pengajuan</th>
                                            <th class="text-center">Jam Pengajuan</th>
                                            <th class="text-center">Plafond</th>
                                            <th class="text-center">Tenor</th>
                                            <th class="text-center">Bunga</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Catatan Persetujuan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">SPS001202101120004</td>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">11:11:11</td>
                                            <td class="text-right">Rp. 100.000.000</td>
                                            <td class="text-center">1 bulan</td>
                                            <td class="text-right">7.5 %</td>
                                            <td class="text-center"><button type="button" class="btn btn-rounded btn-success">Approved</button></td>
                                            <td class="text-left">Disetujui</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">SPS001202101120004</td>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-center">11:11:11</td>
                                            <td class="text-right">Rp. 20.000.000</td>
                                            <td class="text-center">1 bulan</td>
                                            <td class="text-right">5 %</td>
                                            <td class="text-center"><button type="button" class="btn btn-rounded btn-danger">Rejected</button></td>
                                            <td class="text-left">Tidak memenuhi syarat</td>
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
@endsection('content2')