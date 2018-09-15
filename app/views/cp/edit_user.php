<div class="w3-container w3- w3-card-2" style="min-height: 400px;margin: 15px;padding: 50px;">
  <form class="form-horizontal" role="form" method="post" action="" dir="rtl" style="direction: rtl" align="right">
  <div class="form-group" dir="rtl" style="direction: rtl" align="right">
      <label class="control-label col-sm-2" >نام کاربری</label>
      <div class="col-sm-10">
        <p class="form-control-static"><?= (isset($data['username']))?$data['username']:'' ?></p>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">ایمیل</label>
      <div class="col-sm-10">
        <input name="email" type="email" class="form-control" placeholder="Enter email" value="<?= (isset($data['email']))?$data['email']:'' ?>">
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" >تلفن</label>
      <div class="col-sm-10">
        <input name="tel" type="tel" class="form-control" id="pwd" placeholder="" value="<?= (isset($data['phone']))?$data['phone']:'' ?>">
      </div>
    </div>
      <div class="form-group">
          <label class="control-label col-sm-2" >درصد تخفیف</label>
          <div class="col-sm-10">
              <input name="barperc" type="number" class="form-control" id="barperc" placeholder="درصد تخفیف کاربر" value="<?= (isset($data['barperc']))?$data['barperc']:'' ?>">
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-2">سطح دسترسی</label>
          <?php
          $level=json_decode($data['level']);
          function printCheck($var,$level=array()){
              foreach ($level as $l){
                  if($l==$var)
                  return 'checked';
              }
          }
          ?>
          <div class="col-sm-10" style="padding-right: 40px">
              <label class="checkbox"><input type="checkbox" name="level[]" value="1" <?=printCheck(1,$level)?>>صفحه ی اصلی</label>
              <label class="checkbox"><input type="checkbox" name="level[]" value="2" <?=printCheck(2,$level)?>>محصولات</label>
              <label class="checkbox"><input type="checkbox" name="level[]" value="3" <?=printCheck(3,$level)?>>دسته بندی ها</label>
              <label class="checkbox"><input type="checkbox" name="level[]" value="4" <?=printCheck(4,$level)?>>فایل ها</label>
              <label class="checkbox"><input type="checkbox" name="level[]" value="5" <?=printCheck(5,$level)?>>منوها</label>
              <label class="checkbox"><input type="checkbox" name="level[]" value="6" <?=printCheck(6,$level)?>>سفارشات</label>
              <label class="checkbox"><input type="checkbox" name="level[]" value="7" <?=printCheck(7,$level)?>>تنظیمات</label>
              <label class="checkbox"><input type="checkbox" name="level[]" value="8" <?=printCheck(8,$level)?>>انبارداری</label>
              <label class="checkbox"><input type="checkbox" name="level[]" value="9" <?=printCheck(9,$level)?>>لیست کاربران</label>
          </div>
      </div>
     <div class="form-group">
      <label class="control-label col-sm-2" >نقش کاربری</label>
      <div class="col-sm-10">
      <select name="role" class="form-control" id="role">
          <option <?=(isset($data['role']) and $data['role']=='admin')?'selected':'' ?> value="admin">ادمین</option>
          <option <?=(isset($data['role']) and $data['role']=='user')?'selected':'' ?> value="user" >کاربر</option>
      </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">بلوکه</label>
      <div class="col-sm-10">
      <select name="block" class="form-control" id="sel1">
        <option <?=(isset($data['block']) and $data['block']=='1')?'selected':'' ?> value="1" >بلاک</option>
        <option <?=(isset($data['block']) and $data['block']=='0')?'selected':'' ?> value="0" >فعال</option>
      </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button name="sub" value="submit" type="submit" class="btn btn-default">تغییر</button>
      </div>
    </div>
  </form>
    <form class="form-horizontal" role="form" method="post" action="">
        <div class="form-group">
            <label class="control-label col-sm-2" for="password">رمز جدید</label>
            <div class="col-sm-10">
                <input type="password" style="display:none;">
                <input required id="password" name="password" type="password" class="form-control" placeholder="رمز جدید را وارد نمایید" value="" autocomplete="off">
            </div>
        </div>
        <button name="reset_pass" value="reset_pass" type="submit" class="btn btn-default">تغییر رمز</button>
    </form>
</div>