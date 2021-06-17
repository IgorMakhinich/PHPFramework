<?php

namespace app\controllers;

class Main extends App
{
	// public $layout = 'main';

	public function indexAction()
	{
		// $this->layout = false;
		// $this->layout = 'default';
		// $this->view = 'test';
		$name = 'Test Variable';
		$hi = 'Hello';
		$title = 'PageTitle';
		$colors = array('white' => 'белый', 'black'=>'чёрный');
		$this->set(compact('name', 'hi', 'colors', 'title'));
	}
}
