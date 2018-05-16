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


		$this->render('Yakindekiler/yakindekilerIndex', $data);
	}

	public function yakindekiFilmlerEklemeAction()
	{
        $data['title'] = 'Yakındaki Filmler Ekleme';
        $data['uyari'] = null;
        $data['result'] = null;

		return $this->render('Yakindekiler/yakindekiFilmlerEkleme', $data);
    }
    
    public function yakindekilerEklemePostAction()
	{
        $data['title'] = 'Yakındaki Filmler Ekleme';
        $data['result'] = null;
        $data['uyari'] = null;

        $film_id =$_POST['film_id'];

        if(!$film_id){
            $data['uyari'] = 'Boş alan bırakmayın!..';
		    return $this->render('Yakindekiler/yakindekiFilmlerEkleme', $data);
        }
        
 		if($film_id){
            $result = $this ->yakindekilerKayit($film_id);
            $data['result'] = $result;
        }
		return $this->render('Yakindekiler/yakindekiFilmlerEkleme', $data);
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
		    return $this->render('Yakindekiler/yakindekilerIndex', $data);
        }
        finally{
            $data["yakindakifilmler"] = yakindakifilmler::getAll();
        } 

        $data['result'] = "Yakındaki Film Silindi"; 
		return $this->render('Yakindekiler/yakindekilerIndex', $data);
    }

}