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
                                <table class="table table-hover table-bordered table-center mb-0">
                                    <tr>
                                        <th class="text-left">No Simpanan</th>
                                        <td>D00001</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Kode Produk</th>
                                        <td>PD001</td>
                                        <th>Nama Produk</th>
                                        <td>Simpanan Plus</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Saldo</th>
                                        <td>Rp. 100.000.000</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Tgl. Buka</th>
                                        <td>2020-01-01</td>
                                        <th>Jam Buka</th>
                                        <td>2020-01-01</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Status</th>
                                        <td>01 - Aktif</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Tanggal Tutup</th>
                                        <td>null</td>
                                        <th>Jam Tutup</th>
                                        <td>null</td>
                                    </tr>
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