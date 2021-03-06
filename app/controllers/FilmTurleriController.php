<?php

class FilmTurleriController extends controller
{

    public function FilmTurleriAction()
	{
        $data['uyari'] = null;
        $data['result'] = null;
		$data['title'] = 'Film Türleri';
        $data["filmTurleri"] = filmTurleri::getAll();

        $this->render('Admin/FilmTurleri/FilmTurListesi', $data);
	}

	public function FilmTuruEkleAction()
	{
        $data['title'] = 'Yeni Film Türü Ekleme';
        $data['uyari'] = null;
        $data['result'] = null;

		return $this->render('Admin/FilmTurleri/FilmTurEkle', $data);
    }

    public function FilmTuruEklePostAction()
	{
        $data['title'] = 'Film Türü Ekleme';
        $data['result'] = null;
        $data['uyari'] = null;

        $kayitFilmTur = trim($_POST['FilmTur']);

        if(strlen($kayitFilmTur)<=0 && !$kayitFilmTur){
            $data['uyari'] = 'Film Türü Bilgisi Bol Olamaz';
		    return $this->render('Admin/FilmTurleri/FilmTurEkle', $data);
        }
        
 		if($kayitFilmTur){
            $result = $this ->FilmTuruDatabaseKayit($kayitFilmTur);
            $data['result'] = $result;
        }
        
		return $this->render('Admin/FilmTurleri/FilmTurEkle', $data);
	}
    
	private function FilmTuruDatabaseKayit($filmTuru)
	{
        $db = Db::getInstance();
        $sorgu = "INSERT INTO film_turleri (filmTurAd) VALUES ( '".$filmTuru."' )";
        try{
            $req = $db->query($sorgu);

            return "Film Türü Kayıt Edildi. -> ".$filmTuru." ";       
        }catch(Exception $e)
        {
            return "Aynı Film Türü Birden Fazla Kayıt Edilemez -> ".$filmTuru." ";       
        }
    }

    public function FilmTuruSilPostAction()
	{
        $kayitFilmTurID = $_POST['FilmTurSil'];
        $data['uyari'] = null;
        $data['result'] = null;
		$data['title'] = 'Film Türleri';

        $db = Db::getInstance();
        $sorgu = "DELETE FROM film_turleri WHERE tur_id = '".$kayitFilmTurID."' ";
        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            $data['uyari'] = "Film Türü Kullanıldığı İçin Silinemedi"; 
		    return $this->render('Admin/FilmTurleri/FilmTurListesi', $data);
        } 

        $data["filmTurleri"] = filmTurleri::getAll();
        
        $data['result'] = "Film Türü Silindi"; 
		return $this->render('Admin/FilmTurleri/FilmTurListesi', $data);
    }

}