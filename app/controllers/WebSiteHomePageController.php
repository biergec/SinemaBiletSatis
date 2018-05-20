<?php

class WebSiteHomePageController extends controller
{
	public function indexAction()
	{
		$data['uyari']=null;
		$data['girisHatasi'] = null;
		$data['vizyondakiFilmler'] = vizyondakiFilmler::getAll();
		$data['yakindakifilmler'] = yakindakifilmler::getAll();
		
		$this->render('index',$data);
	}

	public function FilmBilgileriAction()
	{
		$film_id = $_POST['film'];

		if($film_id)
		{
			$db = Db::getInstance();

			$filmBilgileri = film::get($film_id);
			$data['filmb']= $filmBilgileri;
			$data['slon']=slondakigosterilenfilmler::get($film_id);

			$sorgu = "SELECT kategoriAd FROM kategoriler WHERE kategori_id = ".$filmBilgileri['kategori_id']." ";
			$req = $db->query($sorgu);
			$kategoriAD = $req->fetch(PDO::FETCH_ASSOC);
			$data['kategoriAD']= $kategoriAD;

			$sorgu = "SELECT oyuncuAd FROM oyuncular INNER join film_oyuncular ON film_oyuncular.oyuncu_id = oyuncular.oyuncu_id WHERE film_oyuncular.film_id =".$film_id." ";
			$req = $db->query($sorgu);
			$data['FilmOyuncular']= $req;
			
			$sorgu = "SELECT filmTurAd FROM film_turleri WHERE tur_id = ".$filmBilgileri['filmTuru_id']." ";
			$req = $db->query($sorgu);
			$filmTur = $req->fetch(PDO::FETCH_ASSOC);
			$data['filmTur']= $filmTur;

			$sorgu = "SELECT yonetmenAd FROM yonetmenler WHERE yonetmen_id = ".$filmBilgileri['yonetmen_id']." ";
			$req = $db->query($sorgu);
			$yonetmen = $req->fetch(PDO::FETCH_ASSOC);
			$data['yonetmen']= $yonetmen;

			return $this->render('FilmBilgileri',$data);
		}

		$data['vizyondakiFilmler'] = vizyondakiFilmler::getAll();
		$data['yakindakifilmler'] = yakindakifilmler::getAll();
		$data['uyari'] ="İstediğiniz Film Bulunamadı."; 
		$this->render('index',$data);
	}

	public function FilmBilgileriYakindakilerAction()
	{
		$film_id = $_POST['film'];

		if($film_id)
		{
			$db = Db::getInstance();
			
			$filmBilgileri = film::get($film_id);
			$data['filmb']=$filmBilgileri;
			$data['slon']=slondakigosterilenfilmler::get($film_id);

			$sorgu = "SELECT kategoriAd FROM kategoriler WHERE kategori_id = ".$filmBilgileri['kategori_id']." ";
			$req = $db->query($sorgu);
			$kategoriAD = $req->fetch(PDO::FETCH_ASSOC);
			$data['kategoriAD']= $kategoriAD;

			$sorgu = "SELECT oyuncuAd FROM oyuncular INNER join film_oyuncular ON film_oyuncular.oyuncu_id = oyuncular.oyuncu_id WHERE film_oyuncular.film_id =".$filmBilgileri['film_id']." ";
			$req = $db->query($sorgu);
			$data['FilmOyuncular']= $req;
			
			$sorgu = "SELECT filmTurAd FROM film_turleri WHERE tur_id = ".$filmBilgileri['filmTuru_id']." ";
			$req = $db->query($sorgu);
			$filmTur = $req->fetch(PDO::FETCH_ASSOC);
			$data['filmTur']= $filmTur;

			$sorgu = "SELECT yonetmenAd FROM yonetmenler WHERE yonetmen_id = ".$filmBilgileri['yonetmen_id']." ";
			$req = $db->query($sorgu);
			$yonetmen = $req->fetch(PDO::FETCH_ASSOC);
			$data['yonetmen']= $yonetmen;

			return $this->render('FilmBilgileriYakindakiler',$data);
		}

		$data['vizyondakiFilmler'] = vizyondakiFilmler::getAll();
		$data['yakindakifilmler'] = yakindakifilmler::getAll();
		$data['uyari'] ="İstediğiniz Film Bulunamadı."; 
		$this->render('index',$data);
	}

