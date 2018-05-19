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
			$data['filmb']=film::get($film_id);
			$data['slon']=slondakigosterilenfilmler::get($film_id);
			$this->render('FilmBilgileri',$data);
		}
	}
	
	public function uyeOlAction()
	{
		$data['uyari']=null;
		$data['girisHatasi'] = null;

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



}
