

$('document').ready(function(){
            function getir(){
                $.ajax({
                    url:"chat.php",
                    type:"POST",
                    data:{"tip":"getir"},
                    dataType:"json",
                    success:function(adet){
                        if(adet.dolu){
                            $('#sIcerik').html(adet.dolu);
                        }else{
                            $('#sIcerik').html(adet.bos);
                        }
                    }
                });
            }
            setInterval(function(){getir()},1000);

            $('#mesajYaz').focus();
            $('body').keydown(function(e){
                var deger = $('#mesajYaz').val();
                if(e.which == "13"){
                    if(deger != ""){
                        $.ajax({
                            url:"chat.php",
                            type:"POST",
                            data:{"tip":"kaydet","mesaj":deger},
                            dataType:"json",
                            success:function(kayit){
                                $('#mesajYaz').val("");
                                if(kayit.onay){
                                }else{
                                    alert(kayit.hata);
                                }
                            }
                        });
                    }
                }
            });
            $('#gonder').click(function(){
                var deger = $('#mesajYaz').val();
                if(deger != ""){
                    $.ajax({
                        url:"chat.php",
                        type:"POST",
                        data:{"tip":"kaydet","mesaj":deger},
                        dataType:"json",
                        success:function(kayit){
                            $('#mesajYaz').val("");
                            if(kayit.onay){
                                $('#altAlan').ScrollTo();
                            }else{
                                alert(kayit.hata);
                            }
                        }
                    });
                }
            });
            $('#cikis').click(function(){
                window.location="cikis.php";
            });
        });

