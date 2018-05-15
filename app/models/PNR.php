<?php

class PNR
{
	public $indirimMiktari;
    public $pnrKod;
    public $stok;
    
    
	public function PNR($indirimMiktari, $pnrKod,$stok)
	{
		$this->indirimMiktari = $indirimMiktari;
        $this->pnrKod = $pnrKod;
		$this->stok = $stok;
    }
    
	
	public static function getAll() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM pnr');
  
		// we create a list of Post objects from the database results
		foreach($req->fetchAll() as $post) {
            $list[] = new PNR($post['indirimMiktari'],$post['pnrKod'],$post['stok']);
		}

		return $list;
	  }
}


