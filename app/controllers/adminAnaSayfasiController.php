<?php

Class adminAnaSayfasiController extends controller
{
	public function indexAction()
	{
		$data['title'] = 'Ana Sayfa';

		$this->render('Admin/index',$data);
	}

	public function kullaniciAdminYetkisiVeListelemeAction()
	{
		$data['title'] = 'Kullanicilara Yetki Ver - Sil';

		$data['kullanicilar'] = kullanicilar::getAll();


		$this->render('Admin/kullanicilarAdminYetkisi',$data);
	}

	public function kullaniciAdminYetkisiVerAction()
	{
		$data['title'] = 'Kullanicilara Yetki Ver';
		$data['uyari'] = "sdfsdf";

		$data['kullanicilar'] = kullanicilar::getAll();
		
		$kullaniciYetkiVer = $_POST['kullaniciYetkiVer'];

		if($kullaniciYetkiVer){
			$yetki = 'Admin';
			$sonuc = $this -> YetkiIslemleri($yetki,$kullaniciYetkiVer);
			$data['uyari'] = $sonuc;
		}	

		$data['kullanicilar'] = kullanicilar::getAll();
		$this->render('Admin/kullanicilarAdminYetkisi',$data);
	}

	public function kullaniciAdminYetkisiAlAction()
	{
		$data['title'] = 'Kullanicilara Yetki Ver - Sil';
		$data['uyari']=null;

		$data['kullanicilar'] = kullanicilar::getAll();
		
		$kullaniciYetkiyiAl = $_POST['kullaniciAdminYetkisiAl'];

		if($kullaniciYetkiyiAl){
			$yetki = "null";
			$sonuc = $this -> YetkiIslemleri($yetki,$kullaniciYetkiyiAl);
			$data['uyari'] = $sonuc;
		}	

		$data['kullanicilar'] = kullanicilar::getAll();
		$this->render('Admin/kullanicilarAdminYetkisi',$data);
	}

	private function YetkiIslemleri($yetki, $kullaniciID){
		$db = Db::getInstance();
        $sorgu = "UPDATE kullanici SET  yetki =  '".$yetki."' WHERE kullanici_id = ".$kullaniciID." ";
        try{
            $req = $db->query($sorgu);
            return "Yetki Güncellendi";  
        }catch(Exception $e)
        {
            return "Yetki Güncellenemedi";       
        }
	}
	
}
