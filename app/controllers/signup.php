<?php
class Signup extends Controller
{
	public function index()
	{
	    $req=array("uname","pass1","pass2","submit","phone");
	    $uname='';
        $pass1='';
        $pass2='';
        $phone='';
	    if(form::check($_POST,$req,true)){
            $uname=strtolower(trim($_POST['uname']));
            $phone=strtolower(trim($_POST['phone']));
            $pass1=trim($_POST['pass1']);
            $pass2=trim($_POST['pass2']);
            if ($pass1 == $pass2) {
                if ($this->formModel->userInsert($uname, sha1($pass1), $phone)) {
                    $this->view('signup/welcome');
                } else {
                    $this->view('signup/username');
                }
            } else {
                $this->view('signup/password');
            }
        }
		$this->view('signup/index',$_POST);
	}
//    public function active_email($key=''){
//        echo 'active <br> ';
//        if($this->formModel->active_mail($key)){
//            echo 'welcome your account has been activated';
//                        //header('location: '.URL.'../login');
//        }
//	}
}
