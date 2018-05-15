<?php

class filmTurleri
{
	public $filmTurAd;
	public $tur_id;

	public function filmTurleri($filmTurAd, $tur_id)
	{
		$this->filmTurAd = $filmTurAd;
		$this->tur_id = $tur_id;
	}

	public static function getAll() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM film_turleri');
  
		foreach($req->fetchAll() as $post) {
		  $list[] = new filmTurleri($post['filmTurAd'],$post['tur_id']);
		}

		return $list;
	  }
}


