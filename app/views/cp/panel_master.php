<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <title>ناحیه کاربری</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?= display(URL) ?>public/bootstrap-3.3.6-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= display(URL) ?>public/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= display(URL) ?>public/css/mycss.css">
<link rel="stylesheet" href="<?= display(URL) ?>public/font/font.css">
<!-- jQuery library -->
<script src="<?= display(URL) ?>public/bootstrap-3.3.6-dist/js/jquery.min.js"></script>
<script src="<?=URL?>public/js/jquery-ui.js"></script>
<!-- Latest compiled JavaScript -->
<script src="<?= display(URL) ?>public/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
<script src="<?= display(URL) ?>public/js/myscript.js"></script>
<!-- AngularJS -->
<script src="<?= display(URL) ?>public/js/angular.min.js"></script>
<style>
body{
    text-align: right;
    direction: rtl;
}
a:link, a:visited{
	text-decoration:none;
}
ul li{
	list-style-type: none;
}
li ul li{
	margin-left:-1em;
}

.bg-dark {
    background-color: #494949;
	color:#BFB8B8;
}
.top-align{
	padding:10px 50px 10px 50px;
}


</style>
</head>
<body>
  <?php require_once('app/views/menu.php'); ?>
 <script>
$(function(){
$('.mother').click(function(e) {
    $(this).siblings('ul').toggle();
	$(this).children('span').toggleClass('glyphicon-chevron-right glyphicon-chevron-down');
});
});

</script>
<div class="container-fluid text-primary" style="margin-top:0px">
<div class="row">
  <div class="col-xs-12 col-sm-2" align="center">
  <div id="navigation" align="left" dir="ltr">
        <ul>
        <?php if(isAdmin()){?>
            <li>
                <a class="mother" href="<?= LINK ?>">میز کار <span class="glyphicon glyphicon-chevron-down"></span></a>
                <ul id="sectionOneLinks">
                    <?php if(isAdmin(1)){?><li><a href="<?= display(URL) ?>cp/home_page/"><span class="glyphicon glyphicon-th"></span> صفحه ی اصلی</a></li><?php } ?>
                    <?php if(isAdmin(2)){?><li><a href="<?= display(URL) ?>cp/items/"><span class="glyphicon glyphicon-th"></span> محصولات</a></li><?php } ?>
                    <?php if(isAdmin(2)){?><li><a href="<?= display(URL) ?>cp/pages/"><span class="glyphicon glyphicon-th"></span> صفحات</a></li><?php } ?>
                    <?php if(isAdmin(3)){?><li><a href="<?= display(URL) ?>cp/show_cat"><span class="glyphicon glyphicon-list"></span> دسته بندی ها</a></li><?php } ?>
                    <?php if(isAdmin(4)){?><li><a href="<?= display(URL) ?>cp/files/"><span class="glyphicon glyphicon-picture"></span> فایل ها</a></li><?php } ?>
                    <?php if(isAdmin(5)){?><li><a href="<?= display(URL) ?>cp/menuPanel"><span class="glyphicon glyphicon-menu-hamburger"></span> منو ها </a></li><?php } ?>
                    <?php if(isAdmin(6)){?><li><a href="<?= display(URL) ?>cp/purchased"><span class="glyphicon glyphicon-shopping-cart"></span> سفارشات</a></li><?php } ?>
                    <?php if(isAdmin(7)){?><li><a href="<?= display(URL) ?>cp/settings"><span class="glyphicon glyphicon-cog"></span> تنظیمات </a></li><?php } ?>
                    <?php if(isAdmin(8)){?><li><a href="<?= display(URL) ?>cp/stockroom"><span class="glyphicon glyphicon-cog"></span>انبار داری</a></li><?php } ?>
                </ul>
            </li>
            <?php if(isAdmin(9)){?>
            <li>
                <a class="mother" href="#">کاربران <span class="glyphicon glyphicon-chevron-down"></span></a>
                <ul id="sectionTwoLinks">
                    <li><a href="<?= display(URL) ?>cp/get_users/"><span class="glyphicon glyphicon-user"></span> لیست کاربران</a></li>
                </ul>
            </li>
            <?php } ?>
            <?php } ?>
			<li>
                <a class="mother" href="#">گزارش <span class="glyphicon glyphicon-chevron-down"></span></a>
                <ul id="sectionThreeLinks" ><!--style="display: none;"-->
                    <li><a href="<?= display(URL) ?>cp/factor_review">سبد خرید</a></li>
                  <li><a href="<?= display(URL) ?>cp/my_orders">سفارشات من</a></li>
                  <li><a href="<?= display(URL) ?>cp/my_favorites">لیست مورد علاقه</a></li>
<!--                  <li><a href="--><?//= display(URL) ?><!--cp/track">رهگیری سفارشات</a></li>-->
                    <li><a href="<?= display(URL) ?>cp/address">آدرس های من</a></li>
<!--                    -->
<!--                  <li><a href="--><?//= display(URL) ?><!--cp/my_comments">نظرات من</a></li>-->
<!--                  <li><a href="--><?//= display(URL) ?><!--cp/#">پیام پشتیبانی</a></li>-->
<!--                  <li><a href="--><?//= display(URL) ?><!--cp/profile">پروفایل من</a></li>-->

                </ul>
            </li>
        </ul>
    </div>
  </div>
  <div class="col-xs-12 col-sm-10">
      <?php
      require_once 'app/views/'.$this->page.'.php';
      ?>
  </div>

</div>
</div>



</body>
</html>