<?php
namespace app\cms;
use think\Request; 

class Base extends Theme
{
     
    public function __construct(Request $request = null)
    { 
        return parent::__construct($request);
    }


     


}
