	<?php

	namespace app\controllers;

	class PostsNewController extends AppController
	{
		public function indexAction()
		{
			echo "PostsNew::index";
		}

		public function testAction()
		{
			echo "PostNew::test";
		}

		public function testPageAction()
		{
			echo "PostNew::testPage";
		}

		public function before()
		{
			echo "PostsNew::before";
		}
	}