	public function FilmSeansBiletAlAction()
	{
		$data['vizyondakiFilmler'] = vizyondakiFilmler::getAll();
		$data['yakindakifilmler'] = yakindakifilmler::getAll();

        try{
			$filmSeans = $_POST['filmSeans'];
			$db = Db::getInstance();

			$sorgu = "SELECT * FROM sinema_film_salon WHERE sinema_film_salon_id = ".$filmSeans." ";
			$req = $db->query($sorgu);
			$sinema_film_salonBilgileri = $req->fetch(PDO::FETCH_ASSOC);

			$sorgu = "SELECT * FROM sinema_film_salonlari WHERE salon_id = ".$sinema_film_salonBilgileri['salon_id']." ";
			$req = $db->query($sorgu);
			$sinemaSalonKoltukSayisi = $req->fetch(PDO::FETCH_ASSOC);

			$sorgu = "SELECT * FROM filmler WHERE film_id = ".$sinema_film_salonBilgileri['film_id']." ";
			$req = $db->query($sorgu);
			$filmBilgileri = $req->fetch(PDO::FETCH_ASSOC);


			$sorgu = "SELECT kategoriAd FROM kategoriler WHERE kategori_id = ".$filmBilgileri['kategori_id']." ";
			$req = $db->query($sorgu);
			$kategoriAD = $req->fetch(PDO::FETCH_ASSOC);
			$data['kategoriAD']= $kategoriAD;

			$sorgu = "SELECT oyuncuAd FROM oyuncular INNER join film_oyuncular ON film_oyuncular.oyuncu_id = oyuncular.oyuncu_id WHERE film_oyuncular.film_id =".$filmBilgileri['film_id']." ";
			$req = $db->query($sorgu);
			$data['FilmOyuncular']= $req;
			
			$sorgu = "SELECT filmTurAd FROM film_turleri WHERE tur_id = ".$filmBilgileri['filmTuru_id']." ";
			$req = $db->query($sorgu);
			$filmTur = $req->fetch(PDO::FETCH_ASSOC);
			$data['filmTur']= $filmTur;

			$sorgu = "SELECT yonetmenAd FROM yonetmenler WHERE yonetmen_id = ".$filmBilgileri['yonetmen_id']." ";
			$req = $db->query($sorgu);
			$yonetmen = $req->fetch(PDO::FETCH_ASSOC);
			$data['yonetmen']= $yonetmen;
			

        }catch(Exception $e)
        {
			$data['uyari'] ="Lütfen Geçerli Bir Seans Seçiniz"; 
			$data['girisHatasi'] = null;
			$data['vizyondakiFilmler'] = vizyondakiFilmler::getAll();
			$data['yakindakifilmler'] = yakindakifilmler::getAll(); 
		    return $this->render('index', $data);
        }

		if($sinema_film_salonBilgileri && $filmBilgileri)
		{
			$data['sinema_film_salonBilgileri'] = $sinema_film_salonBilgileri;
			$data['filmBilgileri'] = $filmBilgileri;
			$data['sinemaSalonKoltukSayisi'] = $sinemaSalonKoltukSayisi;

			return $this->render('filmBiletAl',$data);
		}

		$this->render('index',$data);
	}

