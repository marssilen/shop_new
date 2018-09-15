<?php
$title=$data['data']['name'];
$desc='hi';
$key='new key';
require_once('app/views/head.php');
?>
<body>
<div id="wrapper">
<?php require_once('app/views/menu.php'); ?>
    <div id="content">
<div class="container w3-row w3-card-2 cardContainer">
    <div class="w3-col m8 s12" style="position: relative">
        <div id="zoom_div" class="w3-card-2">
            <div id="zoom_div2">
                <img id="zoom_image" src="<?= URL.'public/upload/'.$data['data']['card_image']?>">
            </div>
        </div>
        <div class="w3-margin-32 w3-round-medium w3-light-grey w3-container">
        <h3 class="w3-round w3-light-grey w3-center" style="padding: 5px"><?php if (!empty($data['data']['name'])){?><?= $data['data']['name']?><?php } ?></h3>
        </div>
        <div class="w3-margin-32 w3-container w3-padding-16 w3-row" id="columnTwo">
            <div class="w3-col m4" id="options">
                <?= $data['data']['options'] ?>
            </div>
            <div class="w3-col m8">
                <?= $data['data']['long_description'] ?>
            </div>
        </div>
    </div>
    <div class="w3-col s12 m4 w3-center" >
        <div style="" class=" w3-margin-32 w3-padding-16" id="columnOne">
            <p style="text-align: left;margin-left: 15px">
                <a href="javascript:void(0)" id="fav_btn"></a>
                <a id="share_btn" href="https://telegram.me/share/url?url=<?=URL.'page/'.$data['data']['id'].'&text='.$data['data']['name']?>"></a>
            </p>
            <div class="w3-center"><img id="card_image" style="width: 100%" src="<?= URL.'public/upload/'.$data['data']['card_image']?>"/></div>
            <div class=" w3-padding-8" style="margin-top:20px">
                <?php
                $images=$data['data']['image'];
                foreach ($images as $image) {?>
                    <img onclick="show_modal('<?= URL.'public/upload/'.$image['image']?>')" src="<?= URL.'public/upload/'.$image['image_thumb']?>" class="w3-hover-opacity" width="50" height="50" />
                <?php } ?>
            </div>
            <form id="form" method="post" enctype="multipart/form-data">
                <p class="price-sec">قیمت:
                    <?php if(Session::get('role')=='couser'){?>
                        <?= $data['data']['old_price'] ?>
                        <br><del><?= $data['data']['price'] ?></del>
                    <?php }else{?>
                        <?= $data['data']['price'] ?>
                    <?php } ?>
                    <span style="font-size: 16px">تومان</span>
                </p>
                <input type="hidden" name="id" value="<?= $data['data']['id'] ?>"/>
            </form>
            <?php if($data['data']['number']>0){ ?>
                <button id="buy_btn" class="w3-btn w3-green w3-round" style="position: relative" type="submit" name="submit"><i id="shop_btn"></i>افزودن به سبد خرید</button>
            <?php }else{ ?>
                <div class="w3-alert w3-red w3-round">محصول موجود نمی باشد</div>
            <?php } ?>
        </div>

    </div>
</div>
        <div class="container w3-row w3-card-2 cardContainer">
        <div class="w3-margin-32 w3-container">
            <h2 class="headline">معرفی اجمالی محصول</h2>
        <div>
            <?= $data['data']['short_description'] ?>
        </div>
        <div>
            <?php foreach ($data['tags'] as $tag){?>
                <a href="<?=URL.'tag/&tag='.$tag['tag']?>"><span class="tag"><?= $tag['tag']?></span></a>
            <?php } ?>
        </div>
        </div>
        </div>

</div>
<?php
require_once ('app/views/footer.php');
?>
</div>
</body>
</html>
