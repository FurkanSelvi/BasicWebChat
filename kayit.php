<?php require_once("dbConnect.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kayıt Ol</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <script src="daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>
<body class="register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="index.php"><b>Admin</b>PNL</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Zaten üyeyim.</p>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" id="issoy" class="form-control" placeholder="İsim Soyisim"/>
                <img src="" id="isimKo" style="margin-right: 25px; width: 20px; height: 20px; margin-top: 7px;" class="form-control-feedback" alt=""/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" id="kadi" class="form-control" placeholder="Kullanıcı Adınız"/>
                <img src="" id="kadiKo" style="margin-right: 25px; width: 20px; height: 20px; margin-top: 7px;" class="form-control-feedback" alt=""/>
                <span class="glyphicon glyphicon-plus form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" id="email" class="form-control" placeholder="Email"/>
                <img src="" id="emailKo" style="margin-right: 25px; width: 20px; height: 20px; margin-top: 7px;" class="form-control-feedback" alt=""/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" id="sifre" class="form-control" placeholder="Şifre"/>
                <img src="" id="sifreKo" style="margin-right: 25px; width: 20px; height: 20px; margin-top: 7px;" class="form-control-feedback" alt=""/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span style="" id='result'></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" id="sifre2" class="form-control" placeholder="Şifre Tekrar"/>
                <img src="" id="sifre2Ko" style="margin-right: 25px; width: 20px; height: 20px; margin-top: 7px;" class="form-control-feedback" alt=""/>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                    <input type="text" id="date" class="form-control" data-inputmask="'alias': 'gg/aa/yyyy'" data-mask placeholder="Doğum Tarihiniz"/>
                    <img src="" id="dateKo" style="margin-right: 25px; width: 20px; height: 20px; margin-top: 7px;" class="form-control-feedback" alt=""/>
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"><a href="#">Koşulları</a> kabul ediyorum.
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" id="uyeOl" class="btn btn-primary btn-block btn-flat">Üye Ol</button>
                </div><!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- YADA -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Facebook ile giriş yap</a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i>Google+ ile giriş yap</a>
        </div>

        <a href="login.php" class="text-center">Üyeliğim var.</a>
    </div><!-- /.form-box -->
</div><!-- /.register-box -->

<!-- jQuery 2.1.3 -->
<script src="jQuery/jQuery-2.1.3.min.js"></script>
<script src="jQuery/jquery.js"></script>
<script src="jQuery/passwordStrengthMeter.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

<!-- iCheck -->
<script src="iCheck/icheck.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $('document').ready(function(){
        function checkmail(mail){
            var filter = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
            return filter.test(mail);
        }
        $("#issoy").keyup(function(){
                if (this.value.match(/[^a-zA-Z]/g)){
                    this.value = this.value.replace(/[^a-zA-Z ]/g,'');
                }
            var isim=$('#issoy').val();
            var sayiB = isim.split(' ');
            var index = isim.indexOf(" ")+3;
            if(30<isim.length){
                $('#isimKo').attr('src', 'x.png');
            }else if(isim.length<6) {
                $('#isimKo').attr('src', 'x.png');
            }else if (sayiB.length==1 || isim.length<index){
                $('#isimKo').attr('src', 'x.png');
            }else{
                $('#isimKo').attr('src', 'tick.png');
            }
            if(isim == ""){
                $('#isimKo').attr('src', '');
            }
            });
        $("#email").keyup(function(){
          var mail = $('#email').val();
            if(checkmail(mail)){
                $('#emailKo').attr('src', 'tick.png');
            }else{
                $('#emailKo').attr('src', 'x.png');
            }
            if(mail == ""){
                $('#emailKo').attr('src', '');
            }
        });
        $("#date").keyup(function(){
            var date = $('#date').val();
            var re = /^[0-9/]*$/;
            var time = new Date().getFullYear();
            if (!re.test(date)||date == ""){
                $('#dateKo').attr('src', 'x.png');
            }else{
                var dateYY = date.substring(6,10);
                var yas = time - dateYY;
                if(yas>8)
                $('#dateKo').attr('src', 'tick.png');
            }
            if(date == ""){
                $('#dateKo').attr('src', '');
            }

        });
        $("#kadi").keyup(function(){
            var kadi = $('#kadi').val();
            if(3>kadi.length){
                $('#kadiKo').attr('src', 'x.png');
            }else if(16<kadi.length){
                $('#kadiKo').attr('src', 'x.png');
            }else{
                $('#kadiKo').attr('src', 'tick.png');
            }
            if(kadi == ""){
                $('#kadiKo').attr('src', '');
            }
        });
        var sifre;
        var sifre2 = "";
        $('#sifre').keyup(function(){
            sifre = $('#sifre').val();
            var deger = passwordStrength(sifre,$('#kadi').val());
            if(deger == "Kısa"){
                $('#result').attr('style', 'font-weight: bold;color:red').html(deger);
                $('#sifreKo').attr('src', 'x.png');
            }else if (deger == "Orta"){
                $('#result').attr('style', 'font-weight: bold;color:orange').html(deger);
                $('#sifreKo').attr('src', 'tick.png');
            }else if (deger == "İyi"){
                $('#result').attr('style', 'font-weight: bold;color:#439100').html(deger);
                $('#sifreKo').attr('src', 'tick.png');
            }else{
                $('#result').attr('style', 'font-weight: bold;color:darkgreen').html(deger);
                $('#sifreKo').attr('src', 'tick.png');
            }
            if(sifre2 != ""){
                if(sifre2==sifre){
                    $('#sifre2Ko').attr('src', 'tick.png');
                }else{
                    $('#sifre2Ko').attr('src', 'x.png');
                }
            }
            if(sifre == ""){
                $('#sifreKo').attr('src', '');
                $('#result').attr('style', '').html("");
            }

        });

        $("#sifre2").keyup(function(){
            sifre2 = $('#sifre2').val();
            if(sifre2==sifre){
                $('#sifre2Ko').attr('src', 'tick.png');
            }else{
                $('#sifre2Ko').attr('src', 'x.png');
            }
            if(sifre2 == ""){
                $('#sifre2Ko').attr('src', '');
            }
        });
    });
</script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
       $("#datemask").inputmask("gg/aa/yyyy", {"placeholder": "gg/aa/yyyy"});
        $("[data-mask]").inputmask();
    });
</script>
</body>
</html>
