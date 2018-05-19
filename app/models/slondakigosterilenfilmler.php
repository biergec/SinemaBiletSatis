<?php

class slondakigosterilenfilmler
{
	public $salon_id;
    public $film_id;
    public $baslama_zamani;
    public $bitis_zamani;
    public $sinema_film_salon_id;
    
	public function slondakigosterilenfilmler($salon_id, $film_id,$baslama_zamani,$bitis_zamani,$sinema_film_salon_id)
	{
		$this->salon_id = $salon_id;
        $this->film_id = $film_id;
        $this->baslama_zamani = $baslama_zamani;
        $this->bitis_zamani = $bitis_zamani;
		$this->sinema_film_salon_id = $sinema_film_salon_id;
    }
    
	
	public static function getAll() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM sinema_film_salon');
  
		foreach($req->fetchAll() as $post) {
            $list[] = new slondakigosterilenfilmler($post['salon_id'],$post['film_id'],$post['baslama_zamani'],$post['bitis_zamani'],$post['sinema_film_salon_id']);
		}

		return $list;
	  }
	  public static function get($film_id) {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query("SELECT * FROM sinema_film_salon where film_id='".$film_id."'");
  
		foreach($req->fetchAll() as $post) {
            $list[] = new slondakigosterilenfilmler($post['salon_id'],$post['film_id'],$post['baslama_zamani'],$post['bitis_zamani'],$post['sinema_film_salon_id']);
		}

		return $list;
	  }
}


