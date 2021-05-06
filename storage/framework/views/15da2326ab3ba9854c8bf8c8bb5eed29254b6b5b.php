
<?php $__env->startSection('content2'); ?>
<div class="card dash-card">
    <div class="card-body">
    
        <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">No. Anggota</label>
                        <div class="col-lg-9">
                            <?php echo Form::text('memberId', $memberId ,['class' => 'form-control','id'=>'memberId', 'required']);; ?>

                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary find-data-simpanan">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
   
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
            <?php echo Form::open(['route' => 'submission.submitPenarikanSimpanan','id'=>'my-form']); ?>

            <?php echo Form::hidden('memberId', $memberId ,['class' => 'form-control','id'=>'memberId', 'required']);; ?>

            <input type="hidden" name="savingId" id="savingId"/>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Nominal Penarikan</label>
                        <div class="col-md-9">
                        <?php echo Form::text('withdrawalAmount', '', ['id'=>'withdrawalAmount','class' => 'form-control', 'maxlength' => 100, 'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label"> Bank Tujuan</label>
                        <div class="col-md-9">
                            <?php echo Form::select('transferredToBankId', $databank,'', ['id'=>'transferredToBankId','class' => 'form-control', 'maxlength' => 100, 'required']); ?>

                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group row">
                    <label class="col-md-3 col-form-label"> Rekening Tujuan</label>
                        <div class="col-md-9">
                            <?php echo Form::text('transferredToBankAccountNumber', '', ['id'=>'transferredToBankAccountNumber','class' => 'form-control', 'maxlength' => 100, 'required']); ?>

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
                            <?php echo Form::submit('Submit', ['class' => 'btn btn-primary']); ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('submission.index-anggota', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\koperasidoccure\resources\views/submission/penarikan_simpanan.blade.php ENDPATH**/ ?>