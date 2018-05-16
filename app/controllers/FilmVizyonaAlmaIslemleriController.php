<?php

class FilmVizyonaAlmaIslemleriController extends controller
{

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

        $data["yakindaCikacakFilmler"] = yakindakiFilmler::getAll();

        $filmID = $_POST['filmID'];
        
        if(!$filmID)
        {
            $data['uyari'] = 'Lütfen En Az Bir Film Seçiniz.';

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
