
<?php $__env->startSection('content2'); ?>
<div class="alert alert-warning" role="alert">
    <p>Adjustment</p>
    <ul>
        <li>Pencairan No. Anggota sama menggunakan popup</li>
        <li>Setelah popup muncul dan dipilih data, no anggota dan nama anggota otomatis terisi</li>
        <li>Kondisi <b>Produk Pinjaman: </b>
            <ul>
                <li>Jika Login Karyawan Koperasi, maka hanya muncul opsi (KPH dan Car Loan)</li>
                <li>Jika Login selain karyawan Koperasi, maka hanya muncul opsi (Arisan, Elektronik, Bulanan, Multiguna, Cuti, Voucher Tunai, MPP, Pendidikan, Motor)</li>
            </ul>
        </li>
        <li>Kondisi <b>Jenis Pinjaman: </b>
            <ul>
                <li>Jika <b>Produk Pinjaman</b> (Arisan, Elektronik, Bulanan, Cuti, Voucher Tunai, MPP, Motor, KPH, Car Loan), maka <b>Jenis Pinjaman</b> = Umum (Otomatis selected). Opsi lain <b>dihide</b></li>
                <li>Jika <b>Produk Pinjaman</b> (Multiguna), maka <b>Jenis Pinjaman</b> yang muncul hanya Grade A - Grade H dan <b>Otomatis selected Grade sesuai dengan Grade User Login</b>. Opsi lain <b>dihide</b></li>
                <li>Jika <b>Produk Pinjaman</b> (Pendidikan), maka <b>Jenis Pinjaman</b> yang muncul hanya TK - Universitas. Opsi lain <b>dihide</b></li>
            </ul>
        </li>
        <li>Kondisi <b>Jangka Waktu dan Tanggal Cuti: </b>
            <ul>
                <li>Jika <b>Produk Pinjaman</b> (Cuti dan MPP), maka <b>Tanggal Cuti di SHOW</b> dan <b>Jangka Waktu di HIDE, default 0</b></li>
                <li>Jika <b>Produk Pinjaman</b> (selain Cuti dan MPP), maka <b>Tanggal Cuti di HIDE</b> dan <b>Jangka Waktu di SHOW</b></li>
            </ul>
        </li>
        <li>Kondisi <b>Nama, Jenis dan Harga Item Elektronik: </b>
            <ul>
                <li>Jika <b>Produk Pinjaman</b> (ELektonik), maka <b>di SHOW</b></li>
                <li>Jika <b>Produk Pinjaman</b> (selain Elektronik), maka <b>di HIDE</b></li>
            </ul>
        </li>
        <li>Kondisi <b>Nama Anak: </b>
            <ul>
                <li>Jika <b>Produk Pinjaman</b> (Pendidikan), maka <b>di SHOW</b></li>
                <li>Jika <b>Produk Pinjaman</b> (selain Pendidikan), maka <b>di HIDE</b></li>
            </ul>
        </li>
        <li>Kondisi <b>Nominal DP: </b>
            <ul>
                <li>Jika <b>Produk Pinjaman</b> (Motor Loan), maka <b>di SHOW</b></li>
                <li>Jika <b>Produk Pinjaman</b> (selain Motor Loan), maka <b>di HIDE</b></li>
            </ul>
        </li>
    </ul>
</div>

<div class="card dash-card">
    <div class="card-body">
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Produk Pinjaman</label>
                        <div class="col-lg-8">
                            <?php echo Form::select('productLoanId', $master_product_loans , '',['class' => 'form-control','id'=>'productLoanId', 'required']);; ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Jenis Pinjaman</label>
                        <div class="col-lg-8">
                            <?php echo Form::select('productLoanKindId', $master_product_loan_kinds , '',['class' => 'form-control','id'=>'productLoanKindId', 'required']);; ?>   
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">Nominal Pinjaman</label>
                        <div class="col-md-8">
                        <?php echo Form::text('limitAmount', '', ['id'=>'limitAmount','class' => 'form-control', 'maxlength' => 100, 'required']); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tenor</label>
                        <div class="col-lg-2">
                            <?php echo Form::text('tenor', '', ['id'=>'tenor','class' => 'form-control', 'maxlength' => 100, 'required']); ?>

                        </div>
                        <label class="col-lg-8 col-form-label">Bulan</label>
                    </div>
                </div>
            </div>

            <div id='mpp' style='display:none'>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label">Tanggal Cuti / MPP</label>
                            <div class="col-md-8">
                                <?php echo Form::date('discontoDueDate', '', ['class' => 'form-control', 'maxlength' => 100]); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id='elektronik' style='display:none'>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label">Nama Item Elektronik</label>
                            <?php echo Form::text('electronicItemName', '', ['class' => 'form-control', 'maxlength' => 100]); ?>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label">Jenis Item Elektronik</label>
                            <?php echo Form::text('elecronicItemType', '', ['class' => 'form-control', 'maxlength' => 100]); ?>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label">Harga Item Elektronik</label>
                            <?php echo Form::text('electronicItemPrice', '', ['class' => 'form-control', 'maxlength' => 100]); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div id='pendidikan' style='display:none'>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formrow-email-input" class="form-label">Nama Anak</label>
                            <?php echo Form::text('educationKidName', '', ['class' => 'form-control', 'maxlength' => 100]); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div id='kendaraan' style='display:none'>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formrow-email-input" class="form-label">Nominal DP</label>
                            <?php echo Form::text('downPaymentAmount', '', ['class' => 'form-control', 'maxlength' => 100]); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label">Nama Bank</label>
                        <div class="col-lg-8">
                            <?php echo Form::select('disbursementBankId', $databank,'', ['class' => 'form-control', 'maxlength' => 100]); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label">No. Rekening</label>
                        <div class="col-md-7">
                        <?php echo Form::text('disbursementBankAccountNumber', '', ['class' => 'form-control', 'maxlength' => 100]); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Tujuan Penggunaan</label>
                        <div class="col-md-10">
                        <textarea required id="loanPurpose" name="loanPurpose" class="form-control" maxlength="225" rows="3" placeholder=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label for="formrow-firstname-input" class="form-label">Keterangan</label>
                        <textarea required id="note" name="note" class="form-control" maxlength="225" rows="3" placeholder=""></textarea>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2"></label>
                        <div class="col-md-10">
                            <?php echo Form::submit('Submit', ['class' => 'btn btn-primary']); ?>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('submission.index-anggota', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\koperasidoccure\resources\views/submission/pinjaman.blade.php ENDPATH**/ ?>