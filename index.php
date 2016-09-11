<?php require_once("dbConnect.php");
session_start();
if($_SESSION["login"]==1){

}elseif($_SESSION['FBID'] || $_SESSION['FBID'] != NULL){
    $resim = "https://graph.facebook.com/".$_SESSION['FBID']."/picture";
    $issoy = $_SESSION['FULLNAME'];
    ($_SESSION['EMAIL']=="") ? $email = NULL:$email = $_SESSION['EMAIL'];
    $kadi = str_replace(" ","",$issoy);
    $_SESSION["kadi"] = $kadi;
    $_SESSION["resim"] = $resim;
    $sql=$db->prepare("SELECT * FROM kullanicilar WHERE kadi= ?");
    $sql->execute(array($kadi));
    if($sql->rowCount() == '0'){
        $query = $db->prepare("INSERT INTO kullanicilar SET
            kadi  = ?,
            email = ?,
            adsoy = ?,
            resim = ?");
        $insert = $query->execute(array($kadi,$email,$issoy,$resim));
    }else{
        $sqlo = $sql->fetch(PDO::FETCH_ASSOC);
        $_SESSION['rutbe'] = $sqlo["rutbe"];
        $_SESSION["login"]= 1;
    }
}
else{
    header("location:login.php");
}
?>
<!DOCTYPE html>
    <html>
   <head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
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
    <title>Sohbet</title>
    <script src="jQuery/jQuery-2.1.3.min.js"></script>
    <script src="chatSettings.js"></script>
    <style type="text/css">
        body{
            background: aqua;
        }
        #sohbetIcerik{
            background: white;

            width: 500px;
            margin: 0 auto;
            min-height: 200px;
            max-height: 400px;
            overflow: scroll;
        }
    </style>
</head>
    <body>
    <div class="col-md-6">
        <!-- DIRECT CHAT -->
        <div class="box box-warning direct-chat direct-chat-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Direct Chat</h3>
                <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="3 New Messages" class='badge bg-yellow'>3</span>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="direct-chat-messages" id="sIcerik">
                </div><!--/.direct-chat-messages-->
                <div id="altAlan"></div>
                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                    <ul class='contacts-list'>
                        <li>
                            <a href='#'>
                                <img class='contacts-list-img' src='dist/img/user1-128x128.jpg'/>
                                <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Count Dracula
                                  <small class='contacts-list-date pull-right'>2/28/2015</small>
                                </span>
                                    <span class='contacts-list-msg'>How have you been? I was...</span>
                                </div><!-- /.contacts-list-info -->
                            </a>
                        </li><!-- End Contact Item -->
                        <li>
                            <a href='#'>
                                <img class='contacts-list-img' src='dist/img/user7-128x128.jpg'/>
                                <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Sarah Doe
                                  <small class='contacts-list-date pull-right'>2/23/2015</small>
                                </span>
                                    <span class='contacts-list-msg'>I will be waiting for...</span>
                                </div><!-- /.contacts-list-info -->
                            </a>
                        </li><!-- End Contact Item -->
                        <li>
                            <a href='#'>
                                <img class='contacts-list-img' src='dist/img/user3-128x128.jpg'/>
                                <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Nadia Jolie
                                  <small class='contacts-list-date pull-right'>2/20/2015</small>
                                </span>
                                    <span class='contacts-list-msg'>I'll call you back at...</span>
                                </div><!-- /.contacts-list-info -->
                            </a>
                        </li><!-- End Contact Item -->
                        <li>
                            <a href='#'>
                                <img class='contacts-list-img' src='dist/img/user5-128x128.jpg'/>
                                <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Nora S. Vans
                                  <small class='contacts-list-date pull-right'>2/10/2015</small>
                                </span>
                                    <span class='contacts-list-msg'>Where is your new...</span>
                                </div><!-- /.contacts-list-info -->
                            </a>
                        </li><!-- End Contact Item -->
                        <li>
                            <a href='#'>
                                <img class='contacts-list-img' src='dist/img/user6-128x128.jpg'/>
                                <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  John K.
                                  <small class='contacts-list-date pull-right'>1/27/2015</small>
                                </span>
                                    <span class='contacts-list-msg'>Can I take a look at...</span>
                                </div><!-- /.contacts-list-info -->
                            </a>
                        </li><!-- End Contact Item -->
                        <li>
                            <a href='#'>
                                <img class='contacts-list-img' src='dist/img/user8-128x128.jpg'/>
                                <div class='contacts-list-info'>
                                <span class='contacts-list-name'>
                                  Kenneth M.
                                  <small class='contacts-list-date pull-right'>1/4/2015</small>
                                </span>
                                    <span class='contacts-list-msg'>Never mind I found...</span>
                                </div><!-- /.contacts-list-info -->
                            </a>
                        </li><!-- End Contact Item -->
                    </ul><!-- /.contatcts-list -->
                </div><!-- /.direct-chat-pane -->
            </div><!-- /.box-body -->
            <div class="box-footer">
                <form action="#" method="post">
                    <div class="input-group">
                        <input type="text" name="message" id="mesajYaz" placeholder="Mesaj Yazın ..." class="form-control"/>
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-warning btn-flat" id="gonder">Send</button>
                          </span>
                    </div>
                </form>
            </div><!-- /.box-footer-->
        </div>
        <div style="margin-right: 100px;"><button id="cikis">Çıkış</button></div>
        <!--/.direct-chat -->
    </div><!-- /.col -->
    </body>

</html>
<!-- jQuery 2.1.3 -->
<script src="jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="dist/js/app.min.js" type="text/javascript"></script>
<script src="jQuery/jquery.scrollTo-1.4.1/jquery.scrollTo.js" type="text/javascript"></script>
