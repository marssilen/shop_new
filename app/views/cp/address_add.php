<div class="w3-white container center" >
<div class="w3-row">
<div class="w3-card-2 w3-round-large"><!--left images-->
<div class="w3-responsive">
    <script type="text/javascript">
       $(document).ready(function(){

       send_change("#province");
       $("#province").on("change",not);
       function not(){
           send_change("#city",false,this.value);
       }
       function send_change(sel,pro=true,name=""){
           var send_url='<?= URL ?>ajax/province';
           if(!pro){
              send_url='<?= URL ?>ajax/city/'+name;
            }
            $.ajax({
            url:send_url,
            type:'GET',
            dataType: 'json',
            success: function( json ) {
                $(sel).empty();
                $.each(json, function(i, value) {
                    $(sel).append($('<option>').text(i+' '+value).attr('value', i));
                });
            }
            });
       }
    });
    </script>
    <style>
        .padding-16{
            padding: 16px;
        }
        .w3-input{
            margin-top: 16px;
            text-align: right;
            resize: none;
        }
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button
        {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=number]{
            -moz-appearance: textfield;
        }
        .my_label{
            alignment-adjust:middle;
            float: right;
            margin-right:2px;
            font-weight: normal;
        }
        .right{
            float: right;
        }
        .margin-l{
            margin: 5px;
        }
        .margin-m{
            margin: 10px;
        }
        .w3-btn{
            text-align: center;
            text-decoration: none;
        }
        select{
            text-align: right;
        }
        form{
            background-color: white;
        }
    </style>
    <div class="" id="add_address_modal">
    <form class="padding-16" action="" method="POST">
        <label class="my_label">نام و نام خانوادگی تحویل گیرنده</label>
        <input required name="name" id="name" class="w3-input w3-round w3-border w3-border-blue" type="text">
        <label class="my_label">تلفن همراه</label>
        <input required name="c-phone" class="w3-input w3-round w3-border w3-border-blue" type="tel">
        <label class="my_label">تلفن ثابت</label>
        <input required name="s-phone" class="w3-input w3-round w3-border w3-border-blue" type="tel">
        <div class="margin-m w3-row">
            <label for="province">استان:</label>
            <select required name="province" class="w3-round w3-border w3-border-blue" id="province">
                <?php foreach ($GLOBALS['provinces'] as $province){?><option><?=$province?></option><?php } ?>
            </select>
<!--            <select required name="city" class="margin-l right w3-round w3-border w3-border-blue" id="city"><option>انتخاب کنید</option></select>-->
        </div>
        <label class="my_label">آدرس پستی</label>
        <textarea required name="address" class="w3-input w3-round w3-border w3-border-blue"></textarea>
        <label class="my_label">کد پستی</label>
        <input required name="postal-code" class="w3-input w3-round w3-border w3-border-blue" type="number">
        <div class="margin-m">
            <input name="submit" class="w3-btn w3-round w3-blue " type="submit" value="ثبت اطلاعات و بازگشت">
        <a style="text-decoration: none" class="w3-btn w3-red w3-round" href="<?=LINK?>" onclick="hidaddmodal()">انصراف</a>
        </div>
    </form>
        <script>
            function showaddmoadal() {
                document.getElementById("add_address_modal").style.display="block";
            }
            function hidaddmodal() {
                document.getElementById("add_address_modal").style.display="none";
            }
        </script>
    </div>
</div>

</div>
</div>
</div>
