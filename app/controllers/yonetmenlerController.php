<?php

class YonetmenlerController extends controller
{
	/**
	 * ?url=yonetmenler/index için aksiyon yazalım
	 */
	public function YonetmenlerIndexAction()
	{
		// Görünüm dosyasına gönderilecek değişkenler
        $data['title'] = 'Yonetmen Listesi';
        $data['uyari'] = null;
        $data['result'] = null;
		$data['yonetmenler'] = yonetmenler::getAll();

		// app/views/index.php görünümünü gösterelim
		$this->render('Yonetmenler/YonetmenlerIndex', $data);
	}

	public function YonetmenEklemeAction()
	{
        $data['title'] = 'Yonetmen Ekleme';
        $data['uyari'] = null;
        $data['result'] = null;

		return $this->render('Yonetmenler/YonetmenEkle', $data);
    }
    
    public function YonetmenEklemePostAction()
	{
        $data['title'] = 'Yonetmen Ekleme';
        $data['result'] = null;
        $data['uyari'] = null;

        $kayitYonetmenAd = $_POST['yonetmenAd'];
        $kayitYonetmenSoyad =$_POST['yonetmenSoyad'];

        $kayitYonetmenAd =trim($kayitYonetmenAd);
        $kayitYonetmenSoyad =trim($kayitYonetmenSoyad);

        if(strlen($kayitYonetmenAd)<=0 && !$kayitYonetmenAd && strlen($kayitYonetmenSoyad)<=0 && !$kayitYonetmenSoyad){
            $data['uyari'] = 'Yonetmen Adı ve Soyadı Boş Olamaz';
		    return $this->render('Yonetmenler/YonetmenEkle', $data);
        }
        
        $YonetmenTamAd ="$kayitYonetmenAd $kayitYonetmenSoyad";
 		if($kayitYonetmenAd && $kayitYonetmenSoyad){
            $result = $this ->YonetmenDatabaseKayit($YonetmenTamAd);
            $data['result'] = $result;
        }
        
		return $this->render('Yonetmenler/YonetmenEkle', $data);
	}
    
	private function YonetmenDatabaseKayit($kayitYonetmenAd)
	{
        $db = Db::getInstance();
        $sorgu = "INSERT INTO yonetmenler (YonetmenAd) VALUES ( '".$kayitYonetmenAd."' )";
        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            return "Aynı Yonetmen Birden Fazla Kayıt Edilemez -> ".$kayitYonetmenAd." ";       
        }

        return "Yonetmen Kayıt Edildi. -> ".$kayitYonetmenAd." ";       
    }
    public function YonetmenSilPostAction()
	{
        $yonetmenID = $_POST['YonetmenSil'];
        $data['uyari'] = null;
        $data['result'] = null;
		$data['title'] = 'Yönetmen Sil';

        $db = Db::getInstance();
        $sorgu = "DELETE FROM yonetmenler WHERE yonetmen_id = '".$yonetmenID."' ";

        
        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            $data['uyari'] = "Yonetmen Silinemedi"; 
		    return $this->render('Yonetmenler/YonetmenlerIndex', $data);
        }
        finally{
            $data["yonetmenler"] = yonetmenler::getAll();
        } 

        
        
        $data['result'] = "Yönetmen Silindi"; 
		return $this->render('Yonetmenler/YonetmenlerIndex', $data);
    }

}