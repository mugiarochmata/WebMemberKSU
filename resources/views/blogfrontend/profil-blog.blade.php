@extends('blogfrontend.index-blog')
@section('content2')
<!-- Blog Section -->
<section class="section section-blogs">
    <div class="container-fluid">
        <!-- Doctor Details Tab -->
        <div class="card">
            <div class="card-body pt-0">

                <!-- Tab Menu -->
                <nav class="user-tabs mb-4">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" href="#doc_overview" data-toggle="tab">Sejarah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_locations" data-toggle="tab">Visi & Misi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_reviews" data-toggle="tab">Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#doc_business_hours" data-toggle="tab">Koordinator Wilayah</a>
                        </li>
                    </ul>
                </nav>
                <!-- /Tab Menu -->

                <!-- Tab Content -->
                <div class="tab-content pt-0">

                    <!-- Overview Content -->
                    <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                        <div class="row">
                            <div class="col-md-12">

                                <!-- About Details -->
                                <div class="widget about-widget">
                                    <h4 class="widget-title">Sejarah</h4>
                                    <p>Koperasi Serba Usaha (KSU) Mitra Saudara didirikan di Bandung, pada tanggal 16 Februari 1999 oleh 45 orang pendiri. KSU Mitra Saudara merupakan koperasi karyawan PT Bank Himpunan Saudara 1906 (sekarang PT. Bank Woori Saudara Indonesia 1906,Tbk) dan merupakan mitra utama dalam memenuhi kebutuhan internal Bank Woori Saudara di seluruh cabangnya.</p>
                                </div>
                                <!-- /About Details -->
                            </div>
                        </div>
                    </div>
                    <!-- /Overview Content -->

                    <!-- Locations Content -->
                    <div role="tabpanel" id="doc_locations" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12">

                                <!-- About Details -->
                                <div class="widget about-widget">
                                    <h4 class="widget-title">Visi</h4>
                                    <p>Menjadi “Koperasi Unggul dan Terpercaya” yang Sehat dengan Dukungan Sumber Daya Manusia yang Berkualitas dan Manajemen Usaha yang Mandiri dan Profesional.</p>
                                    <hr>
                                    <h4 class="widget-title">Misi</h4>
                                    <p>
                                        1. Mendukung penuh kebijakan PT Bank Himpunan Saudara 1906 Tbk, (sekarang Bank Woori saudara Indonesia 1906, Tbk), sebagai mitra utama strategis dalam mencapai visi, misi, dan tujuan perusahaan.
                                    </p>
                                    <p>2. Mendukung tercapainya peningkatan kesejahteraan anggota pada khususnya dan masyarakat pada umumnya.</p>
                                    <p>3. Membangun dan mengembangkan budaya perusahaan baik secara korporasi maupun koperasi secara profesional dengan menerapkan asas-asas Good Corporate Governance dan Balance Score Card.</p>
                                </div>
                                <!-- /About Details -->
                            </div>
                        </div>
                    </div>
                    <!-- /Locations Content -->

                    <!-- Reviews Content -->
                    <div role="tabpanel" id="doc_reviews" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12">

                                <!-- About Details -->
                                <div class="widget about-widget" style="display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;">
                                    <img src="https://mitrasaudara.co.id/assets/image/struktur.png" alt="Italian Trulli">
                                </div>
                                <!-- /About Details -->
                            </div>
                        </div>
                    </div>
                    <!-- /Reviews Content -->

                    <!-- Business Hours Content -->
                    <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Wilayah</th>
                                                <th>Nama Koordinator</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>KPNO</td>
                                                <td>Ribut Nurzaman</td>
                                            </tr>
                                            <tr>
                                                <td>Jakarta Ampera</td>
                                                <td>Sinta Puspitasari</td>
                                            </tr>
                                            <tr>
                                                <td>Jakarta Energy</td>
                                                <td>Ade Achmad</td>
                                            </tr>
                                            <tr>
                                                <td>Bandung II</td>
                                                <td>Yoki Dwi Noviantoro</td>
                                            </tr>
                                            <tr>
                                                <td>Bogor</td>
                                                <td>Lezora Citra</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Business Hours Content -->

                </div>
            </div>
        </div>
        <!-- /Doctor Details Tab -->
    </div>
</section>
<!-- /Blog Section -->
@endsection('content2')