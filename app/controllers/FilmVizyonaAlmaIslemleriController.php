<?php

class FilmVizyonaAlmaIslemleriController extends controller
{

	public function yakindekilerIndexAction()
	{
        $data['title'] = 'Yakındaki Filmler Listesi';
        $data['uyari'] = null;
        $data['result'] = null;
        $data['yakindakifilmler'] = yakindakifilmler::getAll();
        $data['filmler'] = film::getAll();

		$this->render('Yakindakiler/yakindekilerIndex', $data);
	}

	public function yakindekiFilmlerEklemeAction()
	{
        $data['title'] = 'Yakındaki Filmler Ekleme';
        $data['uyari'] = null;
        $data['result'] = null;

		return $this->render('Yakindakiler/yakindekiFilmlerEkleme', $data);
    }
    
    public function yakindekilerEklemePostAction()
	{
        $data['title'] = 'Yakındaki Filmler Ekleme';
        $data['result'] = null;
        $data['uyari'] = null;

        $film_id =$_POST['film_id'];

        if(!$film_id){
            $data['uyari'] = 'Boş alan bırakmayın!..';
		    return $this->render('Yakindakiler/yakindekiFilmlerEkleme', $data);
        }
        
 		if($film_id){
            $result = $this ->yakindekilerKayit($film_id);
            $data['result'] = $result;
        }
		return $this->render('Yakindakiler/yakindekiFilmlerEkleme', $data);
	}
    
	private function yakindekilerKayit($film_id)
	{
        $db = Db::getInstance();
        foreach ($film_id as $film_id)
        {
            $sorgu = "INSERT INTO film_yakinda (film_id) VALUES ('".$film_id."')";
            try{
                $req = $db->query($sorgu);
            }catch(Exception $e)
            {
                return "Kayıt Edilemedi";       
            }
        }   
        return "Yakındaki Filmlere Kayıt Edildi.";       
    }
    public function yakindekilerSilPostAction()
	{
        $film_id = $_POST['film_id'];
        $data['uyari'] = null;
        $data['result'] = null;
		$data['title'] = 'Yakındaki Filmlerden Sil';

        $db = Db::getInstance();
        $sorgu = "DELETE FROM film_yakinda WHERE film_id = '".$film_id."' ";

        
        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            $data['uyari'] = "Yakındaki Film Silinemedi"; 
		    return $this->render('Yakindakiler/yakindekilerIndex', $data);
        }
        finally{
            $data["yakindakifilmler"] = yakindakifilmler::getAll();
        } 

        $data['result'] = "Yakındaki Film Silindi"; 
		return $this->render('Yakindakiler/yakindekilerIndex', $data);
    }

    public function VizyondakilerFilmEkleAction()
	{
        $data['title'] = 'Vizyondakilere Film Ekle';
        $data['uyari'] = null;
        $data['result'] = null;

        $data["yakindaCikacakFilmler"] = yakindakiFilmler::getAll();

		// app/views/index.php görünümünü gösterelim
		$this->render('Yakindakiler/vizyondakiFilmlerEkleme',$data);
    }
    
    public function VizyondakilerFilmEklePostAction()
	{
        $data['title'] = 'Vizyondakilere Film Ekle';
        $data['uyari'] = null;
        $data['result'] = null;

        $filmID = $_POST['filmID'];
        
        if(!$filmID)
        {
            $data['uyari'] = 'Lütfen En Az Bir Film Seçiniz.';
            $data["yakindaCikacakFilmler"] = yakindakiFilmler::getAll();

            return $this->render('Yakindakiler/vizyondakiFilmlerEkleme', $data);
        }else{

            $db = Db::getInstance();

            foreach ($filmID as $film)
            {
                $sorgu = "INSERT INTO film_vizyondakiler (film_id) 
                VALUES (".(int)$film.")";
                $sorgu2 = "DELETE FROM film_yakinda WHERE film_id=".(int)$film."";

                try{
                    $req = $db->query($sorgu);
                    $req2 = $db->query($sorgu2);
                }catch(Exception $e)
                { 
                    $data['result'] = $e;
                }
            }
            
            $data["yakindaCikacakFilmler"] = yakindakiFilmler::getAll();
            return $this->render('Yakindakiler/vizyondakiFilmlerEkleme', $data);
        }
    }

    public function VizyondakilerFilmListesiAction()
	{
        $data['title'] = 'Vizyondakiler Film Listesi';
        $data['uyari'] = null;
        $data['result'] = null;

        $data["vizyondakiFilmler"] = vizyondakiFilmler::getAll();

		$this->render('Yakindakiler/vizyondakiFilmlerListesi',$data);
    }

    public function VizyondakilerFilmSilPostAction()
	{
        $data['title'] = 'Vizyondakiler Film Listesi';
        $data['uyari'] = null;
        $data['result'] = null;

        
        $filmID = $_POST['filmID'];

        $db = Db::getInstance();
        $sorgu = "DELETE FROM film_vizyondakiler WHERE film_id = ".$filmID." ";

        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        { 
            $data['uyari'] = $e;
		    $this->render('Yakindakiler/vizyondakiFilmlerListesi',$data);
        }finally{
            $data["vizyondakiFilmler"] = vizyondakiFilmler::getAll();
        }

        $data['result'] = "Film Vizyondakilerden Çıkarıldı.";
		$this->render('Yakindakiler/vizyondakiFilmlerListesi',$data);
    }

}
