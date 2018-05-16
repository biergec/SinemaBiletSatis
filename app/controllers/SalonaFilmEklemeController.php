<?php

class SalonaFilmEklemeController extends controller
{
    public function SalonFilmAction()
	{
        $data['title'] = 'Salona Film Ekleme';
        $data['uyari'] = null;
        $data['result'] = null;
        $data['filmSalonlari'] = filmSalonlari::getAll();
        $data['film'] = film::getAll();
        $data['slondakigosterilenfilmler'] = slondakigosterilenfilmler::getAll();

		$this->render('SalonlaraEklenenFilmler/salonFilmListele', $data);
	}
    
	public function SalonaFilmEkleAction()
	{
        $data['title'] = 'Salona Film Ekleme';
        $data['uyari'] = null;
        $data['result'] = null;
        $data['filmSalonlari'] = filmSalonlari::getAll();
        $data['film'] = film::getAll();
        $data['slondakigosterilenfilmler'] = slondakigosterilenfilmler::getAll();

		$this->render('SalonlaraEklenenFilmler/salonFilmEkle', $data);
	}

    public function SalonaFilmEklePostAction()
	{
        $data['title'] = 'Salona Film Ekleme';
        $data['result'] = null;
        $data['uyari'] = null;

        $data['filmSalonlari'] = filmSalonlari::getAll();
        $data['film'] = film::getAll();
        $data['slondakigosterilenfilmler'] = slondakigosterilenfilmler::getAll();
        
        $filmSalonlari = $_POST['filmSalonlari'];
        $film =$_POST['film'];
        $bitiszamani =$_POST['bitiszamani'];
        $baslangiczamani =$_POST['baslangiczamani'];

        if(!$filmSalonlari || !$baslangiczamani || !$film || !$bitiszamani){
            $data['uyari'] = 'Boş alan bırakmayın!..';
		    return $this->render('SalonlaraEklenenFilmler/salonFilmEkle', $data);
        }
        
 		if($filmSalonlari && $baslangiczamani&& $film&&$bitiszamani){
            $result = $this ->filmSalonKayit($filmSalonlari,$baslangiczamani,$film,$bitiszamani);
            $data['result'] = $result;
        }
        
        $data['slondakigosterilenfilmler'] = slondakigosterilenfilmler::getAll();
		return $this->render('SalonlaraEklenenFilmler/salonFilmEkle', $data);
	}
    
	private function filmSalonKayit($filmSalonlari,$baslangiczamani,$film,$bitiszamani)
	{
        $db = Db::getInstance();
        $sorgu = "INSERT INTO sinema_film_salon (salon_id,film_id,baslama_zamani,bitis_zamani)
        VALUES ( ".$filmSalonlari.",".$film.",'".$baslangiczamani."','".$bitiszamani."' )";
        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            return "Kayıt Edilemedi";       
        }

        return "Kayıt Edildi";       
              
    }
    public function filmSalonSilPostAction()
	{
        $sinema_film_salon_id = $_POST['sinema_film_salon_id'];
        $data['uyari'] = null;
        $data['result'] = null;
		$data['title'] = 'Filmi Salondan Sil';
       
        
        $db = Db::getInstance();
        $sorgu = "DELETE FROM sinema_film_salon WHERE sinema_film_salon_id = '".$sinema_film_salon_id."' ";

        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            $data['uyari'] = "Film Salondan Silinemedi"; 
		    return $this->render('SalonlaraEklenenFilmler/salonFilmListele', $data);
        }
        finally{
            $data['filmSalonlari'] = filmSalonlari::getAll();
            $data['film'] = film::getAll();
        } 

        
        $data['slondakigosterilenfilmler'] = slondakigosterilenfilmler::getAll();
        
        $data['result'] = "Film Salondan Silindi"; 
		return $this->render('SalonlaraEklenenFilmler/salonFilmListele', $data);
    }

}