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
		$data['posts'] = yonetmenler::getAll();

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

}