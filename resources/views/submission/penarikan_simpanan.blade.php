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
<h4>Nilai Perubahan</h4>
<div class="card dash-card">
    <div class="card-body">
            {!! Form::open(['route' => 'submission.submitPenarikanSimpanan','id'=>'my-form']) !!}
            {!! Form::hidden('memberId', $memberId ,['class' => 'form-control','id'=>'memberId', 'required']); !!}
            <input type="hidden" name="savingId" id="savingId"/>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nominal Penarikan</label>
                        <div class="col-md-9">
                        {!! Form::text('withdrawalAmount', '', ['id'=>'withdrawalAmount','class' => 'form-control', 'maxlength' => 100, 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"> Bank Tujuan</label>
                        <div class="col-md-9">
                            {!! Form::select('transferredToBankId', $databank,'', ['id'=>'transferredToBankId','class' => 'form-control', 'maxlength' => 100, 'required']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group row">
                    <label class="col-md-3 col-form-label"> Rekening Tujuan</label>
                        <div class="col-md-9">
                            {!! Form::text('transferredToBankAccountNumber', '', ['id'=>'transferredToBankAccountNumber','class' => 'form-control', 'maxlength' => 100, 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Keterangan</label>
                        <div class="col-md-10">
                            <textarea id="note" name="note" class="form-control" maxlength="225" rows="3" placeholder=""></textarea>
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
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection('content2')