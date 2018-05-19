<?php

class satilanBiletler
{
	public $salon_id;
    public $kullanici_id;
    public $koltuk_numarasi;
    public $filmBaslangicSaati;
    public $tarih;
    
	public function satilanBiletler($salon_id, $kullanici_id,$koltuk_numarasi,$filmBaslangicSaati,$tarih)
	{
		$this->salon_id = $salon_id;
        $this->kullanici_id = $kullanici_id;
		$this->koltuk_numarasi = $koltuk_numarasi;
		$this->filmBaslangicSaati = $filmBaslangicSaati;
		$this->tarih = $tarih;
    }
    
    public static function get($koltukID, $sinema_film_salonBilgileri) {
		$list = [];
        $db = Db::getInstance();

        $asd=$sinema_film_salonBilgileri['baslama_zamani'];
        $sorgu = "SELECT koltuk_numarasi FROM sinema_film_satin_alinan_biletler WHERE salon_id=".$sinema_film_salonBilgileri['salon_id']." AND filmBaslangicSaati = ".$asd." AND koltuk_numarasi = ".$koltukID." ";
		$req = $db->query($sorgu);
        $name = $req->fetch(PDO::FETCH_ASSOC);
        
		return $name;
	  }
	
	public static function getAll($sinema_film_salonBilgileri) {
		$list = [];
        $db = Db::getInstance();
        $sorgu = "SELECT koltuk_numarasi,salon_id FROM sinema_film_satin_alinan_biletler WHERE salon_id=".$sinema_film_salonBilgileri['salon_id']." AND filmBaslangicSaati= '".$sinema_film_salonBilgileri['baslama_zamani']."' ";
		$req = $db->query($sorgu);
  
		// we create a list of Post objects from the database results
		foreach($req->fetchAll() as $post) {
            $list[] = new satilanBiletler($post['salon_id'],$post['kullanici_id'],$post['filmBaslangicSaati'], $post['tarih']);
		}

		return $list;
	  }
}


