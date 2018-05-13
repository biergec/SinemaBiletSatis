<?php

class oyuncular
{
	public $oyuncuAd;
	public $oyuncu_id;

	public function oyuncular($oyuncuAd, $oyuncu_id)
	{
		$this->oyuncuAd = $oyuncuAd;
		$this->oyuncu_id = $oyuncu_id;
	}

	/**
	 * Bütün gönderileri (postları) getirmesini sağlayalım
	 * $this->fetchAll'ı genişlettiğimiz (extend) model sınıfı aracılığıyla kullanıyoruz
	 * @return array
	 */

	public function All()
	{
		return $this->fetchAll('SELECT * FROM oyuncular');
	}
	
	public static function getAll() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM oyuncular');
  
		// we create a list of Post objects from the database results
		foreach($req->fetchAll() as $post) {
		  $list[] = new oyuncular($post['oyuncuAd'],$post['oyuncu_id']);
		}

		return $list;
	  }
}
