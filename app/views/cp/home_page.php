<script>
    function hi(x) {
        document.getElementById('pic-id').value=x.id;
        document.getElementById('slide-id').value=x.id;
        document.getElementById('title').value=x.title;
        document.getElementById('price').value=x.price;
        document.getElementById('url').value=x.url;
        document.getElementById('old_price').value=x.old_price;
        document.getElementById('desc').value=x.desc;
        document.getElementById('slider-form').style.display='block';
        return false;
    }

</script>
<div class="w3-container" style="padding: 5px;overflow: hidden">
    <div class="w3-card-2 w3-padding">
        <img class="" src="<?=URL?>public/upload/<?=$data['cat_items'][7]['image']?>">
        <form method="post" class="w3-margin-bottom" enctype="multipart/form-data" action="">
            <input type="hidden" value="8" name="id">
            <label class="btn btn-default btn-file">
                انتخاب
                <input name="image" type="file" id="image_upload" style="display: none" >
            </label>
            <button type="submit" name="cat_pic" class="btn btn-primary">تغییر عکس</button>
            <br>
        </form>
        <form method="post">
            <button class="btn" type="submit" name="change_cat">تغییر</button>
            <input type="hidden" value="8" name="id">
            <input placeholder="url" type="text" style="display: inline-block;width: 50%" class="w3-rest w3-border" name="surl" value="<?=$data['cat_items'][7]['surl']?>">
        </form>
    </div>
