<?php
class Cp extends ControllerPanel
{
    protected $max_file_size=9999999;
	function view($page,$data=array(),$secure=false){
        $this->page=$page;
        parent::view('cp/panel_master',$data,$secure);
	}
    function logout(){
        Session::destroy();
        header('location: '.URL);
        exit;
    }
public function stockroom($mod=0,$pageno=0){
    if (isAdmin(8)) {
        $req= array('id','num','changenum','price');
        if(form::check($_POST,$req,true)) {
            $this->formModel->change_item_number();
        }
        $rows_per_page=24;
        if($mod==0){
            $data=$this->formModel->get_all($pageno,$rows_per_page);
            $pview=$this->formModel->get_pview('items','cp/stockroom/'.$mod,$rows_per_page);
        }else{
            $data=$this->formModel->get_run_outs();
            $pview='';
        }

        $this->view('cp/stockroom', ['data'=>$data,'pview'=>$pview], true);
    }
}
public function delete_file(){
      if(isset($_GET['name'])) {
        $filename = $_GET['name'];
        if (isAdmin()) {
            if(file_exists('public/upload/'.$filename)) {
                unlink('public/upload/'.$filename);
                header("Location: ".URL."cp/files/");
            }
        }
    }
}
public function edit_file(){
    if(isAdmin()) {
        if (isset($_GET['name'])) {
            $filename = $_GET['name'];
            $req = array('submit', 'name');
            if (form::check($_POST, $req, true)) {
                $filename = $this->formModel->change_file($_POST['name'], $filename);
                header("Location: " . URL . "cp/edit_file/&name=$filename");
            }
            if(file_exists('public/upload/'.$filename)) {
                $this->view('cp/edit_file', $filename, true);
            }
        }
    }
}
public function home_page()
{
    if(isAdmin(1)) {
        $req= array('id','change','description','title','cat','show_type');
        if(form::check($_POST,$req,true)) {
            $this->formModel->change_home_item($_POST);
        }
        $req= array('id','delete');
        if(form::check($_POST,$req)) {
            $this->formModel->delete_home($_POST['id']);
        }
        $req=array('insertBanner');
        if(form::check($_POST,$req,true)) {
            $this->formModel->insert_home_banner();
        }
        $req= array('id','changeBanner','surl');
        if(form::check($_POST,$req,true)) {
            $this->formModel->change_home_banner();
        }
        $req= array('id','deleteBanner');
        if(form::check($_POST,$req)) {
            $this->formModel->delete_home_banner($_POST['id']);
        }
        $req= array('bannerId','submit');
        if(form::check($_POST,$req,false)) {
            $imagename=	$this->upload_a_file();
            $this->formModel->home_banner($_POST['bannerId'],$imagename);
        }
        $req= array('insert');
        if(form::check($_POST,$req,true)) {
            $this->formModel->insert_home();
        }
        $req= array('id','pic','submit');
        if(form::check($_POST,$req,false)) {
            $imagename=	$this->upload_a_file();
            $this->formModel->home_pic($_POST['id'],$imagename);
        }
        $req= array('id','cat_pic');
        if(form::check($_POST,$req,false)) {
            $imagename=	$this->upload_a_file();
            $this->formModel->home_cat_pic($_POST['id'],$imagename);
        }
        $req= array('id','change_cat','surl');
        if(form::check($_POST,$req,false)) {
            $this->formModel->home_top_change($_POST['id'],$_POST['surl']);
        }
        $req= array('id','change_cat','cat');
        if(form::check($_POST,$req,false)) {
            $this->formModel->home_cat_change($_POST['id'],$_POST['cat']);
        }
        $req= array('id','change-slider','title','old_price','price','url','desc');
        if(form::check($_POST,$req,false)) {
            $this->formModel->change_slider();
        }
        $req= array('id','slide-pic');
        if(form::check($_POST,$req,false)) {
            $imagename= $this->upload_a_file(true);
            $this->formModel->slide_pic($_POST['id'],$imagename);
        }
        $data = $this->formModel->home_get_all_card();
        $cat_items=$this->formModel->get_all_home_cat();
        $items=$this->formModel->get_all_items();
        $cats=$this->formModel->get_cats();
        $slider=$this->formModel->get_slider();
        $this->view('cp/home_page', ['data' => $data,'cat_items'=>$cat_items,'items'=>$items,'cats'=>$cats,'slider'=>$slider], true);

    }
}
    private function upload_a_file($disable=false){
        if(isAdmin()) {
            $destination = 'public/upload/';
            $upload = new Upload($destination);
            try {
                if ($disable) {
                    $upload->setDisableExtension();
                }
                $upload->setMaxSize($this->max_file_size);
                $upload->move();
                $result_upload = $upload->getMessages();
                $imagename = $upload->get_imagename();
                return $imagename;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    public function files($page=1){
        if(isAdmin(4)) {
            $data = array();
            if (isset($_POST['add_card_image'])) {
                $imagename = $this->upload_a_file(true);
                $data = URL . 'public/upload/' . $imagename;
                $this->formModel->add_image($imagename, $_POST['alt']);
                $this->view('cp/msg', ['data' => $data], true);
                die();
            }
            $row = 50;
            $index = ($page - 1) * $row;
            $max = ($page) * $row;
//    echo '<pre>';
            $directory = 'public/upload/';
            $scanned_directory = array_diff(scandir($directory, 1), array('..', '.'));
            if (count($scanned_directory) < $index + $row) {
                $max = count($scanned_directory);
            }
            for ($i = $index; $i < $max; $i++) {
//        echo $scanned_directory[$i]."\n";
                $data[] = $scanned_directory[$i] . "\n";
            }
            if (count($scanned_directory) % $row == 0) {
                $pages = count($scanned_directory) / $row;
            } else {
                $pages = count($scanned_directory) / $row + 1;
            }
            $pview = create_pview(URL . 'cp/files', $pages);
            $this->view('cp/files', ['data' => $data, 'pview' => $pview], true);
//    print_r($scanned_directory);
        }
    }
public function index(){
$this->my_favorites();
}
public function items($pageno=1)
{
	if(isAdmin(2)){
		$rows_per_page=24;
		$data=$this->formModel->get_all($pageno,$rows_per_page);
		$pview=$this->formModel->get_pview('items','cp/items',$rows_per_page);
		$this->view('cp/index',['data'=>$data,'pview'=>$pview],true);
	}
}
    public function pages($pageno=1)
    {
        if(isAdmin(2)){
            $rows_per_page=24;
            $data=$this->formModel->get_allPages($pageno,$rows_per_page);
            $pview=$this->formModel->get_pview('items where `page`=1','cp/pages',$rows_per_page);
            $this->view('cp/index',['data'=>$data,'pview'=>$pview],true);
        }
    }
public function search_item($pageno=0)
{
	if(isAdmin()){
		if(isset($_POST['search'])){
		$search=$_POST['search'];

		$pview='';
		$data=$this->formModel->search_item($search);
		$this->view('cp/index',['data'=>$data,'pview'=>$pview],true);
		}
	}
}

function add_item(){
	if(isAdmin()){
		$id=$this->formModel->add_new();
		header("Location: ".URL."edit_item/$id");
	}
}
function delete_item($id=''){
	if(isAdmin()){
		$data=$this->formModel->delete_item($id);
		header("Location: ".URL."cp/items/");
	}
}
function delete_cat($id=''){
	if(isAdmin()){
		$data=$this->formModel->delete_cat($id);
		header("Location: ".URL."cp/show_cat");
	}
}
function add_cat(){
	if(isAdmin()){
		$id=$this->formModel->add_cat();
		header("Location: ".URL."cp/show_cat");
	}
}
function edit_cat($id){
	if(isAdmin()){
		$req= array('cat_change','id','cat','pa');
		if(form::check($_POST,$req)){
		$this->formModel->edit_cat($_POST['id'],$_POST['cat'],$_POST['pa']);
		header('Location: '.URL.'cp/show_cat');
		}
		$data=$this->formModel->show_cat($id);
		$this->view('cp/edit_cat',$data,true);
	}
}




function show_cat($id=0){
	if(isAdmin(3)){
		if(isset($_POST['add_row'])){
		$this->formModel->add_cat2($_POST['pa'],$_POST['cat']);
		}
		if(isset($_POST['add_list'])){
		$this->formModel->add_cat2($_POST['pa_cat'],$_POST['cat']);
		}
		$data=$this->formModel->ss($id);
		if($data=='<ul></ul>'){
            $this->formModel->add_cat2('0','main');
            $data=$this->formModel->ss($id);
        }
		$this->view('cp/cat',$data,true);
}
}
    function add_address2(){
        $req=array('name','c-phone','s-phone','province','city','address','postal-code','submit');
        if(form::check($_POST, $req,TRUE)){
            $user_id= Session::get('id');
            $this->formModel->add_address($user_id,$_POST);
        }else {
        }
        header('location: '.URL.'cp/factor_review');
    }
function add_address(){
$req=array('name','c-phone','s-phone','province','city','address','postal-code','submit');
if(form::check($_POST, $req,TRUE)){
// if(form::check_type('siiiisis',$_POST)){
$user_id= Session::get('id');
$this->formModel->add_address($user_id,$_POST);
// }
}else {
}
$data=array();
$this->view('cp/address_add',$data);
}
function address(){
$address=$this->formModel->get_address();
$this->view('cp/my_address',$address);
}
function address_detail($id){
// validate id
$data=$this->formModel->get_address_detail($id);
$this->view('cp/address_detail',$data);
}
    function settings(){
    if (isAdmin(7)) {
        $insert = array('submit', 'title', 'about', 'logo', 'description', 'keywords', 'soroush', 'instagram', 'telegram', 'background', 'address', 'phone');
        if (form::check($_POST, $insert, TRUE)) {
//            print_r($_POST);
            $this->formModel->change_settings($_POST['title'], $_POST['about'], $_POST['logo'], $_POST['keywords'], $_POST['description']);
        }
        $data = $this->formModel->get_settings();
        $this->view('cp/settings', $data, true);
    }
    }

    function menu($mc=0){
        if(isAdmin(5)) {
            $req = array('id', 'menu', 'href', 'edit', 'back');
            if (form::check($_POST, $req, TRUE)) {
                if (form::check_type('issss', $_POST)) {
                    $this->formModel->change_menu($_POST);
                }
            }
            $insert = array('id', 'delete');
            if (form::check($_POST, $insert, TRUE)) {
                if (form::check_type('is', $_POST)) {
                    $this->formModel->remove_menu($_POST['id']);
                }
            }
            $insert = array('menu', 'parent', 'href', 'submit');
            if (form::check($_POST, $insert, TRUE)) {
                $this->formModel->add_menu($_POST['menu'], $_POST['href'], $_POST['parent']);
            }
            $data = $this->formModel->get_menu($mc);
            $this->view('cp/menu', $data, true);
        }
    }
    function menuPanel(){
        if(isAdmin(5)) {
            $insert = array('menu', 'parent', 'href', 'submit');
            if (form::check($_POST, $insert, TRUE)) {
                $this->formModel->add_menu($_POST['menu'], $_POST['href'], $_POST['parent']);
            }
            $data = $this->formModel->get_menuPanel();
            //print_r($data);
            $this->view('cp/menuPanel', $data, true);
        }
    }
function get_users($page=1){
        if(isAdmin(9)) {
            $page = (int)$page;
            $pagelimit = 40;
            $data = $this->formModel->get_users($page, $pagelimit);
            $pview = $this->formModel->get_pview('userlist', 'cp/get_users', $pagelimit);
            $this->view('cp/users_list', ['data' => $data, 'pview' => $pview], true);
        }
}
function edit_user($id){
    if(isAdmin());
    if(isset($id)){

    if(isset($_POST['sub'])){
    //print_r($_POST);
        if($_POST['barperc']>100 || $_POST['barperc']<0){
            msg('میزان درصد را درست وارد نمایید');
        }
    $this->formModel->edit_user($id,array('email'=>htmlentities($_POST['email']),'barperc'=>htmlentities($_POST['barperc']),
    'phone'=>htmlentities($_POST['tel']),'role'=>htmlentities($_POST['role']),
    'block'=>htmlentities($_POST['block'])));
    }
    if(isset($_POST['reset_pass'])&&isset($_POST['password'])){
        $this->formModel->edit_user($id,array('password'=>sha1(htmlentities($_POST['password']))));
    }
    $data=$this->formModel->get_user($id);
    //print_r($data);
    if(isset($data[0])){
    $data=$data[0];
    $this->view('cp/edit_user',$data,true);
    }

    }
}
function edit_order($factor_id){
	if(isset($factor_id)){
		$req=array('status','submit');
		if(form::check($_POST,$req,true)){
			$this->formModel->set_status($_POST,$factor_id);
		}
		$data=array('items'=>$this->formModel->show_factor($factor_id),'factor'=>$this->formModel->show_factor_main($factor_id));
		$this->view('cp/edit_order',$data);
	}
}


function profile(){
    $user_id= Session::get('id');
    $data=$this->formModel->get_profile($user_id);
    $this->view('cp/profile',$data);
}


    function purchased($page=1){
        if(isAdmin(6)) {
            $page = (int)$page;
            $data = $this->formModel->get_orders($page);
            $pview=$this->formModel->get_pview('factors where status>0','cp/purchased',50);
            $this->view('cp/purchased', ['data'=>$data,'pview'=>$pview], true);
        }
    }
    function deleteOrder($id=0){
        if(isAdmin()){
            if($this->formModel->deleteOrder($id)){
                $this->view('cp/deleteOrderSuccess');
            }else{
                $this->view('cp/deleteOrderFail');
            }
        }
    }
    function comments($verified=false){
        if($verified){
            $verified=1;
        }else{
            $verified=0;
        }
        $data=$this->formModel->get_comments($verified);
        $this->view('cp/comments',$data,true);
    }
    function edit_comment($id){
        if(isset($id)){

            if(isset($_POST['sub']) and $_POST['sub']=='submit'){
                $this->formModel->edit_comment($id,array('comment'=>htmlentities($_POST['comment']),'verified'=>htmlentities($_POST['verified'])));
            }elseif(isset($_POST['sub']) and $_POST['sub']=='delete'){
                $this->formModel->delete_comment($id);
                header('location:'.URL.'cp/comments/'.$_POST['verified']);
            }
            $data=$this->formModel->get_comment($id);
//print_r($data);
            if(isset($data[0])){
                $data=$data[0];
                $this->view('cp/edit_comment',$data,true);
            }

        }
    }

        function factor_show($factor_id){
            if($this->formModel->check_user('factors',$factor_id,'id')){
                $data=array('items'=>$this->formModel->show_factor($factor_id),'factor'=>$this->formModel->show_factor_main($factor_id));
// $data=$this->formModel->show_factor($factor_id);
                $this->view('cp/show_factor',$data);
            }else{
                header('location:'.URL.'cp');
            }

        }
        function factor_review(){
            $factor_id= $this->formModel->get_factor();
            $address=$this->formModel->get_address();
            $req=array('sel');
            $barg= $this->formModel->get_bargPerc();
            //item hay sel vojood dashte bashad
            if(form::check($_POST, $req)){
                foreach($_POST['sel'] as $item=>$value){
                    $this->formModel->change_item_numbers($item,$value,$factor_id);
                }
            }
            if (form::check($_POST, array('pay'))){
                echo 'pay now';
                echo $_POST['address'];
                $price=$this->formModel->set_final_factor($factor_id,$_POST['address'],$barg);
                die();
            }
            $data=$this->formModel->show_factor($factor_id);
            $this->view('cp/review_factor',['data'=>$data,'address'=>$address,'barg'=>$barg]);
        }
    function remove_from_list($id){
        $this->formModel->remove_from_list($id);
    }
    function my_orders(){
        $data=$this->formModel->get_my_orders();
        $this->view('cp/my_orders',$data);
    }
    function my_comments(){
        $data=$this->formModel->get_my_comments();
        $this->view('cp/my_comments',$data);
    }
    function my_favorites(){
        $data=$this->formModel->get_my_favorites();
        $this->view('cp/my_favorites',$data);
    }
//    not safe
    function address_remove($id){
        $this->formModel->remove_address($id);
        header('location: '.URL.'cp/address');
    }
}
