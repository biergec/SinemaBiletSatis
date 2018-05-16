<?php

class vizyondakiFilmler
{
	public $film_id;
	public $vizyondakiler_id;
	
	public function vizyondakiFilmler($film_id, $vizyondakiler_id)
	{
		$this->film_id = $film_id;
		$this->vizyondakiler_id = $vizyondakiler_id;
    }
    
	public static function getAll() {
		
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM film_vizyondakiler');
  
		// we create a list of Post objects from the database results
		foreach($req->fetchAll() as $post) {
            $list[] = new vizyondakiFilmler($post['film_id'], $post['vizyondakiler_id']);
		}

		return $list;
	  }
}


