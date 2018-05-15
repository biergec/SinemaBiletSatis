<?php

class FilmSalonlariController extends controller
{
    public function FilmSalonlariAction()
	{
        $data['uyari'] = null;
        $data['result'] = null;
		$data['title'] = 'Sinema Film Salonları';
        $data["filmSalonlari"] = filmSalonlari::getAll();

        $this->render('FilmSalonlari/salonListesi', $data);
	}

	public function FilmSalonEkleAction()
	{
        $data['title'] = 'Sinema Film Salon Ekleme';
        $data['uyari'] = null;
        $data['result'] = null;

		return $this->render('FilmSalonlari/salonEkleme', $data);
    }

    public function FilmSalonEklePostAction()
	{
        $data['title'] = 'Sinema Film Salon Ekleme';
        $data['result'] = null;
        $data['uyari'] = null;

        $sinemaSalonAd = trim($_POST['SinemaSalonAdi']);
        $sinemaSalonKoltukSayisi = trim($_POST['SinemaSalonKoltukSayisi']);

        if(strlen($sinemaSalonAd)<=0 && !$sinemaSalonAd && !$sinemaSalonAd && $sinemaSalonAd<=0  ){
            $data['uyari'] = 'Lütfen Tüm Bilgileri Doldurunuz';
		    return $this->render('FilmSalonlari/salonEkleme', $data);
        }
        
 		if($sinemaSalonAd && $sinemaSalonKoltukSayisi){
            $result = $this ->SinemaSalonDatabaseKayit($sinemaSalonAd, $sinemaSalonKoltukSayisi);
            $data['result'] = $result;
        }
        
		return $this->render('FilmSalonlari/salonEkleme', $data);
	}
    
	private function SinemaSalonDatabaseKayit($salonAdi, $koltukSayisi)
	{
        $db = Db::getInstance();
        $sorgu = "INSERT INTO sinema_film_salonlari (salonAdi,koltukSayisi) VALUES ( '".$salonAdi."' , '".$koltukSayisi."' )";
        try{
            $req = $db->query($sorgu);

            return "Sinema Salon Bilgisi Kayıt Edildi. -> ".$salonAdi." ";       
        }catch(Exception $e)
        {
            return "Aynı Sinema Salon Bilgisi Birden Fazla Kayıt Edilemez -> ".$salonAdi." ";       
        }
    }

    public function SinemaSalonSilPostAction()
	{
        $sinemaSalonID = $_POST['SinemaSalonID'];
        $data['uyari'] = null;
        $data['result'] = null;
		$data['title'] = 'Sinema Salon Listesi';

        $db = Db::getInstance();
        $sorgu = "DELETE FROM sinema_film_salonlari WHERE salon_id = '".$sinemaSalonID."' ";
        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            $data['uyari'] = "Sinema Salon Silinemedi"; 
		    return $this->render('FilmSalonlari/salonListesi', $data);
        }finally{
            $data["filmSalonlari"] = filmSalonlari::getAll();
        }

        $data['result'] = "Sinema Salon Silindi"; 
		return $this->render('FilmSalonlari/salonListesi', $data);
    }

}