	public function OdemeEkraniAction()
	{
		$koltukNumarasi = $_POST['koltukNumarasi'];
		$PNR = $_POST['PNR'];
		$filmAd = $_POST['filmAd'];
		$salonID = $_POST['salonID'];
		$filmID = $_POST['filmID'];
		$filmBaslamaZamani = $_POST['filmBaslamaZamani'];

		$db = Db::getInstance();
		
		$sorgu = "SELECT * FROM filmler WHERE film_id = ".$filmID." ";
		$req = $db->query($sorgu);
		$filmBilgileri = $req->fetch(PDO::FETCH_ASSOC);

		$sorgu = "SELECT * FROM sinema_film_salonlari WHERE salon_id = ".$salonID." ";
		$req = $db->query($sorgu);
		$sinemaSalonKoltukSayisi = $req->fetch(PDO::FETCH_ASSOC);

		try{
			$sorgu = "SELECT * FROM pnr WHERE pnrKod = ".$PNR." ";
			$req = $db->query($sorgu);
			$pnrindirimMiktarxi = $req->fetch(PDO::FETCH_ASSOC);
			$pnrindirimMiktari = $pnrindirimMiktarxi['indirimMiktari'];
		}
		catch(Exception $e){
			$pnrindirimMiktari = 0;
		}

		if($koltukNumarasi &&$filmAd &&$salonID &&$filmBaslamaZamani)
		{
			$koltukSayisi = count($koltukNumarasi);

			$filmFiyati = film::get($filmID);
			if($PNR){
				$toplamFiyat =($filmFiyati['filmFiyat']*$koltukSayisi)-$pnrindirimMiktari;
			}else{
				$toplamFiyat =($filmFiyati['filmFiyat']*$koltukSayisi);
			}

			$data['koltukNumarasi'] = $koltukNumarasi;
			$data['filmBilgileri'] = $filmBilgileri ;
			$data['filmBaslamaZamani'] = $filmBaslamaZamani ;
			$data['sinemaSalonKoltukSayisi'] = $sinemaSalonKoltukSayisi ;
			$data['toplamFiyat'] = $toplamFiyat ;
			$data['filmSalonID'] = $salonID ;
			$data['pnrindirimMiktari'] = $pnrindirimMiktari ;

			$sorgu = "SELECT kategoriAd FROM kategoriler WHERE kategori_id = ".$filmBilgileri['kategori_id']." ";
			$req = $db->query($sorgu);
			$kategoriAD = $req->fetch(PDO::FETCH_ASSOC);
			$data['kategoriAD']= $kategoriAD;

			$sorgu = "SELECT oyuncuAd FROM oyuncular INNER join film_oyuncular ON film_oyuncular.oyuncu_id = oyuncular.oyuncu_id WHERE film_oyuncular.film_id =".$filmBilgileri['film_id']." ";
			$req = $db->query($sorgu);
			$data['FilmOyuncular']= $req;
			
			$sorgu = "SELECT filmTurAd FROM film_turleri WHERE tur_id = ".$filmBilgileri['filmTuru_id']." ";
			$req = $db->query($sorgu);
			$filmTur = $req->fetch(PDO::FETCH_ASSOC);
			$data['filmTur']= $filmTur;

			$sorgu = "SELECT yonetmenAd FROM yonetmenler WHERE yonetmen_id = ".$filmBilgileri['yonetmen_id']." ";
			$req = $db->query($sorgu);
			$yonetmen = $req->fetch(PDO::FETCH_ASSOC);
			$data['yonetmen']= $yonetmen;
		}else{
			$data['girisHatasi'] = null;
			$data['vizyondakiFilmler'] = vizyondakiFilmler::getAll();
			$data['yakindakifilmler'] = yakindakifilmler::getAll();
			$data['uyari'] = "Lütfen en az bir koltuk seçiniz."; 
			return $this->render('index',$data);
		}

		return $this->render('odemeEkrani',$data);
	}

	public function OdemeyiTamamlaAction()
	{
		$koltukNumarasi = $_POST['koltukNumarasi'];
		$session = $_POST['session'];
		$salonID = $_POST['salonID'];
		$filmBaslamaZamani = $_POST['filmBaslamaZamani'];

		$db = Db::getInstance();
		
		$sorgu = "SELECT kullanici_id FROM kullanici WHERE mail = ".$session." ";
		$req = $db->query($sorgu);
		$kullanici_id = $req->fetch(PDO::FETCH_ASSOC);
		$tarih=getdate();

		if($koltukNumarasi && $salonID && $filmBaslamaZamani)
		{
			try{
				$db = Db::getInstance();

				foreach($koltukNumarasi as $koltuk ){
					$sorgu = "INSERT INTO sinema_film_satin_alinan_biletler (salon_id,kullanici_id,koltuk_numarasi,filmBaslangicSaati,tarih) 
					VALUES ( ".(int)$salonID.",".$kullanici_id['kullanici_id'].",".(int)$koltuk.",".$filmBaslamaZamani.",'".date("Y-m-d H:i:s")."')";
				
					$req = $db->query($sorgu);   
				}
			}catch(Exception $e)
			{
				$data['uyari'] = "Hata Oluştu. Bilet Satılamadı."; 
			}
		}else{
			$data['girisHatasi'] = null;
			$data['vizyondakiFilmler'] = vizyondakiFilmler::getAll();
			$data['yakindakifilmler'] = yakindakifilmler::getAll();
			$data['uyari'] = "Lütfen en az bir koltuk seçiniz."; 
			return $this->render('odemeEkrani',$data);
		}

		$data['vizyondakiFilmler'] = vizyondakiFilmler::getAll();
		$data['yakindakifilmler'] = yakindakifilmler::getAll();
		$data['uyari'] = "Bilet Başarıyla Alındı.";

		return $this->render('index',$data);
	}

