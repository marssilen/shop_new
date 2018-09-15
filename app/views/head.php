<?php
if(isset($this)) {
    $settings = $this->settings;
}
?>
<!doctype html>
<html lang="fa">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="<?php if(isset($settings['logo']))echo $settings['logo'];else{?>#<?php } ?>"/>
    <meta name="keywords" content="<?php if(isset($key)){echo $key;}elseif(isset($settings['keywords']))echo $settings['keywords'];else{?>امنیران<?php } ?>"/>
    <meta name="description" content="<?php
    if(isset($desc)){
        echo $desc;
    }elseif(isset($settings['description'])){
        echo $settings['description'];
    }else{echo 'امنیران';
    }?>"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?= URL ?>public/bootstrap-3.3.6-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= URL ?>public/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= URL ?>public/css/mycss.css">
<?php require_once('app/views/font.php'); ?>
<!-- jQuery library -->
<script src="<?= URL ?>public/bootstrap-3.3.6-dist/js/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="<?= URL ?>public/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script src="<?= URL ?>public/js/header.js.php"></script>
<script src="<?= URL ?>public/js/myscript.js"></script>
<title><?php if(isset($title) and isset($settings['title']))echo $title.'-'.$settings['title'];
elseif(isset($settings['title']))echo $settings['title'];else{?>امنیران<?php } ?></title>
</head>
