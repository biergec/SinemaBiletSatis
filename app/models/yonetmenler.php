<?php
class yonetmenler
{
	public $yonetmenAd;
	public $yonetmen_id;

	public function yonetmenler($yonetmenAd, $yonetmen_id)
	{
		$this->yonetmenAd = $yonetmenAd;
		$this->yonetmen_id = $yonetmen_id;
	}

	/**
	 * Bütün gönderileri (postları) getirmesini sağlayalım
	 * $this->fetchAll'ı genişlettiğimiz (extend) model sınıfı aracılığıyla kullanıyoruz
	 * @return array
	 */

	public function All()
	{
		return $this->fetchAll('SELECT * FROM yonetmenler');
	}
	
	public static function getAll() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM yonetmenler');
  
		// we create a list of Post objects from the database results
		foreach($req->fetchAll() as $post) {
		  $list[] = new yonetmenler($post['yonetmenAd'],$post['yonetmen_id']);
		}

		return $list;
	  }
}