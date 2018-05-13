<?php

class defaultController extends controller
{
	/**
	 * ?url=default/index için aksiyon yazalım
	 * hdgködjöj
	 * olamdı bu bi daha çek bei
	 */
	public function indexAction()
	{
		// Görünüm dosyasına gönderilecek değişkenler
		// Görünüm dosyasında $title değişkenini kullanabileceğiz:
		$data['title'] = 'TF Ana Sayfa';
		$data['text'] = 'Ana sayfadan merhaba!';

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

	public function aaaaAction()
	{
		$data['title'] = 'asdasdsadsadasdasdasdasds Sayfası';
		$data['text'] = 'Şu an aaaa sayfasındasınız';

		return $this->render('index', $data);
	}
}
