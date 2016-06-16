<?php
namespace app\cms;
use think\Controller;
use think\Config;
use think\Request;
use think\View;
use think\App;
use think\Log;
/**
 * 主题支持，public/themes/default,public/themes/blue.
 * 当模板文件不存在时将使用默认的view
 * @auth 孙康
 * @email sunkang@wstaichi.com
 */
class Theme extends Controller
{
    public $theme;
    protected static $view_instance;

    public function __construct(Request $request = null)
    {
        if($this->theme){
            $this->set_theme($this->theme);
        }
        return parent::__construct($request);
    }


    



    
	protected function set_theme($name){
		$tmp = Config::get('template');
        if($name){
           $tmp['view_path'] = realpath(APP_PATH.'../public/themes/'.$name). DS;
        }else{
            $tmp['view_path'] = "";
        }
		 
        Config::set('template',$tmp); 
	}



    /**
     * 加载模板输出
     * @access protected
     * @param string $template 模板文件名
     * @param array  $vars     模板输出变量
     * @param array $replace     模板替换
     * @param array $config     模板参数
     * @return mixed
     */
    public function make($template = '', $vars = [], $replace = [], $config = [])
    {
        $view = $this->view;
        if($this->theme){
            $m = $this->request->module();
            $c = $this->request->controller();
            $a =  $template?:$this->request->action();

            $file =  Config::get('template.view_path').$m.DS.$c.DS.$a.'.'.Config::get('template.view_suffix');
            
            if(!is_file($file)){  
                Log::record("主题文件不存在".$file,'notice');
                $this->set_theme('');
                if (is_null(self::$view_instance)) {
                    self::$view_instance = new View(Config::get('template'), Config::get('view_replace_str'));
                }
                $view =  self::$view_instance;

            }else{
                $template = $m.DS.$c.DS.$a;

            }
        }
        
        
        return $view->fetch($template, $vars, $replace, $config);
                
    }



}
