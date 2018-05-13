<?php

Class defaultController extends controller
{
	
	/**
	 * ?url=default/index için aksiyon yazalım
	 */
	public function indexAction()
	{
		// Görünüm dosyasına gönderilecek değişkenler
		// Görünüm dosyasında $title değişkenini kullanabileceğiz:
		$data['title'] = 'TF Ana Sayfa';

		// app/views/index.php görünümünü gösterelim
		$this->render('index',$data);
	}

	/**
	 * ?url=default/test için aksiyon yazalım
	 */
	public function testAction()
	{
		$data['title'] = 'Test Sayfası';
		$data['text'] = 'Ana sayfadan merhaba!';

		return $this->render('index', $data);
	}

}
