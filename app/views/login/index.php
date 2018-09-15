<?php
require_once('app/views/head.php'); ?>
<body>
<div id="wrapper">
    <?php require_once('app/views/menu.php'); ?>
    <div id="content">
        <div class="w3-padding">
            <div class="w3-content w3-row w3-container w3-padding-16 w3-round w3-card-2">
                <div class="w3-col s12 l6 w3-padding">

                    <form action="<?=URL?>login/run/" method="post">
                        <input class="w3-input w3-round w3-border w3-border-blue w3-margin-2" style="padding: 5px" type="text" name="username" placeholder="Username"/><br>
                        <input class="w3-input w3-round w3-border w3-border-blue w3-margin-2" style="padding: 5px" type="password" name="password" placeholder="Password"/><br>
                        <button class="w3-input w3-blue w3-round w3-border w3-border-blue w3-margin-2" style="padding: 5px" type="submit" name="submit" value="submit">Login</button>
                    </form>
                </div>
                <div class="w3-col l6 w3-hide-small w3-hide-medium  w3-padding ">
                    <img class="w3-border w3-round" style="width:100%;" src="<?= URL ?>public/logo.jpg"/>
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