</div>
<div class="w3-container w3-card-2" style="min-height: 400px;margin: 15px;padding: 50px;">
<!--   slide show -->
    <div id="amazingoffer" class="dk-box mrg-bottom waiting w3-row w3-light-grey center w3-card-2 w3-round"
         style="height: 400px;max-width:1000px;overflow: hidden">
        <div class="">
            <div class="fade_anim slides center w3-twothird w3-white" style="height: 400px;">
                <?php $i=0;foreach ($data['slider'] as $slide){$i++;?>
                    <a id="slide<?=$slide['id']?>" class="slideItem link" style="position: relative" title="" href="<?=$slide['url']?>">
                        <div dir="ltr" style="margin-top: 40px">
                            <div class="w3-col s6 w3-center" style="padding: 5px">
                                <div style="font-size: 28px;color: #3c3c3c"><?=$slide['title']?></div>
                                <img class="" src="<?=URL?>public/upload/<?=$slide['image']?>"  height="220" width="220">
                            </div>
                            <div class="w3-col s6 w3-center" dir="rtl" style="padding: 15px">
                                <div style="text-align: right;color: red;font-size: 28px">پشنهاد ویژه امروز</div>
                                <div class="w3-row"><span class="w3-col s8 w3-green title"><?=$slide['price']?> تومان</span><span class="w3-col s4 w3-grey" style="font-size: large;text-decoration:line-through;"><?=$slide['old_price']?></span></div>
                                <p style="text-align: right"><?=$slide['desc']?>
                                </p>
                                <button class="w3-btn w3-round w3-blue" onclick='hi(<?=json_encode($slide)?>);return false'>
                                    تغییر</button>
                            </div>
                        </div>
                        <!--                <div data-seconds-left="38674.317" class="timer"><span class="timer__holder timer__holder--hours"><span>1</span><span>0</span></span><span class="timer__spacer">:</span><span class="timer__holder timer__holder--minutes"><span>3</span><span>3</span></span><span class="timer__spacer">:</span><span class="timer__holder timer__holder--seconds"><span>1</span><span>1</span></span>-->
                        <!--                </div>-->
                    </a>
                <?php } ?>
            </div>
            <div class="w3-third">
                <ul class="" style="padding: 0px;margin: 0px">
                    <?php $i=0;foreach ($data['slider'] as $slide){$i++;?>
                    <li class="item"><a onclick="slideto(<?=$i?>)" onmousedown="return false" title="<?=$slide['title']?>خرید اینترنتی " class="tabItem" href="javascript:void(0)"><span class="title"><?=$slide['title']?></span><span class="arr"></span></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <!--        items-->
    <div style="max-width:1000px;margin: auto;padding: 0px" class="">
        <div class="w3-row w3-margin-top">
            <div class="w3-col s8" style="padding: 5px">
                <div class="w3-card-2" style="padding: 5px;overflow: hidden">
                    <form method="post" enctype="multipart/form-data" action="">
                        <input type="hidden" value="1" name="id">
                        <label class="btn btn-default btn-file">
                            انتخاب
                            <input name="image" type="file" id="image_upload" style="display: none" >
                        </label>
                        <button type="submit" name="cat_pic" class="btn btn-primary">تغییر عکس</button>
                    </form>
                        <img class="img" src="<?=URL?>public/upload/<?=$data['cat_items'][0]['image']?>">
                    <form method="post">
                    <button class="btn" type="submit" name="change_cat">تغییر</button>
                        <input type="hidden" value="1" name="id">
                        <select name="cat">
                            <?php foreach ($data['cats'] as $cat){ ?>
                                <option <?php if($data['cat_items'][0]['url']==$cat['id']) echo 'selected'; ?> value="<?=$cat['id']?>"><?= $cat['cat']?></option>
                            <?php } ?>
                        </select>
                    </form>

                </div>
            </div>
            <div class="w3-col s4"  style="padding: 5px;overflow: hidden">
                <div class="w3-card-2">
                    <form method="post" enctype="multipart/form-data" action=""><input type="hidden" value="2" name="id">
                      <label class="btn btn-default btn-file">
                انتخاب
                <input name="image" type="file" id="image_upload" style="display: none" >
            </label>
                        <button type="submit" name="cat_pic" class="btn btn-primary">تغییر عکس</button>
                        <img class="img" src="<?=URL?>public/upload/<?=$data['cat_items'][1]['image']?>">
                    </form>
                    <form method="post">
                        <button class="btn" type="submit" name="change_cat">تغییر</button>
                        <input type="hidden" value="2" name="id">
                        <select name="cat">
                            <?php foreach ($data['cats'] as $cat){ ?>
                                <option <?php if($data['cat_items'][1]['url']==$cat['id']) echo 'selected'; ?> value="<?=$cat['id']?>"><?= $cat['cat']?></option>
                            <?php } ?>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="w3-row w3-margin-top">
            <div class="w3-col s4"  style="padding: 5px;overflow: hidden">
                <div class="w3-card-2">
                    <form method="post" enctype="multipart/form-data" action=""><input type="hidden" value="3" name="id">
                      <label class="btn btn-default btn-file">
                انتخاب
                <input name="image" type="file" id="image_upload" style="display: none" >
            </label>
                        <button type="submit" name="cat_pic" class="btn btn-primary">تغییر عکس</button>
                        <img class="img" src="<?=URL?>public/upload/<?=$data['cat_items'][2]['image']?>">
                    </form>
                    <form method="post">
                        <button class="btn" type="submit" name="change_cat">تغییر</button>
                        <input type="hidden" value="3" name="id">
                        <select name="cat">
                            <?php foreach ($data['cats'] as $cat){ ?>
                                <option <?php if($data['cat_items'][2]['url']==$cat['id']) echo 'selected'; ?> value="<?=$cat['id']?>"><?= $cat['cat']?></option>
                            <?php } ?>
                        </select>
                    </form>
                </div>
            </div>
            <div class="w3-col s4"  style="padding: 5px;overflow: hidden">
                <div class="w3-card-2">
                    <form method="post" enctype="multipart/form-data" action=""><input type="hidden" value="4" name="id">
                      <label class="btn btn-default btn-file">
                انتخاب
                <input name="image" type="file" id="image_upload" style="display: none" >
            </label>
                        <button type="submit" name="cat_pic" class="btn btn-primary">تغییر عکس</button>
                        <img class="img" src="<?=URL?>public/upload/<?=$data['cat_items'][3]['image']?>">
                    </form>
                    <form method="post">
                        <button class="btn" type="submit" name="change_cat">تغییر</button>
                        <input type="hidden" value="4" name="id">
                        <select name="cat">
                            <?php foreach ($data['cats'] as $cat){ ?>
                                <option <?php if($data['cat_items'][3]['url']==$cat['id']) echo 'selected'; ?> value="<?=$cat['id']?>"><?= $cat['cat']?></option>
                            <?php } ?>
                        </select>
                    </form>
                </div>
            </div>
            <div class="w3-col s4"  style="padding: 5px;overflow: hidden">
                <div class="w3-card-2">
                    <form method="post" enctype="multipart/form-data" action=""><input type="hidden" value="5" name="id">
                      <label class="btn btn-default btn-file">
                انتخاب
                <input name="image" type="file" id="image_upload" style="display: none" >
            </label>
                        <button type="submit" name="cat_pic" class="btn btn-primary">تغییر عکس</button>
                        <img class="img" src="<?=URL?>public/upload/<?=$data['cat_items'][4]['image']?>">
                    </form>
                    <form method="post">
                        <button class="btn" type="submit" name="change_cat">تغییر</button>
                        <input type="hidden" value="5" name="id">
                        <select name="cat">
                            <?php foreach ($data['cats'] as $cat){ ?>
                                <option <?php if($data['cat_items'][4]['url']==$cat['id']) echo 'selected'; ?> value="<?=$cat['id']?>"><?= $cat['cat']?></option>
                            <?php } ?>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="w3-row w3-margin-top">
            <div class="w3-col s4"  style="padding: 5px;overflow: hidden">
                <div class="w3-card-2">
                    <form method="post" enctype="multipart/form-data" action=""><input type="hidden" value="6" name="id">
                          <label class="btn btn-default btn-file">
                انتخاب
                <input name="image" type="file" id="image_upload" style="display: none" >
            </label>
                        <button type="submit" name="cat_pic" class="btn btn-primary">تغییر عکس</button>
                    <img class="img" src="<?=URL?>public/upload/<?=$data['cat_items'][5]['image']?>">
                    </form>
                    <form method="post">
                        <button class="btn" type="submit" name="change_cat">تغییر</button>
                        <input type="hidden" value="6" name="id">
                        <select name="cat">
                            <?php foreach ($data['cats'] as $cat){ ?>
                                <option <?php if($data['cat_items'][5]['url']==$cat['id']) echo 'selected'; ?> value="<?=$cat['id']?>"><?= $cat['cat']?></option>
                            <?php } ?>
                        </select>
                    </form>
                </div>
            </div>
            <div class="w3-col s8" style="padding: 5px;overflow: hidden">
                <div class="w3-card-2" style="padding: 5px;overflow: hidden">
                    <form method="post" enctype="multipart/form-data" action=""><input type="hidden" value="7" name="id">
                          <label class="btn btn-default btn-file">
                انتخاب
                <input name="image" type="file" id="image_upload" style="display: none" >
            </label>
                        <button type="submit" name="cat_pic" class="btn btn-primary">تغییر عکس</button>
                    <img class="img" src="<?=URL?>public/upload/<?=$data['cat_items'][6]['image']?>">
                    </form>
                    <form method="post">
                        <button class="btn" type="submit" name="change_cat">تغییر</button>
                        <input type="hidden" value="7" name="id">
                        <select name="cat">
                            <?php foreach ($data['cats'] as $cat){ ?>
                                <option <?php if($data['cat_items'][6]['url']==$cat['id']) echo 'selected'; ?> value="<?=$cat['id']?>"><?= $cat['cat']?></option>
                            <?php } ?>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--   offer scroll -->
    <div class="w3-round w3-light-gray">
        <div style="position:relative;margin-top: 15px;margin-bottom: 15px;" dir="ltr">
            <h3 class="w3-center">پیشنهاد ما</h3>
            <form method="POST" action="" style="padding-right: 70px">
                <input style="margin: 5px;padding: 1px 15px 1px 15px" class="add_list_a w3-blue w3-btn w3-round" type="submit" name="insert" value="افزودن"/>
            </form>
            <div id="scroll2" class="scroll">
                <?php
                $i=0;
                foreach($data['data'] as $card){$i++; ?>

                    <div class="section w3-card-2 w3-white" id="section<?=$i?>">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?=$card['id']?>">
                            <input type="hidden" name="show_type" value="1">
                        <img class="img" style="width: 100%" src="<?= URL ?>public/upload/<?=$card['image']?>">
                        <div class="w3-container" style="margin-bottom: 5px">
                        <p dir="rtl">
                            <input name="title" value="<?=$card['title']?>" class="w3-input" placeholder="نام">
                            <input name="description" value="<?=$card['description']?>" class="w3-input" placeholder="قیمت">
                        </p>
                            <select name="cat" style="width: 100%;clear: both;display: block;margin-bottom: 10px;text-align:right;direction: rtl">
                                <?php foreach ($data['items'] as $item){ ?>
                                    <option <?php if($card['url_cat']==$item['id']) echo 'selected'; ?> value="<?=$item['id']?>"><?= $item['name']?></option>
                                <?php } ?>
                            </select>
                            <button class="btn w3-red" type="submit" name="delete">حذف</button>
                            <a onclick="document.getElementById('add_card_image_modal').style.display='block';document.getElementById('id').value='<?=$card['id']?>'" class="btn w3-yellow">عکس</a>
                            <button class="btn" type="submit" name="change">تغییر</button>
                        </div>
                        </form>
                    </div>

                <?php } ?>
            </div>
            <button class="scrollbtn2 sc" style="right:0px;" href="next"><i class="fa fa-chevron-right" aria-hidden="true"></i>
            </button>
            <button class="scrollbtn2 sc" style="left:0px;" href="back"><i class="fa fa-chevron-left" aria-hidden="true"></i>
            </button >
        </div>
    </div>
<!--    banner-->
    <?php
    $data['cat_items'];
    $banners=array();
    foreach ($data['cat_items'] as $banner){
        if($banner['sidebar']!=0){
            $banners[]=$banner;
        }
    }
    ?>
    <div class="w3-round w3-light-gray">
        <div style="position:relative;margin-top: 15px;margin-bottom: 15px;" dir="ltr">
            <h3 class="w3-center">بنر</h3>
            <form method="POST" action="" style="padding-right: 70px">
                <input style="margin: 5px;padding: 1px 15px 1px 15px" class="add_list_a w3-blue w3-btn w3-round" type="submit" name="insertBanner" value="افزودن"/>
            </form>
            <div id="scroll3" class="scroll">
                <?php
                $i=0;
                foreach($banners as $card){$i++; ?>
                    <div class="section w3-card-2 w3-white" id="section<?=$i?>">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?=$card['id']?>">
                        <img class="img" style="width: 100%" src="<?= URL ?>public/upload/<?=$card['image']?>">
                        <div class="w3-container" style="margin-bottom: 5px">
                        <p dir="rtl">
                            <input name="surl" value="<?=$card['surl']?>" class="w3-input" placeholder="url">
                        </p>
                            <button class="btn w3-red" type="submit" name="deleteBanner">حذف</button>
                            <a onclick="document.getElementById('add_banner_image_modal').style.display='block';document.getElementById('bannerId').value='<?=$card['id']?>'" class="btn w3-yellow">عکس</a>
                            <button class="btn" type="submit" name="changeBanner">تغییر</button>
                        </div>
                        </form>
                    </div>

                <?php } ?>
            </div>
            <button class="scrollbtn3 sc" style="right:0px;" href="next"><i class="fa fa-chevron-right" aria-hidden="true"></i>
            </button>
            <button class="scrollbtn3 sc" style="left:0px;" href="back"><i class="fa fa-chevron-left" aria-hidden="true"></i>
            </button >
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
            <form method="post" enctype="multipart/form-data" action="">
                  <label class="btn btn-default btn-file">
                انتخاب
                <input name="image" type="file" id="image_upload" style="display: none" >
            </label>
                <input name="id" type="hidden" id="id" value="">
                <button type="submit" name="pic" class="btn btn-primary">ارسال</button>
            </form>
        </div>
    </div>
</div>
<div id="add_banner_image_modal" class="w3-modal">
    <div class="w3-modal-content w3-container w3-round">
        <header class="w3-white">
      <span onclick="document.getElementById('add_banner_image_modal').style.display='none'"
            class="w3-closebtn">&times;</span>
        </header>
        <div class="w3-center">
            <p>آپلود تصویر</p>
        </div>
        <div class="w3-container" style="padding: 50px">
            <form method="post" enctype="multipart/form-data" action="">
                <label class="btn btn-default btn-file">
                    انتخاب
                    <input name="image" type="file" id="image_upload" style="display: none" >
                </label>
                <input name="bannerId" type="hidden" id="bannerId" value="">
                <button type="submit" name="submit" class="btn btn-primary">ارسال</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        var current2=1;
        var max2=<?=count($data['data'])?>;
        $('.scrollbtn2').bind('click',function(event){
            var $anchor = $(this).attr('href');
            if($anchor=='next'){
                current2++;
            }else{
                current2--;
            }
            if(current2>max2){
                current2=max2;
            }
            if(current2<1){
                current2=1;
            }
//            alert(current);
            var sc=$("#scroll2>#section"+current2).position().left+$('#scroll2').scrollLeft();
            $('html, #scroll2').stop().animate({
                scrollLeft: sc
            }, 800);
            event.preventDefault();
        });
        var current3=1;
        var max3=<?=count($data['data'])?>;
        $('.scrollbtn3').bind('click',function(event){
            var $anchor = $(this).attr('href');
            if($anchor=='next'){
                current3++;
            }else{
                current3--;
            }
            if(current3>max3){
                current3=max3;
            }
            if(current3<1){
                current3=1;
            }
//            alert(current);
            var sc=$("#scroll3>#section"+current3).position().left+$('#scroll3').scrollLeft();
            $('html, #scroll3').stop().animate({
                scrollLeft: sc
            }, 800);
            event.preventDefault();
        });

    });
