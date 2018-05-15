<?php

class OyuncularController extends controller
{
	/**
	 * ?url=oyuncular/index için aksiyon yazalım
	 */
	public function OyuncularIndexAction()
	{
		// Görünüm dosyasına gönderilecek değişkenler
		$data['title'] = 'Oyuncu Listesi';
		$data['posts'] = oyuncular::getAll();
        $data['result'] = null;
        $data['uyari'] = null;

		// app/views/index.php görünümünü gösterelim
		$this->render('Oyuncular/OyuncularIndex', $data);
	}

	public function OyuncuEklemeAction()
	{
        $data['title'] = 'Oyuncu Ekleme';
        $data['uyari'] = null;
        $data['result'] = null;

		return $this->render('Oyuncular/OyuncuEkle', $data);
    }
    
    public function OyuncuSilPostAction()
	{
        $data['uyari'] = null;
        $data['result'] = null;

        $kayitOyuncuID = $_POST['OyuncuSil'];
        
        $db = Db::getInstance();
        $sorgu = "DELETE FROM oyuncular WHERE oyuncu_id = '".$kayitOyuncuID."' ";
        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            $data['uyari'] = "Oyuncu Silinemedi"; 
		    return $this->render('Oyuncular/OyuncularIndex', $data);
        }finally{
		    $data['posts'] = oyuncular::getAll();
        }

        $data['result'] = "Oyuncu Silindi"; 

		return $this->render('Oyuncular/OyuncularIndex', $data);
    }

    public function OyuncuEklemePostAction()
	{
        $data['title'] = 'Oyuncu Ekleme';
        $data['result'] = null;
        $data['uyari'] = null;

        $kayitOyuncuAd = $_POST['oyuncuAd'];
        $kayitOyuncuSoyad =$_POST['oyuncuSoyad'];

        $kayitOyuncuAd =trim($kayitOyuncuAd);
        $kayitOyuncuSoyad =trim($kayitOyuncuSoyad);

        if(strlen($kayitOyuncuAd)<=0 && !$kayitOyuncuAd && strlen($kayitOyuncuSoyad)<=0 && !$kayitOyuncuSoyad){
            $data['uyari'] = 'Oyuncu Adı ve Soyadı Boş Olamaz';
		    return $this->render('Oyuncular/OyuncuEkle', $data);
        }
        
        $OyuncuTamAd ="$kayitOyuncuAd $kayitOyuncuSoyad";
 		if($kayitOyuncuAd && $kayitOyuncuSoyad){
            $result = $this ->OyuncuDatabaseKayit($OyuncuTamAd);
            $data['result'] = $result;
        }
        
		return $this->render('Oyuncular/OyuncuEkle', $data);
	}
    
	private function OyuncuDatabaseKayit($kayitOyuncuAd)
	{
        $db = Db::getInstance();
        $sorgu = "INSERT INTO oyuncular (oyuncuAd) VALUES ( '".$kayitOyuncuAd."' )";
        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            return "Aynı Oyuncu Birden Fazla Kayıt Edilemez -> ".$kayitOyuncuAd." ";       
        }

        return "Oyuncu Kayıt Edildi. -> ".$kayitOyuncuAd." ";       
    }

}