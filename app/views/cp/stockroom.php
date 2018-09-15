<div class="w3-white container center" >
    <div class="w3-row">
        <div class="" align="center"><!--left images-->
            <a href="<?=URL?>cp/stockroom/1" class="btn btn-info w3-margin-16">کالا های غیر موجود</a>
            <a href="<?=URL?>cp/stockroom/0" class="btn btn-info w3-margin-16">همه ی کالاها</a>
            <div ng-app="myApp" ng-controller="myCtrl">
                <div class="row w3-margin-top">
                    <table class="w3-table w3-bordered" dir="ltr">
                        <tr>
                            <th>id</th>
                            <th>نام</th>
                            <th> تعداد و قیمت</th>
                        </tr>
                        <tr id='{{x}}'  ng-repeat="x in names">
                            <td>{{x.id}}</td>
                            <td>{{x.name}}</td>
                            <td><form action="" method="post"><input type="hidden" name="id" value="{{x.id}}"/><input class="w3-margin-right" name="price"  value="{{x.price}}"/><input class="w3-margin-right" type="number" name="num"  value="{{x.number}}"/><input type="submit" class="btn btn-info" value="تغییر" name="changenum"></form></td>
                        </tr>
                    </table>
                </div>
            </div>
            <script>
                var app = angular.module('myApp', []);
                app.controller('myCtrl', function($scope) {
                    $scope.names = <?php echo json_encode($data['data']); ?>;
                });
            </script>
            <div align="center">
                <?= $data['pview'] ?>
            </div>
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
            <p>آپلود</p>
        </div>
        <div class="w3-container" style="padding: 50px">
            <form method="post" enctype="multipart/form-data" action="">
                <input class="w3-input" placeholder="توضیح" name="alt">
                <input name="image" type="file" id="image_upload" style="margin-top: 10px;margin-bottom: 10px" >
                <button type="submit" name="add_card_image" class="btn btn-primary">ارسال</button>
            </form>
        </div>
    </div>
</div>