</script>
<div class="w3-modal" id="slider-form">
    <div class="w3-modal-content w3-round" style="padding: 16px">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="slide-id" value="">
            <div class="w3-panel w3-rightbar">
            <label for="title">نام</label>
            <input class="w3-input" id="title" name="title">
            </div>
            <div class="w3-panel w3-rightbar">
                <label for="old_price">قیمت اصلی</label>
                <input class="w3-input" id="old_price" name="old_price">
            </div>
            <div class="w3-panel w3-rightbar">
                <label for="price">قیمت با تخفیف</label>
                <input class="w3-input" id="price" name="price">
            </div>
            <div class="w3-panel w3-rightbar">
                <label for="url">URL</label>
                <input class="w3-input" id="url" name="url">
            </div>
            <div class="w3-panel w3-rightbar">
                <label for="desc">توضیحات</label>
                <textarea class="w3-input" id="desc" name="desc"></textarea>
            </div>
            <button class="btn btn-primary" type="submit" name="change-slider">تغییر</button>
            <button class="btn btn-danger" onclick="document.getElementById('slider-form').style.display='none';return false;">لغو</button>
        </form>
        <form method="post" enctype="multipart/form-data" action="">
              <label class="btn btn-default btn-file">
                انتخاب
                <input name="image" type="file" id="image_upload" style="display: none" >
            </label>
            <input name="id" type="hidden" id="pic-id" value="">
            <button type="submit" name="slide-pic" class="btn btn-primary">ارسال عکس</button>
        </form>
    </div>
</div>