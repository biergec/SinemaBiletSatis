<?php require VDIR.'/header.php' ?>

<div class="container">
    <br>
		<h4 class="latest-text w3_latest_text">Merhaba, <?php echo $_SESSION["kullanici"]; ?></h4>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info" >
                <p style="font-size:18px;"> Satın Almış Olduğunuz Bilet Listesi :  
                    </p> 
            </div>

            <?php
                    foreach($biletler as $biletler){?>
            <div class="alert alert-warning" role="alert" style="font-size:20px">
                        <b>Film :</b> <?php echo $biletler['filmAd'];?>&nbsp;
                        <b>Salon :</b> <?php echo $biletler['salonAdi'];?>&nbsp;
                        <b>Başlangıç Saati :</b> <?php echo $biletler['baslama_zamani'];?>:00&nbsp;
                        <b>Film Süresi :</b> <?php echo $biletler['filmSuresi'];?>&nbsp;
                        <b>Film Fiyatı :</b> <?php echo $biletler['filmFiyat'];?>TL&nbsp;
                        <br>
                        <b>Satın Alinan Koltuklar :</b>&nbsp;
                        <?php 
                            $sorgu= "SELECT koltuk_numarasi FROM sinema_film_satin_alinan_biletler WHERE kullanici_id = ( SELECT kullanici_id FROM kullanici WHERE mail='".$_SESSION['mail']."' )
                             AND  filmBaslangicSaati = '".$biletler['baslama_zamani']."' AND salon_id ='".$biletler['salon_id']."'";
                            $db = Db::getInstance();
                            $koltuklar = $db->query($sorgu);
                            foreach($koltuklar as $koltuklar){
                                echo $koltuklar['koltuk_numarasi']; echo " - ";
                            }
                        ?>
                        </div>
                        <?php } ?>
                        &nbsp;
                        <form action="./?url=WebSiteHomePage/Profil" method="Post">
                        <a type="button" class="btn btn-primary btn-lg" href="./">Yeni Bilet Satın Al</a>
                                    <button type="Submit" name="Mail" value ="<?php echo $_SESSION['mail']; ?>" class="btn btn-primary btn-lg">Profil Sayfam</button>
                                    <br>
                                    <br>
                        </form> 
        </div>
    </div>
</div>

<br>
<br>
<?php require VDIR.'/footer.php' ?>
