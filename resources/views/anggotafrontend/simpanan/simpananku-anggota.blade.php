@extends('anggotafrontend.index-anggota')
@section('content2')
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
                                            <th class="text-center">No Simpanan</th>
                                            <th class="text-center">Jenis Simpanan</th>
                                            <th class="text-center">Tanggal Buka</th>
                                            <th class="text-center">Saldo</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">SPS001202101120004</td>
                                            <td>Simpanan Pokok</td>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">Rp. 100.000</td>
                                            <td class="text-center"><button type="button" class="btn btn-rounded btn-success">Aktif</button></td>
                                            <td class="text-center"><a href="/linksimpananku" class="btn btn-primary">Detil</a></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">SPS001202101120004</td>
                                            <td>Simpanan Wajib</td>
                                            <td class="text-center">2020-01-01</td>
                                            <td class="text-right">Rp. 100.000</td>
                                            <td class="text-center"><button type="button" class="btn btn-rounded btn-danger">Non Aktif</button></td>
                                            <td class="text-center"><a href="/linksimpananku" class="btn btn-primary">Detil</a></td>
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