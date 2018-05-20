<?php
class film
{
	public $film_id;
	public $kategori_id;
    public $filmAd;
    public $filmSuresi;
	public $yonetmen_id;
    public $filmOzet;
    public $vizyonTarihi;
	public $filmTuru_id;
	public $filmFiyat;
	public $yol;
	

	public function film($film_id, $kategori_id, $filmAd,$filmSuresi, $yonetmen_id, $filmOzet,$vizyonTarihi, $filmTuru_id, $filmFiyat, $yol)
	{
		$this->yol = $yol;
		$this->film_id = $film_id;
		$this->kategori_id = $kategori_id;
        $this->filmAd = $filmAd;
        $this->filmSuresi = $filmSuresi;
		$this->yonetmen_id = $yonetmen_id;
        $this->filmOzet = $filmOzet;
        $this->vizyonTarihi = $vizyonTarihi;
		$this->filmTuru_id = $filmTuru_id;
		$this->filmFiyat = $filmFiyat;
	}

	public static function getAll() {
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM filmler');
  
		foreach($req->fetchAll() as $post) {
          $list[] = new film($post['film_id'],$post['kategori_id'],$post['filmAd'],$post['filmSuresi'],$post['yonetmen_id'],$post['filmOzet'],$post['vizyonTarihi'],$post['filmTuru_id'],$post['filmFiyat'],$post['yol']);
		}

		return $list;
	  }
	  
	  public static function get($film_id) {

		$db = Db::getInstance();
		$sorgu="SELECT * FROM filmler WHERE film_id = '".$film_id."'";
		$req = $db->query($sorgu);
		$name = $req->fetch(PDO::FETCH_ASSOC);
		
		return $name;
	}

}
