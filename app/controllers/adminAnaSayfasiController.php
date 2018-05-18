<?php

Class adminAnaSayfasiController extends controller
{
	
	/**
	 * ?url=default/index için aksiyon yazalım
	 */
	public function indexAction()
	{
		// Görünüm dosyasına gönderilecek değişkenler
		// Görünüm dosyasında $title değişkenini kullanabileceğiz:
		$data['title'] = 'Ana Sayfa';

		// app/views/index.php görünümünü gösterelim
		$this->render('Admin/index',$data);
	}

}
