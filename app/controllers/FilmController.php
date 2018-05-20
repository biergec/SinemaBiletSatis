<?php

class FilmController extends controller
{
    public function FilmEkleAction()
	{
        $data['uyari'] = null;
        $data['result'] = null;
		$data['title'] = 'Film Ekle';
        $data["kategoriler"] = kategoriler::getAll();
        $data["yonetmenler"] = yonetmenler::getAll();
        $data["filmTurleri"] = filmTurleri::getAll();
        $data["oyuncular"] = oyuncular::getAll();
        $data['film'] = film::getAll();
        
        $this->render('Admin/Filmler/FilmEkle', $data);
	}

    public function FilmEklePostAction()
	{
        $data['uyari'] = null;
        $data['result'] = null;
		$data['title'] = 'Film Ekle';
        $data["kategoriler"] = kategoriler::getAll();
        $data["yonetmenler"] = yonetmenler::getAll();
        $data["filmTurleri"] = filmTurleri::getAll();
        $data["oyuncular"] = oyuncular::getAll();

        $kategorilerID = $_POST['kategorilerID'];
        $yonetmenlerID = $_POST['yonetmenlerID'];
        $filmTurleriID = $_POST['filmTurleriID'];
        $oyuncularID = $_POST['oyuncularID'];

        $filmAdi = $_POST['filmAdi'];
        $filmSuresi = $_POST['filmSuresi'];
        $filmOzet = $_POST['filmOzet'];
        $dosya = $_FILES['dosya'];
        $vizyonTarihi = $_POST['vizyonTarihi'];
        $filmFiyati = $_POST['filmFiyati'];

        if(!$kategorilerID ||!$yonetmenlerID ||!$filmTurleriID ||!$oyuncularID ||!$filmAdi ||!$filmSuresi ||
        !$filmOzet ||!$vizyonTarihi ||!$filmFiyati)
        {
            $data['uyari'] = 'Lütfen Tüm Bilgileri Doldurunuz';
            return $this->render('Admin/Filmler/FilmEkle', $data);
            
        }else{
            
            if(isset($_FILES['dosya'])){
                $hata = $_FILES['dosya']['error'];
                if($hata != 0) {
                   
                } else {
                   $boyut = $_FILES['dosya']['size'];
                   if($boyut > (10024*1024*3)){
                   } else {
                      $tip = $_FILES['dosya']['type'];
                      $isim = $_FILES['dosya']['name'];
                      $uzanti = explode('.', $isim);
                      $uzanti = $uzanti[count($uzanti)-1];

                      $dosya = $_FILES['dosya']['tmp_name'];
                      copy($dosya, './images/' . $_FILES['dosya']['name']);
                   }
                }
            }

            if(isset($isim)){
                if(!$isim){
                    $resimYolu="Null";
                }else{
                    $resimYolu = $isim;
                }
            }else{
                $resimYolu="Null";
            }

            $result = $this ->FilmDatabaseKayit($resimYolu,$kategorilerID,$yonetmenlerID,$filmTurleriID,$filmAdi,$filmSuresi,
            $filmOzet,$vizyonTarihi,$filmFiyati);
            $data['result'] =$result;

            $db = Db::getInstance();
            $req = $db->query("SELECT film_id FROM filmler where filmAd='".$filmAdi."'");
            $name = $req->fetch(PDO::FETCH_ASSOC);
    
            foreach ($oyuncularID as $oyuncu)
            {
                $sorgu = "INSERT INTO film_oyuncular (film_id,oyuncu_id) 
                VALUES ( ".(int)$name['film_id'].",".(int)$oyuncu.")";
                try{
                    $req = $db->query($sorgu);
                }catch(Exception $e)
                { 
                    $data['result'] = $e;
                }
            }

            return $this->render('Admin/Filmler/FilmEkle', $data);
        }
	}
    
	private function FilmDatabaseKayit($resimYolu,$kategorilerID,$yonetmenlerID,$filmTurleriID,$filmAdi,$filmSuresi,$filmOzet,$vizyonTarihi,$filmFiyati)
	{
        $db = Db::getInstance();
        $sorgu = "INSERT INTO filmler (kategori_id,filmAd,filmSuresi,yonetmen_id,filmOzet,vizyonTarihi,filmTuru_id ,filmFiyat,yol) 
        VALUES ( ".(int)$kategorilerID.",'".$filmAdi."',".(int)$filmSuresi.",".(int)$yonetmenlerID.",'".$filmOzet."','".$vizyonTarihi."',".(int)$filmTurleriID.",".(int)$filmFiyati.",'".$resimYolu."')";
       
        try{
            $req = $db->query($sorgu);
            return "Film Kayıt Edildi. -> ".$filmAdi." ";       
        }catch(Exception $e)
        {
            return "Hata. -> ".$filmAdi." ";       
        }
    }

    public function FilmSilPostAction()
	{
        $FilmAd = $_POST['FilmAd'];
        $data['uyari'] = null;
        $data['result'] = null;
		$data['title'] = 'Film Listesi';

        $db = Db::getInstance();
        $sorgu = "DELETE FROM filmler WHERE filmAd = '".$FilmAd."' ";
        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            $data['uyari'] = "Film Silinemedi"; 
		    return $this->render('Admin/Filmler/FilmListesi', $data);
        }finally{
            $data["film"] = film::getAll();
        }

        $data['result'] =  "Film Silindi"; 
		return $this->render('Admin/Filmler/FilmListesi', $data);
    }
    
    public function FilmListesiAction()
	{
        $data['uyari'] = null;
        $data['result'] = null;
        $data['title'] = 'Film Ekle';

        $data['film'] = film::getAll();
        $data["kategoriler"] = kategoriler::getAll();
        $data["yonetmenler"] = yonetmenler::getAll();
        $data["filmTurleri"] = filmTurleri::getAll();
        $data["oyuncular"] = oyuncular::getAll();

		$this->render('Admin/Filmler/FilmListesi', $data);
    }
}