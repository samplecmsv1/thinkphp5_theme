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
