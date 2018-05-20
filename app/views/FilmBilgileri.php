<?php require VDIR.'/header.php' ?>

<div class="container">
<div class="row">

<?php
    $db = Db::getInstance();
    $req = $db->query("SELECT * FROM filmler where film_id='".$filmb['film_id']."'");
    $name = $req->fetch(PDO::FETCH_ASSOC);
    ?>
		<br>
		<h4 class="latest-text w3_latest_text">Film Bilgileri</h4>
        <div  class="row">
                <div class="col-md-3">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                <button   type="Submit" style="background:white;border:1px"  class="hvr-shutter-out-horizontal" id="film"   name="film" value="<?php $filmb['film_id'];?>">
                                <?php 
								if($name['yol']!="Null"){?>
									<img src="<?php echo "images/".$name['yol']." "; ?>" title="album-name" class="img-responsive" alt=" "></button>
								<?php }else{?>
									<img src="images/h1.jpg" title="album-name" class="img-responsive" alt=" "></button>
								<?php }?>
                            </button>
									<div class="w3l-action-icon"><i aria-hidden="true"></i></div>
							 
								<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text">
								<button style="background:white;border:1px" value="<?php $filmb['film_id'] ?>"> <?php echo $filmb['filmAd'] ?></h6></button>						
								</div>
								<div class="mid-2 agile_mid_2_home">
										<p><center><?php echo $filmb['vizyonTarihi'] ?></center></p>
								</div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-9">
              <br>
                <div class="alert alert-info" >
                   <p style="font-size:18px;"> Film Adı &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;:  <?php  echo $name['filmAd'] ?></p>
                   <p style="font-size:18px;"> Vizyon Tarihi  &nbsp; &nbsp;:  <?php echo $name['vizyonTarihi'] ?></p>
                   <hr>
                   <p style="font-size:18px;"> Film Kategorisi  &nbsp; &nbsp;:  <?php echo $kategoriAD['kategoriAd'] ?></p>
                   <hr>
                   <p style="font-size:18px;"> Film Türü  &nbsp; &nbsp;:  <?php echo $filmTur['filmTurAd'] ?></p>
                   <p style="font-size:18px;"> Yönetmen  &nbsp; &nbsp;:  <?php echo $yonetmen['yonetmenAd'] ?></p>
                   <p style="font-size:18px;"> Oyuncular : <?php foreach($FilmOyuncular as $FilmOyuncular){
                       echo $FilmOyuncular['oyuncuAd'] ; echo ", ";
                   } ?></p>
                     <hr>
                   <p style="font-size:18px;"> Film Fiyatı &nbsp; &nbsp; &nbsp; &nbsp;:  <?php echo $name['filmFiyat'] ?> TL</p>
                   <p style="font-size:18px;"> Film Özeti &nbsp; &nbsp; &nbsp; &nbsp;:  <?php echo $name['filmOzet'] ?></p>
                </div>
<br>

<div class="row">
<form action="./?url=WebSiteHomePage/FilmSeansBiletAl" method="Post">  

            <label for="labelsalon">Film Seansları</label><br>
            <select class="custom-select" id="filmSeans" name="filmSeans" required>
            <?php foreach($slon as $slon) { 
                $req3 = $db->query("SELECT * FROM sinema_film_salonlari where salon_id='".$slon->salon_id."'");
                $name3 = $req3->fetch(PDO::FETCH_ASSOC);?>

                <option value=<?php echo $slon->sinema_film_salon_id; ?> > <?php echo "Salon : "; echo $name3['salonAdi']; echo "-  Seans Saati: ";  echo$slon->baslama_zamani; ?> </option>
                
                <?php } ?>
              </select>
                <?php if(isset($_SESSION["mail"]) && isset($_SESSION["kullanici"]))	{ ?>
                    <br>
                    <br>
                    <button  class="btn btn-warning btn-lg active" type="Submit">Seansa Bilet Satın Al</button>
                <?php }else{?>
                    <b>
                    <p style="color:red">Bilet Satın Alabilmek İçin Üye Girişi Yapmalısınız</p>
                    </b>
                <?php } ?>
			    
                </form>	

                </div>
            </div>	
</div>
            
</div>
</div>

<br>
<br>
<?php require VDIR.'/footer.php' ?>
