<?php

class yakindakifilmler
{
	public $film_id;

	public function yakindakifilmler($film_id)
	{
		$this->film_id = $film_id;
	}

	public static function getAll() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM film_yakinda');
		
		foreach($req->fetchAll() as $post) {
		  $list[] = new yakindakifilmler($post['film_id']);
		}

			return $list;

		}
		
}


