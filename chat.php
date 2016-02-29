<?php
require_once("dbConnect.php");
$tip = $_POST["tip"];
$sonuc ["hata"]= "mesaj gönderilemedi";
if($tip=="kaydet"){
    $kadi = $_SESSION["kadi"];
    ($_SESSION["rutbe"] == "" || !isset($_SESSION["rutbe"])) ? $rutbe = 1 :$rutbe = $_SESSION["rutbe"];
    $saat=date("H:i");
    $tarih=date("d.m.Y");
    $resim = $_SESSION["resim"];
    $mesaj = $_POST["mesaj"];
    $dosya = fopen("chat.txt","a+");
    $yazi = $saat."\t".$tarih."\t".$kadi."\t".$rutbe."\t".$mesaj."\t".$resim."\n";
    $write = fwrite($dosya,$yazi);
    if($write){
         $sonuc["onay"]= "mesaj gönderildi";
    }else{
        $sonuc ["hata"]= "mesaj gönderilemediiiiii";
    }
    }elseif($tip=="getir"){
    $dosyass = file("chat.txt");
    $veriler ="";
    foreach($dosyass as $icerik){
        $ayir = explode("\t",$icerik);
        $isim= $ayir[2];
        $mesaj = $ayir[4];
        $rt = $ayir[3];
        $saat = $ayir[0];
        $tarih = $ayir[1];
        $resim = $ayir[5];
        $tasa = $tarih." ".$saat;
        if($rt == 1){
            if($_SESSION["kadi"] == $isim) {
                $icerikler = "<div class='direct-chat-msg right'>
                        <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-right' style='color: darkblue'>$isim</span>
                            <span class='direct-chat-timestamp pull-left'>$tasa</span>
                        </div>
                        <img class='direct-chat-img' src='$resim' alt='message user image' />
                        <div class='direct-chat-text'>
                            $mesaj
                        </div>
                    </div>" ;
            }else{
                $icerikler =
                "<div class='direct-chat-msg'>
                        <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-left' style='color: darkblue'>$isim</span>
                            <span class='direct-chat-timestamp pull-right'>$tasa</span>
                        </div>
                        <img class='direct-chat-img' src='$resim' alt='message user image' />
                        <div class='direct-chat-text'>
                            $mesaj
                        </div>
                    </div>";
            }
        }
        if($rt == 2){
            if($_SESSION["kadi"] == $isim) {
                $icerikler = "<div class='direct-chat-msg right'>
                        <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-right' style='color: lightgreen; background-color: darkblue'>$isim</span>
                            <span class='direct-chat-timestamp pull-left'>$tasa</span>
                        </div>
                        <img class='direct-chat-img' src='$resim' alt='message user image' />
                        <div class='direct-chat-text'>
                            $mesaj
                        </div>
                    </div>" ;
            }else{
                $icerikler =
                    "<div class='direct-chat-msg'>
                        <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-left' style='color: lightgreen; background-color: darkblue'>$isim</span>
                            <span class='direct-chat-timestamp pull-right'>$tasa</span>
                        </div>
                        <img class='direct-chat-img' src='$resim' alt='message user image' />
                        <div class='direct-chat-text'>
                            $mesaj
                        </div>
                    </div>";
            }
        }
        if($rt == 3){
            if($_SESSION["kadi"] == $isim) {
                $icerikler = "<div class='direct-chat-msg right'>
                        <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-right' style='color: yellowgreen; background-color: darkred'>$isim</span>
                            <span class='direct-chat-timestamp pull-left'>$tasa</span>
                        </div>
                        <img class='direct-chat-img' src='$resim' alt='message user image' />
                        <div class='direct-chat-text'>
                            $mesaj
                        </div>
                    </div>" ;
            }else{
                $icerikler =
                    "<div class='direct-chat-msg'>
                        <div class='direct-chat-info clearfix'>
                            <span class='direct-chat-name pull-left' style='color: yellowgreen; background-color: darkred'>$isim</span>
                            <span class='direct-chat-timestamp pull-right'>$tasa</span>
                        </div>
                        <img class='direct-chat-img' src='$resim' alt='message user image' />
                        <div class='direct-chat-text'>
                            $mesaj
                        </div>
                    </div>";
            }
        }
        $veriler = $veriler."<br/>".$icerikler."<br/>";
        if(empty($veriler) || !$dosyass){
            $sonuc["bos"] = "<p class=\"message\">
                       <center><span style=\"color: red; font-size: large\">MESAJ YOK</span></center>
            </p>";
        }else{
            $sonuc["dolu"]=$veriler;
        }
    }
}
echo json_encode($sonuc);
?>
