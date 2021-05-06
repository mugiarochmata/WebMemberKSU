<?php $page = "index-anggota"; ?>

<?php $__env->startSection('content'); ?>
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                <!-- Profile Sidebar -->
                <div class="profile-sidebar">
                    <div class="widget-profile pro-widget-content">
                        <div class="profile-info-widget">
                            <a href="#" class="booking-doc-img">
                                <img src="assets/img/doctors/omdim.jpg" alt="User Image">
                            </a>
                            <div class="profile-det-info">
                                <h3>Anggota KSU 01</h3>

                                <div class="patient-details">
                                    <h5 class="mb-0">Staff Teller BWS</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-widget">
                        <nav class="dashboard-menu">
                            <ul>
                                <li class="active">
                                    <a href="dashboard">
                                        <i class="fas fa-columns"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="simulasi">
                                        <i class="fas fa-columns"></i>
                                        <span>Simulasi</span>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <i class="fas fa-columns"></i>
                                                <span>Simpanan</span>
                                            </div>
                                            <div class="col-sm-4 text-right">
                                                <i class="fas fa-angle-down"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="collapse" id="collapseExample1">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <a href="simpananku">
                                                    <span>Simpanan Ku</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="historyperubahansimpanan">
                                                    <span>History Perubahan</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="historypenarikansimpanan">
                                                    <span>History Penarikan</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="accountstatementsimpanan">
                                                    <span>Account Statement</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <i class="fas fa-columns"></i>
                                                <span>Simplus</span>
                                            </div>
                                            <div class="col-sm-4 text-right">
                                                <i class="fas fa-angle-down"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="collapse" id="collapseExample2">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <a href="simplusku">
                                                    <span>Simplus Ku</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="historypengajuansimplus">
                                                    <span>History Pengajuan</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="historypencairansimplus">
                                                    <span>History Pencairan</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="accountstatementsimplus">
                                                    <span>Account Statement</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <i class="fas fa-columns"></i>
                                                <span>Pinjaman</span>
                                            </div>
                                            <div class="col-sm-4 text-right">
                                                <i class="fas fa-angle-down"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="collapse" id="collapseExample3">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <a href="pinjamanku">
                                                    <span>Pinjaman Ku</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="historypengajuanpinjaman">
                                                    <span>History Pengajuan</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="historypembayaranpinjaman">
                                                    <span>History Pembayaran</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="historypelunasanpinjaman">
                                                    <span>History Pelunasan</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="jadwalangsuranpinjaman">
                                                    <span>Jadwal Angsuran</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <i class="fas fa-columns"></i>
                                                <span>Pengajuan</span>
                                            </div>
                                            <div class="col-sm-4 text-right">
                                                <i class="fas fa-angle-down"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="collapse" id="collapseExample">
                                        <ul class="list-group list-group-flush">
                                            <!-- <li class="list-group-item">
                                                <a href="pengajuanku">
                                                    <span>Pengajuan Ku</span>
                                                </a>
                                            </li> -->
                                            <li class="list-group-item">
                                                <a href="<?php echo e(route('submission.perubahanSimpanan')); ?>">
                                                    <span>Perubahan Simpanan</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="<?php echo e(route('submission.penarikanSimpanan')); ?>">
                                                    <span>Penarikan Simpanan</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="<?php echo e(route('submission.pembukaanSimplus')); ?>">
                                                    <span>Pembukaan Simplus</span>
                                                </a>
                                            </li>
                                            <!-- <li class="list-group-item">
                                                <a href="pengajuansimplus">
                                                    <span>Pengajuan Simplus</span>
                                                </a>
                                            </li> -->
                                            <li class="list-group-item">
                                                <a href="pencairansimplus">
                                                    <span>Pencairan Simplus</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                            <a href="<?php echo e(route('submission.pinjaman')); ?>">
                                                    <span>Pinjaman Baru</span>
                                                </a>
                                            </li>
                                            <!-- <li class="list-group-item">
                                                <a href="pengajuanpinjaman">
                                                    <span>Pengajuan Pinjaman</span>
                                                </a>
                                            </li> -->
                                            <li class="list-group-item">
                                                <a href="rehabpinjaman">
                                                    <span>Rehab Pinjaman</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="pembayaranangsuran">
                                                    <span>Pembayaran Angsuran</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="pelunasanpinjaman">
                                                    <span>Pelunasan Pinjaman</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="/">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /Profile Sidebar -->

            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">

                <?php echo $__env->yieldContent('content2'); ?>

            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayoutanggota', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppNew\htdocs\koperasidoccure\resources\views/submission/index-anggota.blade.php ENDPATH**/ ?>