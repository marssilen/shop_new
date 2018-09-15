<div class="w3-center w3-margin">
<form class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
        <label for="inputPassword2" class="sr-only">کدپیگیری</label>
        <input class="form-control" id="searchTXT" placeholder="کد پیگیری">
    </div>
    <button type="submit" class="btn btn-primary mb-2">جستجو</button>
</form>
</div>
<div class="w3-white container center" >
<div class="w3-row">
<div class="w3-card-2"><!--left images-->
<div class="w3-responsive">
<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable">
<thead>
<tr class="w3-light-grey">
    <th>فاکتور</th>
    <th>کاربر</th>
    <th>وضعیت</th>
    <th>مشاهده</th>
    <th>حذف</th>
  </tr>
</thead>
<?php
foreach($data['data'] as $item){
	?>
<tr>
  <td><?= $item['id'] ?></td>
  <td><?= $item['user_id'] ?></td>
  <td>
  <?=$GLOBALS['sta_array'][$item['status']]?>
  </td>
<!--  <td>--><?//= $item['factor_id'] ?><!--</td>-->
  <td><a href="<?= URL.'cp/edit_order/'.$item['id'] ?>">مشاهده<a></td>
  <td><a href="<?= URL.'cp/deleteOrder/'.$item['id'] ?>">حذف<a></td>
</tr>
</tr>
<?php
}
?>
</table>
</div>
<div class="w3-center"><?=$data['pview']?></div>
</div>
</div>
</div>
