<script src="<?= URL ?>public/js/ckeditor/ckeditor.js"></script>
<div class="w3-container w3- w3-card-2" style="min-height: 400px;margin: 15px;padding: 50px;">
    <form method="POST" action="">
        <div>
            <label for="title">عنوان سایت</label>
            <input class="w3-input" type="text" value="<?=$data['title']?>" placeholder="title" id="title" name="title"/>
            <br>
            <label for="about">شعار سایت</label>
            <textarea class="w3-input" name="about" id="about"><?=$data['about']?></textarea>
            <br>
            <label for="description">توضیحات وبسایت</label>
            <input class="w3-input" type="text" value="<?=$data['description']?>" placeholder="description" id="description" name="description"/>
            <br>
            <label for="logo">آدرس لوگو</label>
            <input class="w3-input" type="text" value="<?=$data['logo']?>" placeholder="logo" id="logo" name="logo"/>
            <br>
            <label for="keywords">کلمات کلیدی</label>
            <input class="w3-input" type="text" value="<?=$data['keywords']?>" placeholder="keywords" id="keywords" name="keywords"/>
            <br>
            <label for="instagram">آیدی اینستاگرام</label>
            <input class="w3-input" type="text" value="<?=$data['instagram']?>" placeholder="instagram" id="instagram" name="instagram"/>
            <br>
            <label for="telegram">آیدی تلگرام</label>
            <input class="w3-input" type="text" value="<?=$data['telegram']?>" placeholder="telegram" id="telegram" name="telegram"/>
            <br>
            <label for="soroush">آیدی سروش</label>
            <input class="w3-input" type="text" value="<?=$data['soroush']?>" placeholder="soroush" id="soroush" name="soroush"/>
            <br>
            <input class="w3-input w3-hide" type="text" value="<?=$data['background']?>" placeholder="background" id="background" name="background"/>
            <br>
            <textarea class="w3-input w3-hide" type="text" placeholder="address" id="address" name="address"><?=$data['address']?></textarea>
            <br>
            <label for="phone">فوتر</label>
            <textarea class="w3-input type="text" placeholder="phone" id="footer" name="phone"><?=$data['phone']?></textarea>
            <br>
            <script>
                CKEDITOR.replace( 'footer' );
            </script>
        </div>
        <input style="margin: 5px;padding: 1px 15px 1px 15px" class="add_list_a w3-blue w3-btn w3-round" type="submit" name="submit" value="تغییر"/>
    </form>

</div>