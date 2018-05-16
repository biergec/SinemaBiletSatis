<?php

class KategorilerController extends controller
{
	/**
	 * ?url=kategoriler/index için aksiyon yazalım
	 */
	public function KategorilerIndexAction()
	{
		// Görünüm dosyasına gönderilecek değişkenler
        $data['title'] = 'Kategori Listesi';
        $data['uyari'] = null;
        $data['result'] = null;
		$data['KategoriTuru'] = kategoriler::getAll();

		// app/views/index.php görünümünü gösterelim
		$this->render('Kategoriler/KategorilerIndex', $data);
	}

	public function KategoriEklemeAction()
	{
        $data['title'] = 'Kategori Ekleme';
        $data['uyari'] = null;
        $data['result'] = null;

		return $this->render('Kategoriler/KategoriEkle', $data);
    }
    
    public function KategoriEklemePostAction()
	{
        $data['title'] = 'Kategori Ekleme';
        $data['result'] = null;
        $data['uyari'] = null;

        $kayitKategoriAd = $_POST['kategoriAd'];

        $kayitKategoriAd =trim($kayitKategoriAd);

        if(strlen($kayitKategoriAd)<=0 && !$kayitKategoriAd){
            $data['uyari'] = 'Kategori Adı Boş Olamaz';
		    return $this->render('Kategoriler/KategoriEkle', $data);
        }
        
        
 		if($kayitKategoriAd){
            $result = $this ->KategoriDatabaseKayit($kayitKategoriAd);
            $data['result'] = $result;
        }
        
		return $this->render('Kategoriler/KategoriEkle', $data);
	}
    
	private function KategoriDatabaseKayit($kayitKategoriAd)
	{
        $db = Db::getInstance();
        $sorgu = "INSERT INTO kategoriler (kategoriAd) VALUES ( '".$kayitKategoriAd."' )";
        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            return "Aynı Kategori Birden Fazla Kayıt Edilemez -> ".$kayitKategoriAd." ";       
        }

        return "Kategori Kayıt Edildi. -> ".$kayitKategoriAd." ";       
    }

    public function KategoriSilPostAction()
	{
        $kategoriID = $_POST['KategoriSil'];
        $data['uyari'] = null;
        $data['result'] = null;
		$data['title'] = 'Kategori Sil';

        $db = Db::getInstance();
        $sorgu = "DELETE FROM Kategoriler WHERE kategori_id = '".$kategoriID."' ";

        
        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            $data["KategoriTuru"] = kategoriler::getAll();
            $data['uyari'] = "Kategori Kullanıldığı için silinemedi"; 
		    return $this->render('Kategoriler/KategorilerIndex', $data);
        }
        $data["KategoriTuru"] = kategoriler::getAll();
        
        
        $data['result'] = "Kategori Silindi"; 
		return $this->render('Kategoriler/KategorilerIndex', $data);
    }

    
}