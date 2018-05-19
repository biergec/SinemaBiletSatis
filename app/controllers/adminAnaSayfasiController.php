<?php

Class adminAnaSayfasiController extends controller
{
	public function indexAction()
	{
		$data['title'] = 'Ana Sayfa';

		$this->render('Admin/index',$data);
	}


	

}
