<?php

class WebSiteHomePageController extends controller
{
	public function indexAction()
	{
		$data['title'] = 'Ana Sayfa';

		$this->render('index',$data);
	}

}
