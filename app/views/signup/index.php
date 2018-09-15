<?php
require_once('app/views/head.php'); ?>
<body>
<div id="wrapper">
<?php require_once('app/views/menu.php'); ?>
    <div id="content">
        <div style="max-width:1000px;margin: auto;padding: 16px" class="w3-card-2 w3-container w3-round">
            <form method="post">
                <input class="w3-input" name="uname" placeholder="نام کاربری" required>
                <input class="w3-input" name="phone" placeholder="تلفن" type="tel" required>
                <input class="w3-input" name="pass1" placeholder="رمز" type="password" required>
                <input class="w3-input" name="pass2" placeholder="تایید رمز" type="password" required><br>
                <button class="w3-input w3-hover-blue-gray" type="submit" name="submit" style="border-bottom:0px">ثبت نام</button>
            </form>
        </div>
    </div>
<?php
require_once ('app/views/footer.php');
?>
</div>
</body>
</html>
