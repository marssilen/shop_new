<?php
//$images=explode(',',$data['data']['image']);
$images=  $data['data']['image'];
$disable='';
$hide='';
if($data['data']['page']!=0){
    $disable='disabled';
    $hide='w3-hide';
}
?>
<?php require_once('app/views/head.php'); ?>
<body>
<?php require_once('app/views/menu.php'); ?>
<script src="<?= URL ?>public/js/ckeditor/ckeditor.js"></script>
<div class="w3-white container center" >
    <?php require_once('app/views/msgbox.php'); ?>
    <div class="w3-row">
        <div class="w3-col s8" style="padding:15px">
            <div class="w3-card-2 w3-round" style="padding: 15px"><!--left images-->
                <div>
                    <button style="margin:5px" onclick="document.getElementById('add_image_modal').style.display='block'" class="w3-btn w3-white w3-round w3-border">+</button>
                </div>

                <?php
                foreach($images as $image){
                    if(!empty($image))
                    {
                        ?>
                        <div class=" w3-col m3 s6" style="padding:5px" >
                            <div>
                                <div >
                                    <a href="<?php echo 'delete_pic/'.$image['item_id'].'/'.$image['id']; ?>">
                                        <button class="w3-small">X</button></a>
                                </div>
                                <a href="<?= URL.'public/upload/'.$image['image']; ?>">
                                    <img src="<?=URL.'public/upload/'.$image['image']; ?>" style="width:100%">
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <div style="clear:both"></div>
            </div>
            <br>
            <div class="w3-card-2  w3-round"><!--left-->
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $this->max_file_size; ?>">
                    <textarea name="long_description" id="editor2" rows="500" style="height: 800px"><?php echo $data['data']['long_description'] ?></textarea><br>
                    <div style="margin:5px">
                        <button type="submit" name="insert" class="w3-btn w3-green w3-round w3-right" >ثبت</button>
                    </div>
                    <br><br>
                </form>
                <!--another editor-->
                <form class="<?=$hide?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $this->max_file_size; ?>">
                    <textarea <?=$disable?> name="short_description" id="editor1" rows="500" style="height: 800px"><?php echo $data['data']['short_description'] ?></textarea><br>
                    <div style="margin:5px">
                        <button <?=$disable?> type="submit" name="insert_short" class="w3-btn w3-green w3-round w3-right" >ثبت</button>
                    </div>
                    <br><br>
                </form>
            </div>
            <br>
        </div><!--end left container-->

        <div class="w3-col s4" style="padding:15px">
                <div class="w3-card w3-margin-bottom" style="padding: 4px;">
                    <div class="w3-row">
                    <a href="<?= 'delete_item/'.$data['data']['id'].'/'.urlencode($data['data']['name']) ?>"><button class="w3-col s6 w3-btn w3-red">حذف</button></a>
                    <a target="_blank" href="<?=URL.'page/'.$data['data']['id'].'/'.urlencode($data['data']['name']) ?>"><button class="w3-col s6 w3-btn w3-blue">نمایش</button></a>
                    </div>
                    <form method="post" action="">
                        صفحه:
                        <input name="page" value="<?=$data['data']['page']?>" class="w3-check" type="checkbox" <?=($data['data']['page']!=0)?'checked':''?>>
                        <button type="submit" name="chpage" style="margin-top:15px;" class="w3-btn w3-green w3-input round_b" >تغییر</button>
                    </form>
                </div>
            <div class="w3-card-2  w3-round">
                <img alt="Insert an image" src="<?php if(!empty($data['data']['card_image']))echo URL.'public/upload/'.$data['data']['card_image'];else  echo '../img/default.jpg'?>" style="width:100%">
                <div class="">
                        <button onclick="document.getElementById('add_card_image_modal').style.display='block'" class="w3-btn w3-green round_b" style="display:block;width:100%">تغییر</button>
                </div>
            </div>
            <br>
            <div class="w3-card-2  w3-round" >
                <form method="post" enctype="multipart/form-data" action="change_name/<?php echo $data['data']['id'] ?>">
                    <div class="w3-padding">
                        <label class="w3-label w3-text-blue"><b>نام</b></label>
                        <input class="w3-input w3-border w3-round" type="text" name="name"  value="<?php echo $data['data']['name'] ?>">
                    </div>
                    <button type="submit" name="change_name" style="margin-top:15px;" class="w3-btn w3-green w3-input round_b" >تغییر</button>
                </form>
            </div>
            <br>
            <div class="w3-card-2  w3-round" style="margin-top: 10px">
                <div class="w3-container w3-padding">
                    <label class="w3-label w3-text-blue"><b>دسته بندی</b></label>
                    <form method="post" enctype="multipart/form-data" action="change_category/<?php echo $data['data']['id'] ?>">
                        <select name="cat" class="w3-select w3-border">
                            <?php
                            foreach($this->cats as $option){
                                $selected=($data['data']['cat']==$option['id'])?'selected':'';
                                echo '<option value='.$option['id'].' '.$selected.'>'.$option['cat'].'</option>';
                                $option['cat'];
                            }
                            ?>
                        </select>
                </div>
                <button type="submit" name="change_category" style="margin-top:15px;" class="w3-btn w3-green w3-input round_b" >تغییر</button>
                </form>
            </div>
            <br>
<!--            options-->
            <div class="w3-card-2 w3-round <?=$hide?>">
                <div class="w3-light-grey w3-padding">مشخصات</div>
                <form method="post" enctype="multipart/form-data">
                    <textarea <?=$disable?> name="options" id="editor3" rows="50" style="height: 100px"><?php echo $data['data']['options'] ?></textarea><br>
                    <div style="margin:5px">
                        <button <?=$disable?> type="submit" name="insertOptions" class="w3-btn w3-green w3-round w3-right" >ثبت</button>
                    </div>
                    <br><br>
                </form>
            </div>
            <div class="w3-card-2 w3-round w3-padding">
                <form class="<?=$hide?>" method="post" enctype="multipart/form-data" action="change_price/<?php echo $data['data']['id'] ?>">
                    <div class="w3-container w3-padding-16">
                        <label class="w3-label w3-text-blue"><b>قیمت</b></label>
                        <input <?=$disable?> class="w3-input w3-border w3-round" type="text" name="price"  value="<?php echo $data['data']['price'] ?>">
                    </div>
                    <button <?=$disable?> type="submit" name="change_price" style="margin-top:15px;" class="w3-btn w3-green w3-input round_b" >تغییر قیمت</button>
                </form>
            </div>
            <br>
            <div class="w3-card-2 w3-round" style="margin-top:10px"><!--tag-->
                <div class="w3-container">
                    <label class="w3-label w3-text-blue"><b>
                            تگ
                        </b></label>
                </div>
                <form method="post" enctype="multipart/form-data" action="change_tag/<?php echo $data['data']['id'] ?>">
                    <div class="w3-container">
                        <input class="w3-input w3-border w3-round input" type="text" name="tag" value="<?=$data['data']['tag_str']?>"/>
                        <p>
                            <?php
                            foreach ($data['tags'] as $tag){
                                echo $tag['tag'].'<br>';
                            }
                            ?>
                        </p>
                    </div>
                    <button type="submit" name="change_tag" style="margin-top:15px;" class="w3-btn w3-green w3-input round_b" >تغییر</button>
                </form>
            </div>
        </div>
    </div>
    <br>
</div>
<div id="add_image_modal" class="w3-modal">
    <div class="w3-modal-content w3-container w3-round">
        <header class="w3-white">
      <span onclick="document.getElementById('add_image_modal').style.display='none';"
            class="w3-closebtn" style="cursor:pointer">&times;</span>
        </header>
        <div class="w3-center">
            <p>آپلود تصویر</p>
        </div>
        <div class="w3-container" style="padding: 50px">
            <form method="post" enctype="multipart/form-data" action="add_image/<?=$data['data']['id']?>">
                <input class="w3-input" placeholder="توضیح" name="alt">
                <input name="image" type="file" id="image_upload" style="margin-top: 10px;margin-bottom: 10px" >
                <button type="submit" name="add_image" class="btn btn-primary">ارسال</button>
            </form>
        </div>
    </div>
</div>
<div id="add_card_image_modal" class="w3-modal">
    <div class="w3-modal-content w3-container w3-round">
        <header class="w3-white">
      <span onclick="document.getElementById('add_card_image_modal').style.display='none'"
            class="w3-closebtn">&times;</span>
        </header>
        <div class="w3-center">
            <p>آپلود تصویر</p>
        </div>
        <div class="w3-container" style="padding: 50px">
            <form method="post" enctype="multipart/form-data" action="add_card_image/<?=$data['data']['id']?>">
                <input class="w3-input" placeholder="توضیح" name="alt">
                <input name="image" type="file" id="image_upload" style="margin-top: 10px;margin-bottom: 10px" >
                <button type="submit" name="add_card_image" class="btn btn-primary">ارسال</button>
            </form>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );
    CKEDITOR.replace( 'editor3' );
</script>
</body>
</html>
