ThinkPHP 5.0.0 RC3 主题支持。
===============


#主题所在目录`public/themes`

`composer update` 可看演示 或直接在您的项目中使用 `samplecms/tp5_theme` 方法如下。

# samplecms/tp5_theme

安装  `composer require samplecms/tp5_theme`

代码请查看 `application/index/controller/Index.php`

事例

		<?php
		namespace app\index\controller;
		use tp\theme\Theme;
		class Index extends Theme
		{
			public $theme = 'default';
		    public function index()
		    {
		    	

		       
		       return  $this->make('index');
		    }
		}



主题对应文件 `public/themes/default/index/index/index.html`


如有问题请在微博中 @太极拳那点事儿   http://weibo.com/sunkangchina
