<?php require VDIR.'/header.php' ?>

<div class="container">
<div class="row">
    
<!-- banner-bottom -->
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
                   <p style="font-size:18px;"> Film Fiyatı &nbsp; &nbsp; &nbsp; &nbsp;:  <?php echo $name['filmFiyat'] ?> TL</p>
                   <p style="font-size:18px;"> Film Özeti &nbsp; &nbsp; &nbsp; &nbsp;:  <?php echo $name['filmOzet'] ?></p>
                </div>
<br>

</div>
</div>
</div>
</div>

<br>
<br>
<?php require VDIR.'/footer.php' ?>
