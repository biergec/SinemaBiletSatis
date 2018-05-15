<?php

class kullanici
{
	public $kullaniciAd;
    public $kullanici_id;
    public $cepTelefonu;
    public $cinsiyet;
    public $mail;
    public $sifre;
    public $soyad;
    public $yas;
    public $yetki;

	public function kullanici($kullaniciAd, $kullanici_id)
	{
		$this->kullaniciAd = $kullaniciAd;
        $this->kullanici_id = $kullanici_id;
        $this->cepTelefonu = $cepTelefonu;
        $this->cinsiyet = $cinsiyet;
        $this->mail = $mail;
        $this->sifre = $sifre;
        $this->soyad = $soyad;
        $this->yas = $yas;
		$this->yetki = $yetki;
        
	}

	/**
	 * Bütün gönderileri (postları) getirmesini sağlayalım
	 * $this->fetchAll'ı genişlettiğimiz (extend) model sınıfı aracılığıyla kullanıyoruz
	 * @return array
	 */

	public function All()
	{
		return $this->fetchAll('SELECT * FROM kullanici');
	}
	
	public static function getAll() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM kullanici');
  
		// we create a list of Post objects from the database results
		foreach($req->fetchAll() as $post) {
          $list[] = new kullanici($post['kullaniciAd'],$post['kullanici_id'],$post['cepTelefonu'],$post['cinsiyet']
        ,$post['mail'],$post['sifre'],$post['soyad'],$post['yas'],$post['yetki']);
		}

		return $list;
	  }
}


