@extends('submission.index-anggota')
@section('content2')
<div class="card dash-card">
    <div class="card-body">
    {{-- <form> --}}
        @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">No. Anggota</label>
                        <div class="col-lg-9">
                            {!! Form::text('memberId', $memberId ,['class' => 'form-control','id'=>'memberId', 'required']); !!}
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary find-data-simpanan">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
   {{-- </form> --}}
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
                                <thead class="thead-light border">
                                    <tr>
                                        <th scope="col" style="width: 50px;">#</th>
                                        <th> No. Simpanan</th>
                                        <th> Jenis Simpanan</th>
                                        <th> Nama Anggota</th>
                                        <th class="text-right"> Saldo</th>
                                        <th class="text-center"> Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table_data">
                          
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
<div class="card dash-card">
    <div class="card-body">
        {!! Form::open(['route' => 'submission.submitPembukaanSimplus','id'=>'my-form']) !!}
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Jenis Produk</label>
                        <div class="col-lg-9">
                        {!! Form::hidden('memberId', $memberId ,['class' => 'form-control','id'=>'memberId', 'required']); !!}
                        {!! Form::select('productDepositoId', $produksimplus,'', ['id'=>'productDepositoId','class' => 'form-control', 'maxlength' => 100, 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nominal Penempatan</label>
                        <div class="col-md-9">
                        {!! Form::text('placementAmount', '', ['id'=>'placementAmount','class' => 'form-control', 'maxlength' => 100, 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-lg-5 col-form-label">Jangka Waktu</label>
                        <div class="col-lg-3">
                            <select class="select">
                                <option value="1">1</option>
                                <option value="1">3</option>
                                <option value="1">6</option>
                                <option value="1">12</option>
                                <option value="1">24</option>
                            </select>
                        </div>
                        <label class="col-lg-4 col-form-label">Bulan</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Opsi ARO</label>
                        <div class="col-lg-2">
                            {!! Form::select('rolloverOptionId', $rollover,'', ['id'=>'rolloverOptionId','class' => 'form-control', 'maxlength' => 100, 'required']) !!}
                        </div>
                        <label class="col-lg-8 col-form-label">Keterangan Simplus akan otomatis dikumulatif Pokok (P) dan Bunga (I) pada saat jatuh tempo</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Nama Bank</label>
                        <div class="col-lg-8">
                        {!! Form::select('transferredFromBankId', $databank,'', ['id'=>'transferredFromBankId','class' => 'form-control', 'maxlength' => 100, 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <<label for="formrow-password-input" class="form-label">No. Rekening</label>
                        <div class="col-md-7">
                        {!! Form::text('transferredFromBankAccountNumber', '', ['id'=>'transferredFromBankAccountNumber','class' => 'form-control', 'maxlength' => 100, 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Keterangan</label>
                        <div class="col-md-10">
                        <textarea required id="note" name="note" class="form-control" maxlength="225" rows="3" placeholder=""></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-form-label col-md-2"></label>
                    <div class="col-md-10">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection('content2')