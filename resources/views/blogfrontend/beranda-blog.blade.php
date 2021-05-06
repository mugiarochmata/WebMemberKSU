@extends('blogfrontend.index-blog')
@section('content2')
<!-- Home Banner -->
<section id="home" class="divider">
    <div class="container-fluid p-0">
        <!--- slider ---->
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2500">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/img/slider/slider-1.jpg" alt="First slide">
                    {{-- <div class="carousel-caption d-none d-md-block">
                        <span>We Provide Solution</span>
                        <h2>To stressless Life</h2>
                        <p>People who are more perfectionist are most likely to be depressed,<br>Because they stress themselves out so much.</p>
                    </div> --}}
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/slider/slider-2.jpg" alt="Second slide">
                    {{-- <div class="carousel-caption d-none d-md-block">
                        <span>We Provide Solution</span>
                        <h2>Health Care Solution</h2>
                        <p>Every day we bring hope to millions of children in the world's<br> hardest places as a sign of God's unconditional love.</p>
                    </div> --}}
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/slider/slider-3.jpg" alt="Third slide">
                    {{-- <div class="carousel-caption d-none d-md-block">
                        <span>We Provide total</span>
                        <h2>Personalised care</h2>
                        <p>People who are more perfectionist are most likely to be depressed,<br>Because they stress themselves out so much.</p>
                    </div> --}}
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!--- /slider ---->
        <!-- Search -->
        <div class="banner-wrapper">
            <div class="search-box search-box-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12" align="center">
                                <i class="fas fa-users fa-3x" style="color:white;"></i>
                            </div>
                            <div class="col-md-12" align="center">
                                <br>
                                <h3 style="color:white;">85.045 anggota</h3>
                                <h5 style="color:white;">Total Member</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12" align="center">
                                <i class="fas fa-university fa-3x" style="color:white;"></i>
                            </div>
                            <div class="col-md-12" align="center">
                                <br>
                                <h3 style="color:white;">1,2 triliun</h3>
                                <h5 style="color:white;">Total Aset</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12" align="center">
                                <i class="fas fa-hand-holding-usd fa-3x" style="color:white;"></i>
                            </div>
                            <div class="col-md-12" align="center">
                                <br>
                                <h3 style="color:white;">7.6 milyar</h3>
                                <h5 style="color:white;">Penyaluran Dana</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Search -->
    </div>
</section>
<!-- /Home Banner -->
<section class="section section-category">
    <br><br><br><br>
    <div class="container">
        <div class="section-header text-center">
            <h2>Produk</h2>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="category-box">
                    <div class="category-image">
                        <img src="assets/img/category/2.png" alt="">
                    </div>
                    <div class="category-content">
                        <h4>Simpanan</h4>
                        <span>Program simpanan dapat diikuti oleh Karyawan Tetap Astra yang sudah terdaftar menjadi anggota Koperasi Astra</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="category-box">
                    <div class="category-image">
                        <img src="assets/img/category/3.png" alt="">
                    </div>
                    <div class="category-content">
                        <h4>Pinjaman</h4>
                        <span>Program pinjaman dapat diikuti oleh Karyawan Tetap Astra yang sudah terdaftar menjadi anggota Koperasi Astra</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="category-box">
                    <div class="category-image">
                        <img src="assets/img/category/2.png" alt="">
                    </div>
                    <div class="category-content">
                        <h4>Simpanan</h4>
                        <span>Program simpanan dapat diikuti oleh Karyawan Tetap Astra yang sudah terdaftar menjadi anggota Koperasi Astra</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="category-box">
                    <div class="category-image">
                        <img src="assets/img/category/3.png" alt="">
                    </div>
                    <div class="category-content">
                        <h4>Pinjaman</h4>
                        <span>Program pinjaman dapat diikuti oleh Karyawan Tetap Astra yang sudah terdaftar menjadi anggota Koperasi Astra</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="view-all text-center"> <a href="blog-list" class="btn btn-primary">Lihat Semua Produk</a>
        </div>
    </div>
</section>
<!-- Blog Section -->
<section class="section section-blogs" id="profil">
    <div class="container-fluid">
        <!-- Section Header -->
        <div class="section-header text-center">
            <h2> Berita</h2>
        </div>
        <!-- /Section Header -->
        <div class="row blog-grid-row">
            <div class="col-md-6 col-lg-3 col-sm-12">
                <!-- Blog Post -->
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="blog-details">
                            <img class="img-fluid" src="assets/img/blog/blog-01.jpg" alt="Post Image">
                        </a>
                    </div>
                    <div class="blog-content">
                        <ul class="entry-meta meta-item">

                            <li><i class="far fa-clock"></i> 4 Dec 2019</li>
                        </ul>
                        <h3 class="blog-title"><a href="blog-details">FORUM KOMUNIKASI KSU</a></h3>
                        <p class="mb-0">FORUM KOMUNIKASI KOPERASI KSU TAHUN 2019 Koperasi KSU kembali membuka pendaftaran beasiswa bagi anak </p>
                    </div>
                </div>
                <!-- /Blog Post -->
            </div>
            <div class="col-md-6 col-lg-3 col-sm-12">
                <!-- Blog Post -->
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="blog-details">
                            <img class="img-fluid" src="assets/img/blog/blog-01.jpg" alt="Post Image">
                        </a>
                    </div>
                    <div class="blog-content">
                        <ul class="entry-meta meta-item">

                            <li><i class="far fa-clock"></i> 4 Dec 2019</li>
                        </ul>
                        <h3 class="blog-title"><a href="blog-details">FORUM KOMUNIKASI KSU</a></h3>
                        <p class="mb-0">FORUM KOMUNIKASI KOPERASI KSU TAHUN 2019 Koperasi KSU kembali membuka pendaftaran beasiswa bagi anak </p>
                    </div>
                </div>
                <!-- /Blog Post -->
            </div>
            <div class="col-md-6 col-lg-3 col-sm-12">
                <!-- Blog Post -->
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="blog-details">
                            <img class="img-fluid" src="assets/img/blog/blog-01.jpg" alt="Post Image">
                        </a>
                    </div>
                    <div class="blog-content">
                        <ul class="entry-meta meta-item">

                            <li><i class="far fa-clock"></i> 4 Dec 2019</li>
                        </ul>
                        <h3 class="blog-title"><a href="blog-details">FORUM KOMUNIKASI KSU</a></h3>
                        <p class="mb-0">FORUM KOMUNIKASI KOPERASI KSU TAHUN 2019 Koperasi KSU kembali membuka pendaftaran beasiswa bagi anak </p>
                    </div>
                </div>
                <!-- /Blog Post -->
            </div>
            <div class="col-md-6 col-lg-3 col-sm-12">
                <!-- Blog Post -->
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="blog-details">
                            <img class="img-fluid" src="assets/img/blog/blog-01.jpg" alt="Post Image">
                        </a>
                    </div>
                    <div class="blog-content">
                        <ul class="entry-meta meta-item">

                            <li><i class="far fa-clock"></i> 4 Dec 2019</li>
                        </ul>
                        <h3 class="blog-title"><a href="blog-details">FORUM KOMUNIKASI KSU</a></h3>
                        <p class="mb-0">FORUM KOMUNIKASI KOPERASI KSU TAHUN 2019 Koperasi KSU kembali membuka pendaftaran beasiswa bagi anak </p>
                    </div>
                </div>
                <!-- /Blog Post -->
            </div>
        </div>
        <div class="view-all text-center"> <a href="blog-list" class="btn btn-primary">Lihat Semua Berita</a>
        </div>
    </div>
</section>
<!-- /Blog Section -->
@endsection('content2')