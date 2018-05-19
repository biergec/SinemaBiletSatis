


<?php require VDIR.'/header.php' ?>

<?php 
					if(!isset($_SESSION["mail"]) && !isset($_SESSION["kullanici"]))
					{
                        header("Location: ./"); 
					}
					?>

<div class="container">
<div class="row">
    
<!-- banner-bottom -->
		<br>
		<h4 class="latest-text w3_latest_text">Film Bilgileri</h4>
        <div  class="row">
                <div class="col-md-3">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
								<button   type="Submit" style="background:white;border:1px"  class="hvr-shutter-out-horizontal" id="film"   name="film" value="<?php $filmBilgileri['film_id'];?>"><img src="images/c1.jpg" title="album-name" class="img-responsive" alt=" "></button>
									<div class="w3l-action-icon"><i aria-hidden="true"></i></div>
							 
								<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
											
								</div>
								<div class="mid-2 agile_mid_2_home">
								</div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-9">
              <br>
                <div class="alert alert-info" >
                   <p style="font-size:18px;"> Film Adı &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;:  <?php  echo $filmBilgileri['filmAd'] ?></p>
                   <p style="font-size:18px;"> Vizyon Tarihi  &nbsp; &nbsp;:  <?php echo $filmBilgileri['vizyonTarihi'] ?></p>
                   <p style="font-size:18px;"> Film Fiyatı &nbsp; &nbsp; &nbsp; &nbsp;:  <?php echo $filmBilgileri['filmFiyat'] ?> TL</p>
                   <p style="font-size:18px;"> Film Özeti &nbsp; &nbsp; &nbsp; &nbsp;:  <?php echo $filmBilgileri['filmOzet'] ?></p>
                   <p style="font-size:18px;"> Film Salon &nbsp; &nbsp; &nbsp; &nbsp;:  <?php echo $sinemaSalonKoltukSayisi['salonAdi'] ?></p>
                   <p style="font-size:18px;"> Seans Saati &nbsp; &nbsp; &nbsp; &nbsp;:  <?php echo $sinema_film_salonBilgileri['baslama_zamani'] ?>:00</p>

                </div>
<br>

    <div class="row">
    <div><label for="labelsalon">Koltuk Seciniz</label>
        <form action="./?url=WebSiteHomePage/OdemeEkrani" method="Post">  
            <br><hr>
            <fieldset>
                <center>
                <?php 

for($i=1;$i<$sinemaSalonKoltukSayisi['koltukSayisi'];$i++) { 
    $xc=satilanBiletler::get($i,$sinema_film_salonBilgileri);
    if($i==$xc['koltuk_numarasi']){?>

     <input class="checkboxes" type="checkbox" disabled ><?php echo $i; ?> 

    <?php }else{ ?>

        <input class="checkboxes" type="checkbox" name="koltukNumarasi[]" value="<?php echo $i ?>"></input>
        <?php echo $i; ?> 

   <?php } ?>
    &nbsp;
    <?php  if($i%10 ==0){ ?>
        <hr>
    <?php  } ?>
    <?php  } ?>
                </center>
            
            </fieldset>

<br>
                <hr>
<br>
PNR Kodunuzu Giriniz <input type="text" name="PNR" id="PNR" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
<br>
<center>
<input id="filmAd" name="filmAd" type="hidden" value="<?php  echo $filmBilgileri['filmAd'] ?>">
<input id="filmID" name="filmID" type="hidden" value="<?php  echo $filmBilgileri['film_id'] ?>">
<input id="salonID" name="salonID" type="hidden" value="<?php  echo $sinema_film_salonBilgileri['salon_id'] ?>">
<input id="filmBaslamaZamani" name="filmBaslamaZamani" type="hidden" value="<?php echo $sinema_film_salonBilgileri['baslama_zamani'] ?>">

<input type="Submit" class="btn btn-primary btn-lg" value="Ödeme İşlemine Geç">
</center>
                
        </form>	
    </div>
 </div>	
</div>
            
</div>
</div>

<br>
<br>
<?php require VDIR.'/footer.php' ?>


