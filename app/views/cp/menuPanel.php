<button class="w3-button w3-border w3-border-blue">add</button>
<table class="table table-striped table w3-hoverable" style="text-align: left;direction: rtl;">
    <thead>
    <tr>
        <th>شناسه</th>
        <th>منو</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data as $menu){?>
        <tr>
            <td><a style="display: block" href="<?=URL?>cp/menu/<?=$menu['mc']?>"><?=$menu['id']?></a></td>
            <td><a style="display: block" href="<?=URL?>cp/menu/<?=$menu['mc']?>"><?=$menu['name']?></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>