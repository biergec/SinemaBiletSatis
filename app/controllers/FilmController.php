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
        
        
        $this->render('Filmler/FilmEkle', $data);
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
        $vizyonTarihi = $_POST['vizyonTarihi'];
        $filmFiyati = $_POST['filmFiyati'];
        



        if(!$kategorilerID ||!$yonetmenlerID ||!$filmTurleriID ||!$oyuncularID ||!$filmAdi ||!$filmSuresi ||
        !$filmOzet ||!$vizyonTarihi ||!$filmFiyati)
        {
            $data['uyari'] = 'Lütfen Tüm Bilgileri Doldurunuz';
            return $this->render('Filmler/FilmEkle', $data);
            
        }else{
            
            $result = $this ->FilmDatabaseKayit($kategorilerID,$yonetmenlerID,$filmTurleriID,$filmAdi,$filmSuresi,
            $filmOzet,$vizyonTarihi,$filmFiyati);
            $data['result'] = $result;



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
            return $this->render('Filmler/FilmEkle', $data);
        }
	}
    
	private function FilmDatabaseKayit($kategorilerID,$yonetmenlerID,$filmTurleriID,$filmAdi,$filmSuresi,$filmOzet,$vizyonTarihi,$filmFiyati)
	{
        $db = Db::getInstance();
        $sorgu = "INSERT INTO filmler (kategori_id,filmAd,filmSuresi,yonetmen_id,filmOzet,vizyonTarihi,filmTuru_id ,filmFiyat) 
        VALUES ( ".(int)$kategorilerID.",'".$filmAdi."',".(int)$filmSuresi.",".(int)$yonetmenlerID.",'".$filmOzet."','".$vizyonTarihi."',".(int)$filmTurleriID.",".(int)$filmFiyati.")";
        try{
            $req = $db->query($sorgu);
            return "Film Kayıt Edildi. -> ".$filmAdi." ";       
        }catch(Exception $e)
        {
            return "Film Kayıt Edilemedi. Aynı İsimde Birden Fazla Film Kayıt Edilemez.-> ".$filmAdi." ";       
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
		    return $this->render('Filmler/FilmListesi', $data);
        }finally{
            $data["film"] = film::getAll();
        }

        $data['result'] = "Film Silindi"; 
		return $this->render('Filmler/FilmListesi', $data);
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

		$this->render('Filmler/FilmListesi', $data);
    }
}