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
                                        <th class="text-left">No. Bilyet</th>
                                        <td colspan="5" class="text-center">D00001</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Kode Produk</th>
                                        <td>PD001</td>
                                        <th>Nama Produk</th>
                                        <td colspan="3" class="text-center">Simpanan Plus</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Nominal Penempatan</th>
                                        <td>Rp. 100.000.000</td>
                                        <th>Tenor</th>
                                        <td>1 bulan</td>
                                        <th>Rate Bunga</th>
                                        <td>7.5%</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Tgl. Mulai</th>
                                        <td>2020-01-01</td>
                                        <th>Tgl. Selesai</th>
                                        <td colspan="3" class="text-center">2020-01-01</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Total Pokok</th>
                                        <td>Rp. 100.000.000</td>
                                        <th>Total Bunga</th>
                                        <td>Rp. 100.000.000</td>
                                        <th>Bunga Harian</th>
                                        <td>Rp. 100.000.000</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Keterangan</th>
                                        <td colspan="5" class="text-center">01 - Aktif</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Opsi ARO</th>
                                        <td>01 - Aktif</td>
                                        <th>Status</th>
                                        <td colspan="3" class="text-center">01 - Aktif</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Tanggal Tutup</th>
                                        <td>null</td>
                                        <th>Jam Tutup</th>
                                        <td colspan="3" class="text-center">null</td>
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