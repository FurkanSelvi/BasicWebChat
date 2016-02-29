<?php
require_once("dbConnect.php");
if($_SESSION["login"]== 1){
    header("location:index.php");
}
if($_POST){
    $kadi = $_POST["kadi"];
    $kadi = strip_tags(trim($kadi));
    $ksifre = $_POST["ksifre"];
    $ksifre = strip_tags(trim($ksifre));
    $sql=$db->prepare("SELECT * FROM kullanicilar WHERE kadi= ? AND ksifre = ?");
    $sql->execute(array($kadi,$ksifre));
    if($sql->rowCount() == "1"){
       $sqlo = $sql->fetch(PDO::FETCH_ASSOC);
        $_SESSION["kadi"] = $sqlo["kadi"];
        $_SESSION["ksifre"] = $sqlo["ksifre"];
        $_SESSION["rutbe"] = $sqlo["rutbe"];
        $_SESSION["id"] = $sqlo["id"];
        $_SESSION["resim"] = $sqlo["resim"];
        $_SESSION["login"]=1;
        header('Refresh: 1; url=index.php');
    }else{
     echo 'Başarısız';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        $('document').ready(function(){
            $('#btnGiris').click(function(){
                $('#girisYap').submit();
            });
        });
    </script>
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="index.php"><b>Admin</b>PNL</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Oturumu başlatmak için giriş yap</p>
        <form action="" method="post" id="girisYap">
            <div class="form-group has-feedback">
                <input name="kadi" class="form-control" placeholder="Email yada Kullanıcı Adı"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="ksifre" type="password" class="form-control" placeholder="Şifre"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Beni Hatırla
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" id="btnGiris" class="btn btn-primary btn-block btn-flat">Giriş</button>
                </div><!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="Face/fbconfig.php" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->

        <a href="#">Şifremi Unuttum.</a><br>
        <a href="kayit.php" class="text-center">Üye ol.</a>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.3 -->
<script src="jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="iCheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>