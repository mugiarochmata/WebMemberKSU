@extends('anggotafrontend.index-anggota')
@section('content2')
<div class="card dash-card">
    <div class="card-body">
        <form action="#">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Jenis Simpanan</label>
                        <div class="col-lg-9">
                            <select class="select">
                                <option value="1">Pokok</option>
                                <option value="2">Tidak Pokok</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<h4>Informasi Simpanan</h4>
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
                                        <th class="text-left">Kode Jenis Simpanan</th>
                                        <td class="text-center">PS001</td>
                                        <th class="text-left">Jenis Simpanan</th>
                                        <td class="text-center">Simpanan Pokok</td>
                                        <th class="text-left">Nominal</th>
                                        <td class="text-center">Rp. 100.000</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<h4>Nilai Perubahan</h4>
<div class="card dash-card">
    <div class="card-body">
        <form action="#">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nominal Perubahan</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Keterangan</label>
                        <div class="col-md-10">
                            <textarea rows="5" cols="5" class="form-control" placeholder="Enter text here"></textarea>
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
            </div>
        </form>
    </div>
</div>
@endsection('content2')