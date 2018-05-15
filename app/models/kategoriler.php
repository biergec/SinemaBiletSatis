<?php

class kategoriler
{
	public $kategoriAd;
	public $kategori_id;

	public function kategoriler($kategoriAd, $kategori_id)
	{
		$this->kategoriAd = $kategoriAd;
		$this->kategori_id = $kategori_id;
    }
    
	public static function getAll() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM kategoriler');
  
        
		foreach($req->fetchAll() as $post) {
		  $list[] = new kategoriler($post['kategoriAd'],$post['kategori_id']);
		}

		return $list;
	  }
}


