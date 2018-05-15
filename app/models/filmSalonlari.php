<?php

class filmSalonlari
{
	public $salonAdi;
	public $koltukSayisi;
	public $salon_id;
    
	public function filmSalonlari($salonAdi, $koltukSayisi, $salon_id)
	{
		$this->salon_id = $salon_id;
		$this->salonAdi = $salonAdi;
		$this->koltukSayisi = $koltukSayisi;
	}

	public static function getAll() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM sinema_film_salonlari');
  
		foreach($req->fetchAll() as $post) {
		  $list[] = new filmSalonlari($post['salonAdi'],$post['koltukSayisi'],$post['salon_id']);
		}

		return $list;
	  }
}


