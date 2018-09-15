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
<div class="container w3-row w3-card-2">
    <div class="w3-col s12" style="position: relative">
        <div class="w3-margin w3-round-medium w3-light-grey w3-container">
        <h3 class="w3-round w3-light-grey w3-center" style="padding: 5px"><?php if (!empty($data['data']['name'])){?><?= $data['data']['name']?><?php } ?></h3>
        </div>
        <div class="w3-margin-32 w3-container w3-padding-16 w3-row" id="columnTwo">
            <div class="w3-col s12">
                <?= $data['data']['long_description'] ?>
            </div>
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
