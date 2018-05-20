
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
                   <hr>
                   <p style="font-size:18px;"> Film Salon &nbsp; &nbsp; &nbsp; &nbsp;:  <?php echo $sinemaSalonKoltukSayisi['salonAdi'] ?></p>
                   <p style="font-size:18px;"> Seans Saati &nbsp; &nbsp; &nbsp; &nbsp;:  <?php echo $filmBaslamaZamani ?> :00</p>
                   <?php  if($pnrindirimMiktari){?> 
                    <p style="font-size:18px;"> PNR İndirim Miktarı  &nbsp; &nbsp;:  <?php echo $pnrindirimMiktari ?> TL</p>
                   <?php } ?>
<hr>
                    <p style="font-size:18px;">Satın Aldığınız Koltuklar</p>
                   <?php  foreach($koltukNumarasi as $koltuk){?> 
                    
                        <p style="font-size:18px;">&nbsp; &nbsp;-> <?php echo $koltuk;?></p>
                    
                   <?php } ?>
                   


                </div>
<br>

    <div class="row">
    <div><label for="labelsalon">Ödeme Bilgilerini Giriniz</label>
    <br><br>
    <p class="odemeEkraniLabel">Ödenecek Toplam Tutar : <b><?php echo $toplamFiyat ?> TL </b></p>
        <form action="./?url=WebSiteHomePage/OdemeyiTamamla" method="Post">  
           <hr>
            <div class="col-md-6">
                
            <p class="odemeEkraniLabel">Adınızı Giriniz</p>
            <input type="text" required class="form-control">

            <p class="odemeEkraniLabel">Soyadınızı Giriniz</p>
            <input type="text" required class="form-control">

            <p class="odemeEkraniLabel">Kredi Kart Numaranızı Giriniz</p>
            <input type="number" required class="form-control">

            <p class="odemeEkraniLabel">Kredi Kartı Son Kullanma Tarihini Giriniz</p>
            <input type="text" required class="form-control">

            <p class="odemeEkraniLabel">CSV</p>
            <input type="number" required class="form-control">
            
            <input id="session" name="session" type="hidden" value='"<?php echo $_SESSION["mail"]; ?>"'>
            <input id="salonID" name="salonID" type="hidden" value="<?php echo $filmSalonID; ?>">
            <input id="filmBaslamaZamani" name="filmBaslamaZamani" type="hidden" value="<?php echo $filmBaslamaZamani; ?>">

            <?php foreach($koltukNumarasi as $value) { ?>
            <input name="koltukNumarasi[]" type="hidden" value="
            <?php echo $value; ?>">
            <?php } ?>
            
            <br>
            <input type="Submit" class="btn btn-primary btn-lg" value="Siparişi Tamamla">

            </div>

        </form>	
    </div>
 </div>	
</div>
            
</div>
</div>

<br>
<br>
<?php require VDIR.'/footer.php' ?>
