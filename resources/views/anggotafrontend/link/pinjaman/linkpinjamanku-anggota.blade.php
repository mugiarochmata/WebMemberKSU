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
                                        <th class="text-center">No. Bilyet</th>
                                        <td colspan="3" class="text-center">D00001</td>
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
                                        <td colspan="3" class="text-center">Rp. 100.000.000</td>
                                        <th class="text-center">Akumulasi Bunga</th>
                                        <td colspan="3" class="text-center">PD001</td>
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