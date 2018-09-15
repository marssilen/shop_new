<?php
class Login extends Controller
{
//    function __construct(){
//        $settings_m=$this->model('Settings_m');
//        $this->settings=$settings_m->get();
//        $this->formModel=$this->model('Login_m');
//    }
	public function index()
	{
		$this->view('login/index');
	}
	public function run()
	{
		if (Form::chpost('username') && Form::chpost('password')) {
			// signin
			$this->signin($_POST['username'],$_POST['password']);
		}else{
            header('location: '.URL);
        }
	}
	private function signin($username,$password){
		if($this->formModel->signin($username,$password)){
            header('location: '.URL.'cp/');
		}else{
            $this->view('login/fail');
//            header('location: '.URL);
		}
	}
}
