<?php require VDIR.'/header.php' ?>

<!-- banner -->
    <script src="js/jquery.slidey.js"></script>
    <script src="js/jquery.dotdotdot.min.js"></script>
	   <script type="text/javascript">
			$("#slidey").slidey({
				interval: 8000,
				listCount: 5,
				autoplay: false,
				showList: true
			});
			$(".slidey-list-description").dotdotdot();
		</script>
<!-- //banner -->
<!-- banner-bottom -->
    <?php
    $db = Db::getInstance();
    $req = $db->query("SELECT * FROM filmler where film_id='".$filmb['film_id']."'");
    $name = $req->fetch(PDO::FETCH_ASSOC);
   /* $req2 = $db->query("SELECT * FROM sinema_film_salon where film_id='".$filmb['film_id']."'");
    $name2 = $req2->fetch(PDO::FETCH_ASSOC);*/
    ?>
		<br>
		<h4 class="latest-text w3_latest_text">Film Bilgileri</h4>
        <div  class="row">
                <div class="col-md-3">
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
								<button   type="Submit" style="background:white;border:1px"  class="hvr-shutter-out-horizontal" id="film"   name="film" value="<?php $filmb['film_id'];?>"><img src="images/c1.jpg" title="album-name" class="img-responsive" alt=" "></button>
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
                <div class="alert alert-info">
                   <p> Film Adı &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;:  <?php  echo $name['filmAd'] ?></p>
                   <p> Film Özeti &nbsp; &nbsp; &nbsp; &nbsp;:  <?php echo $name['filmOzet'] ?></p>
                   <p> Vizyon Tarihi  &nbsp; &nbsp;:  <?php echo $name['vizyonTarihi'] ?></p>
                   <p> Film Fiyatı &nbsp; &nbsp; &nbsp; &nbsp;:  <?php echo $name['filmFiyat'] ?></p>
                </div>

<br>

                <form action="./?url=WebSiteHomePage/FilmBilgileri" method="Post">  

            <label for="labelsalon">Film Seansları</label><br>


            <select class="custom-select" id="filmSeans" name="filmSeans">
            <option name="filmTurleriID" selected>Seans Seciniz</option>
            <?php foreach($slon as $slon) { 
                $req3 = $db->query("SELECT * FROM sinema_film_salonlari where salon_id='".$slon->salon_id."'");
                $name3 = $req3->fetch(PDO::FETCH_ASSOC);?>
                <option value=<?php echo $slon->salon_id; ?> > <?php echo $name3['salonAdi']; echo " Seans: ";echo$slon->baslama_zamani; ?> </option>
                <?php } ?>
              </select>

			    <button  class="btn btn-info" type="Submit" >Satın Al</button>
                </form>	

                </div>
            </div>	


<br>
<br>
<br>
<?php require VDIR.'/footer.php' ?>
