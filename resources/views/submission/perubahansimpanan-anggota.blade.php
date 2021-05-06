@extends('submission.index-anggota')
@section('content2')
<div class="card dash-card">
    <div class="card-body">
        {{-- <form> --}}
        @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Jenis Simpanan</label>
                        <div class="col-lg-9">
                            {!! Form::hidden('memberId', $memberId ,['class' => 'form-control','id'=>'memberId', 'required']); !!}
                            {!! Form::select('productSavingId', $master_product_savings , $productSavingId,['class' => 'form-control','id'=>'productSavingId', 'required']); !!}
                        </div>
                    </div>
                    <!-- <div class="col-auto">
                        <button class="btn btn-primary find-data-perubahan-simpanan">Cari</button>
                        {{-- {!! Form::submit('Cari', ['class' => 'btn btn-primary  find-data','id'=>'btnSubmit','name'=>'btnSubmit', 'value'=>'cari']) !!} --}}
                    </div> -->
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
                                    <tr>
                                        <th class="text-left">Kode Jenis Simpanan</th>
                                        <td class="text-center"><span id='productSavingId'></span></td>
                                        <th class="text-left">Jenis Simpanan</th>
                                        <td class="text-center"><span id='productSavingDescription'></span></td>
                                        <th class="text-left">Nominal</th>
                                        <td class="text-center"><span id='defaultAmount'></span></td>
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
        {!! Form::open(['route' => 'submission.submitPerubahanSimpanan','id'=>'my-form','method'=>'post']) !!}
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nominal Perubahan</label>
                        <div class="col-md-9">
                        <input type="hidden" name="memberId" id="memberId" />
                        <input type="hidden" name="productSavingId" id="productSavingId"/>
                        {!! Form::text('changeAmount', '', ['id'=>'changeAmount','class' => 'form-control', 'maxlength' => 100, 'required']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Keterangan</label>
                        <div class="col-md-10">
                            <textarea id="note" name="note" class="form-control" maxlength="225" rows="3" placeholder=""></textarea>
                        </div>
                        {!! Form::hidden('latitude', '', ['class' => 'form-control', 'maxlength' => 100]) !!}
                        {!! Form::hidden('longitude', '', ['class' => 'form-control', 'maxlength' => 100]) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2"></label>
                        <div class="col-md-10">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary','id'=>'btnSubmit','name'=>'btnSubmit', 'value'=>'save']) !!}
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection('content2')