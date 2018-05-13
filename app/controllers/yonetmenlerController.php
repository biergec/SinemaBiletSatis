<?php

class yonetmenlerController extends controller
{
	/**
	 * ?url=yonetmenler/index için aksiyon yazalım
	 */
	public function indexAction()
	{
		// Görünüm dosyasına gönderilecek değişkenler
		// Görünüm dosyasında $title değişkenini kullanabileceğiz:
		$data['title'] = 'Yönetmenler';

		// app/views/index.php görünümünü gösterelim
		$this->render('index', $data);
	}

	/**
	 * ?url=default/test için aksiyon yazalım
	 */
	public function testAction()
	{
		$data['title'] = 'Test Sayfası';
		$data['text'] = 'Şu an test sayfasındasınız';

		return $this->render('index', $data);
	}
}
