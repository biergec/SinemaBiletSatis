<?php

class kullanicilar
{
	public $ad;
	public $soyad;
	public $cinsiyet;
	public $mail;
	public $cepTelefonu;
	public $yas;
	public $yetki;
	public $kullanici_id;
	
    
	public function kullanicilar($ad, $soyad, $cinsiyet, $mail, $yas, $cepTelefonu,$yetki,$kullanici_id)
	{
		$this->ad = $ad;
		$this->soyad = $soyad;
		$this->cinsiyet = $cinsiyet;
		$this->yas = $yas;
		$this->cepTelefonu = $cepTelefonu;
		$this->mail = $mail;
		$this->kullanici_id = $kullanici_id;
		$this->yetki = $yetki;
	}

	public static function getAll() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM kullanici');
  
		foreach($req->fetchAll() as $post) {
		  $list[] = new kullanicilar($post['ad'],$post['soyad'],$post['cinsiyet'],$post['mail'],$post['yas'],$post['cepTelefonu'],$post['yetki'], $post['kullanici_id']);
		}

		return $list;
	}

	public static function get($mail) {

		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM kullanici WHERE mail = "'.$mail.'" ');
		$name = $req->fetch(PDO::FETCH_ASSOC);
		
		return $name;
	}

}


