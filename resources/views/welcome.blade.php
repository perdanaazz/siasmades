<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>UMKM Panik</title>
        <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">UMKM Panik</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Katalog</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Panik Shop</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Explore Panik Shop</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">Kami menyediakan berbagai layanan</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Kebutuhan Harian</h4>
                        <p class="text-muted">Website e-commerce yang ramah pengguna, Serta berbagai aneka kebutuhan sehari - hari tersedia di toko kami</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Akses Kapanpun</h4>
                        <p class="text-muted">Kami menyediakan layanan 24 jam sehingga siap membantu memenuhi kebutuhanmu. Layanan kami juga siap mengantar barang sampai kerumahmu kapanpun</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Belanja aman</h4>
                        <p class="text-muted">Keamanan berbelanja pada toko kami kapi proritaskan. Transaksi pada toko kami juga sudah menggunakan teknologi keamanan digital berstandar SNI</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About</h2>
                    <h3 class="section-subheading text-muted">Cerita singkat tentang kami</h3>
                </div>
                <div>
                    <p class="text-center">UMKM Panik merupakan sebuah usaha mikro kecil menengah yang pembetukannya diprakarsai oleh mahasiswa yang tergabung dalam lapak PANIK (lapak anak teknik). Diharapkan dengan adanya website UMKM ini PANIK bisa lebih dikenal masyarakat luas.</p>
                </div>
            </div>
        </section>
        <!-- Team-->

        <!-- Clients-->

        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Katalog Produk</h2>
                    <!-- <h3 class="section-subheading text-muted">Silahkan menghubungi kami</h3> -->
                </div>
                <div class="row">
                    <div class="col mb-2">
                    @forelse ($mahasiswas as $mahasiswa)
                        <div class="card d-inline-block ml-2 mb-4" style="width: 15em; height:30em;">
                            <img src="{{ url('/img/'.$mahasiswa->foto) }}" class="card-img-top" width="150px">
                            <div class="card-body">
                                <h6 class="card-title">{{$mahasiswa->nama}}</h6>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$mahasiswa->jenis_kelamin == 'P'?'Perempuan' : 'Laki-laki'}}</li>
                                <li class="list-group-item">{{$mahasiswa->jurusan}}</li>
                                <li class="list-group-item">{{$mahasiswa->alamat == '' ? 'N/A' : $mahasiswa->alamat}}</li>
                            </ul>
                        </div>
                    @empty
                    @endforelse
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-lg-center">
                        Copyright &copy; Your Website
                        <!-- This script automatically adds the current year to your website footer-->
                        <!-- (credit: https://updateyourfooter.com/)-->
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <!-- Contact form JS-->
        <script src="{{asset('assets/mail/jqBootstrapValidation.js')}}"></script>
        <script src="{{asset('assets/mail/contact_me.js')}}"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>
