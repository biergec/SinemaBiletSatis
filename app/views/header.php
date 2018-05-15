<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
	<title><?php echo isset($title) ? $title : 'Sinema Bilet Satış Admin Sayfası' ?></title>
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/spinners.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="fix-header fix-sidebar">
	 <!-- Preloader - style you can find in spinners.css -->
	 <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="./">
                        <!-- Logo icon -->
                        <b><img src="images/logo.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Üst sağ taraf-->
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Yönetim</li>
                        <li>
                            <a href="./"><i class="ti-dashboard"></i><span class="hide-menu">Genel Balkış</span></a>
                        </li>

                        <li class="nav-label">Bilgi İşlem</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">Oyuncular
                        </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="?url=Oyuncular/OyuncularIndex">Oyuncu Listesi</a></li>
                                <li><a href="?url=Oyuncular/OyuncuEkleme">Oyuncu Ekleme</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="ti-camera"></i><span class="hide-menu">Yönetmenler
                        </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="?url=Yonetmenler/YonetmenlerIndex">Yönetmen Listesi</a></li>
                                <li><a href="?url=Yonetmenler/YonetmenEkleme">Yönetmen Ekleme</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="ti-video-clapper"></i><span class="hide-menu">Kategoriler
                        </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="?url=Kategoriler/KategorilerIndex">Kayegori Listesi</a></li>
                                <li><a href="?url=Kategoriler/KategoriEkleme">Kategori Ekleme</a></li>
                            </ul>
                        </li>
                              
                        <li><a class="has-arrow  " href="#" aria-expanded="false"><i class="ti-video-clapper"></i><span class="hide-menu">Film Türleri İşlemleri
                        </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="?url=FilmTurleri/FilmTurleri">Film Türleri Listesi</a></li>
                                <li><a href="?url=FilmTurleri/FilmTuruEkle">Yeni Film Türü Ekle</a></li>
                            </ul>
                        </li>
                            

                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="ti-video-clapper"></i><span class="hide-menu">PNR İşlemleri
                        </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="?url=PNR/PNRIndex">PNR Listesi</a></li>
                                <li><a href="?url=PNR/PNREkle">PNR Ekle</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"><?php echo @$title ?></h3> </div>
                <div class="col-md-7 align-self-center">
                    
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
							
	