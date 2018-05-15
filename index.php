<?php

define('ROOT_DIR', __DIR__); // Kök dizin
define('APP_DIR', ROOT_DIR.'/app'); // Uygulama dizini
define('CORE_DIR', APP_DIR.'/core'); // Çekirdek dizini
define('MDIR', APP_DIR.'/models'); // Model dizini
define('VDIR', APP_DIR.'/views'); // View dizini
define('CDIR', APP_DIR.'/controllers'); // Controller dizini
define('URL', 'http://localhost/mvc'); // Sistemin çalışacağı URL

// Veritabanı ayarlamalarını yapıyoruz
// Eğer ki veritabanı işlemi yapmayacaksak ayarlamak şart değil
//define('DB_DSN', 'mysql:host=localhost;dbname=sinema;charset=utf8');
//define('DB_USR', 'root');
//define('DB_PWD', '');

// Çekirdek sınıflarımızı dahil ediyoruz
// Bu uygulamanın çalışması için mecburi
require CORE_DIR.'/app.php';
require CORE_DIR.'/model.php';
require CORE_DIR.'/view.php';
require CORE_DIR.'/controller.php';

include "app/models/filmSalonlari.php";
include "app/models/oyuncular.php";
include "app/models/yonetmenler.php";
include "app/models/kullaniciler.php";
include "app/models/kategoriler.php";
include "app/models/filmTurleri.php";
include "app/models/PNR.php";
include "app/models/film.php";
include "connection.php";

// Uygulamamızı oluşturuyoruz
$app = new app;

// ve oluşturduğumuz uygulamayı çalıştırıyoruz
$app->run();
