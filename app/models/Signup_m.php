<?php
class Signup_m extends Model
{
    function __construct(){
    parent::__construct();
    }
    function userInsert($username,$pass,$phone){
        return $this->db->insert('userlist',array('username'=>$username,'password'=>$pass,'phone'=>$phone));
    }
}