	public function uyeOlAction()
	{
		$data['uyari']=null;
		$data['girisHatasi'] = null;

		$data['vizyondakiFilmler'] = vizyondakiFilmler::getAll();
		$data['yakindakifilmler'] = yakindakifilmler::getAll();

        $Ad = $_POST['Ad'];
        $Soyad = $_POST['Soyad'];
        $Cinsiyet = $_POST['Cinsiyet'];
        $Yas = $_POST['Yas'];
        $Password = $_POST['Password'];
        $Email = $_POST['Email'];
        $Phone = $_POST['Phone'];
		
		if(!$Ad || !$Soyad || !$Cinsiyet || !$Yas || !$Password || !$Email || !$Phone){
			$data['uyari'] = "Lütfen Tüm Alanları Doldurun"; 
		    return $this->render('index', $data);
		}

		$Password = sha1($Password);

		$db = Db::getInstance();
        $sorgu = "INSERT INTO kullanici (ad, soyad, cinsiyet, mail, cepTelefonu, sifre, yas) VALUES 
		('".$Ad."', '".$Soyad."', '".$Cinsiyet."', '".$Email."', ".$Phone.", '".$Password."', ".$Yas." )";

        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            $data['uyari'] = "Kaydınız Başarısız, Her Mail Adresi Bir Defa Kayıt Edilebilir."; 
		    return $this->render('index', $data);
        }

		$data['uyari'] = "Kayıt Başarılı"; 
		$this->render('index',$data);
	}

	public function girisYapAction()
	{
		$data['uyari']=null;
		$data['girisHatasi'] = null;

		$data['vizyondakiFilmler'] = vizyondakiFilmler::getAll();
		$data['yakindakifilmler'] = yakindakifilmler::getAll();

        $Mail = $_POST['Mail'];
        $Password = $_POST['Password'];
		
		$Password = sha1($Password);

		$db = Db::getInstance();
		$sorgu = "SELECT * FROM kullanici WHERE mail = '".$Mail."' && sifre = '".$Password."'";
		//".(int)$name['film_id']."
        try{
			$req = $db->query($sorgu);
			$name = $req->fetch(PDO::FETCH_ASSOC);

			if(isset($name)){

				session_start();
				$_SESSION["mail"] = $name['mail'];
				$_SESSION["kullanici"] =  " ". $name['ad']."  ". $name['soyad']." ";
				
				if($name['yetki']!=null && strlen($name['yetki'])>1){
					$_SESSION["yetki"] = "true";
				}

				$data['mail'] = $name['mail'] ;
				$data['kullanici'] = " ". $name['ad']."  ". $name['soyad']." ";
			}else{
				$data['girisHatasi'] = "Giriş Yapılamadı. Lütfen Bilgilerinizi Kontrol Ediniz."; 
				return $this->render('index', $data);
			}
        }catch(Exception $e)
        {
			$data['girisHatasi'] = "Giriş Yapılamadı. Lütfen Bilgilerinizi Kontrol Ediniz."; 
		    return $this->render('index', $data);
        }

		$this->render('index',$data);
	}

	public function cikisYapAction()
	{
		$data['uyari']=null;
		$data['girisHatasi'] = null;

		$data['vizyondakiFilmler'] = vizyondakiFilmler::getAll();
		$data['yakindakifilmler'] = yakindakifilmler::getAll();

		$data['cikisYap'] = 1;

		return $this->render('index',$data);
	}

	public function ProfilAction()
	{
		$data['uyari']=null;
		$data['girisHatasi'] = null;

        $Mail = $_POST['Mail'];
		
		if(!$Mail){
			return $this->render('index',$data);
		}

		$kullanici = kullanicilar::get($Mail);
		$data['kullanici'] = $kullanici;

		$this->render('kullaniciProfil',$data);
	}

	public function SatinAlinanBiletlerAction()
	{
        $Mail = $_POST['Mail'];
		
		if(!$Mail){
			$data['vizyondakiFilmler'] = vizyondakiFilmler::getAll();
			$data['yakindakifilmler'] = yakindakifilmler::getAll();
			return $this->render('index',$data);
		}

		$db = Db::getInstance();
		$sorgu = "SELECT * FROM kullanici WHERE mail = '".$Mail."' ";
		$req = $db->query($sorgu);
		$kullanici = $req->fetch(PDO::FETCH_ASSOC);

		$sorgu = "SELECT * FROM filmler INNER join sinema_film_salon on filmler.film_id = sinema_film_salon.film_id INNER join sinema_film_salonlari ON sinema_film_salon.salon_id=sinema_film_salonlari.salon_id WHERE filmler.film_id IN (SELECT film_id FROM sinema_film_salon WHERE salon_id IN (SELECT salon_id FROM sinema_film_satin_alinan_biletler where kullanici_id IN (SELECT kullanici_id FROM kullanici WHERE mail='".$Mail."' )) AND baslama_zamani IN (SELECT filmBaslangicSaati FROM sinema_film_satin_alinan_biletler where kullanici_id IN (SELECT kullanici_id FROM kullanici WHERE mail='".$Mail."' )) )";

		$req = $db->query($sorgu);
		$data['biletler'] = $req;
	
		$this->render('satinAlinanBiletler',$data);
	}

}
