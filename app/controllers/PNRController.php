<?php

class PNRController extends controller
{
	public function PNRIndexAction()
	{
        $data['title'] = 'PNR Listesi';
        $data['uyari'] = null;
        $data['result'] = null;
		$data['PNR'] = PNR::getAll();

		$this->render('Admin/PNR/PNRIndex', $data);
	}

	public function PNREkleAction()
	{
        $data['title'] = 'PNR Ekleme';
        $data['uyari'] = null;
        $data['result'] = null;

		return $this->render('Admin/PNR/PNREkle', $data);
    }
    
    public function PNREklemePostAction()
	{
        $data['title'] = 'PNR Ekleme';
        $data['result'] = null;
        $data['uyari'] = null;

        $indirimMiktari = $_POST['indirimMiktari'];
        $pnrKod =$_POST['pnrKod'];
        $stok =$_POST['stok'];
        

        if(strlen($indirimMiktari)<=0 || !$indirimMiktari || strlen($pnrKod)<=0 || !$pnrKod|| strlen($stok)<=0 || !$stok){
            $data['uyari'] = 'Boş alan bırakmayın!..';
		    return $this->render('Admin/PNR/PNREkle', $data);
        }
        
 		if($indirimMiktari && $pnrKod&& $stok){
            $result = $this ->PNRDatabaseKayit($indirimMiktari,$pnrKod,$stok);
            $data['result'] = $result;
        }
        
		return $this->render('Admin/PNR/PNREkle', $data);
	}
    
	private function PNRDatabaseKayit($indirimMiktari,$pnrKod,$stok)
	{
        $db = Db::getInstance();
        $sorgu = "INSERT INTO PNR (indirimMiktari,pnrKod,stok) VALUES ( '".$indirimMiktari."','".$pnrKod."','".$stok."' )";
        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            return "Aynı PNR Kodu Birden Fazla Kayıt Edilemez -> ".$pnrKod." ";       
        }

        return "PNR Kayıt Edildi. -> ".$pnrKod." ";       
    }
    public function PNRSilPostAction()
	{
        $pnrKod = $_POST['PNRSil'];
        $data['uyari'] = null;
        $data['result'] = null;
		$data['title'] = 'PNR Sil';

        $db = Db::getInstance();
        $sorgu = "DELETE FROM pnr WHERE pnrKod = '".$pnrKod."' ";

        
        try{
            $req = $db->query($sorgu);
        }catch(Exception $e)
        {
            $data['uyari'] = "PNR Silinemedi"; 
		    return $this->render('Admin/PNR/PNRIndex', $data);
        }
        finally{
            $data["PNR"] = PNR::getAll();
        } 

        $data['result'] = "PNR Silindi"; 
		return $this->render('Admin/PNR/PNRIndex', $data);
    }

}