<?php
class App
{
	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];
	public function __construct()
	{
		$url=$this->parseUrl();
        if($url[0]!=null)
		if(file_exists('app/controllers/'.$url[0].'.php')){
			$this->controller = $url[0];
			unset($url[0]);
		}else{
            $this->show404();
        }
		require_once 'app/controllers/'.$this->controller .'.php';
		$this->controller=new $this->controller;

		if(isset($url[1])){
			if(method_exists($this->controller,$url[1])){
				$this->method=$url[1];
				unset($url[1]);
			}else{
			    $this->show404();
            }
		}
		$this->params= $url ? array_values($url) : [];
		call_user_func_array([$this->controller, $this->method], $this->params);
	}
	private function show404(){
        http_response_code(404);
	    echo 'not found';
	    die();
    }
	public function parseUrl()
	{
		if(isset($_GET['url']))
		{
			return $url= explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
		}
	}
}