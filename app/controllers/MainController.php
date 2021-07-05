<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
	// public $layout = 'main';

	public function indexAction()
	{
		// $this->layout = false;
		// $this->layout = 'default';
		// $this->view = 'test';
		// $name = 'Test Variable';
		// $hi = 'Hello';
		// $colors = array('white' => 'белый', 'black'=>'чёрный');
		// $this->set(compact('name', 'hi', 'colors', 'title'));
		$model = new Main;
		// $res = $model->query("CREATE TABLE posts SELECT * FROM papteka.om_product");
		// var_dump($res);
		$posts = $model->findAll();
		// debug($posts);
		$title = 'PageTitle';
		$this->set(compact('title', 'posts'));
	}
}
