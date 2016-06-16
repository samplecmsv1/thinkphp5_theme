ThinkPHP 5.0.0 RC3 主题支持。
===============


#主题所在目录`public/themes`


代码请查看 `application/index/controller/Index.php`



		<?php
			namespace app\index\controller;
			use app\cms\Base;
			class Index extends Base
			{
				public $theme = 'default';
			    public function index()
			    {
			    	

			       
			       return  $this->make('index');
			    }
			}


# `application/cms` 目录中实现主题

如有问题请在微博中 @太极拳那点事儿   http://weibo.com/sunkangchina