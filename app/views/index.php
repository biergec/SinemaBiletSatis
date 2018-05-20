<?php require VDIR.'/header.php' ?>

<!-- banner -->
	<div id="slidey" style="display:none;">
		<ul>
			<li><img src="images/5.jpg" alt=" "><p class='title'>Tarzan</p><p class='description'>Örnek tanıtım metni</p></li>
			<li><img src="images/2.jpg" alt=" "><p class='title'>Maximum Ride</p><p class='description'>Örnek tanıtım metni</p></li>
			<li><img src="images/3.jpg" alt=" "><p class='title'>Independence</p><p class='description'>Örnek tanıtım metni</p></li>
			<li><img src="images/2.jpg" alt=" "><p class='title'>Maximum Ride</p><p class='description'>Örnek tanıtım metni</p></li>
			<li><img src="images/5.jpg" alt=" "><p class='title'>Tarzan</p><p class='description'>Örnek tanıtım metni</p></li>
		</ul>   	
    </div>
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

	?>
		<br>
		<h4 class="latest-text w3_latest_text">Yakında Çıkacak Filmler</h4>
		<div class="container">
			<div class="w3_agile_banner_bottom_grid">
				<div id="owl-demo" class="owl-carousel owl-theme">
				<?php
					 
					 foreach($yakindakifilmler  as $film) { 
						$sorgu = "SELECT * FROM filmler WHERE film_id = '".$film->film_id."'";
						$req = $db->query($sorgu);
						$name = $req->fetch(PDO::FETCH_ASSOC);?>
						<div class="w3l-movie-gride-agile w3l-movie-gride-agile1" style="width:300px; heigth:200px;">
							<form action="./?url=WebSiteHomePage/FilmBilgileri" method="Post">
								<button   type="Submit" style="background:white;border:1px"  class="hvr-shutter-out-horizontal" id="film"   name="film" value="<?php echo $name['film_id'];?>" class="btn btn-primary"><img src="images/1.jpg" title="album-name"  style="width:400px; heigth:300px;" alt=" "></button>
									<div class="w3l-action-icon"><i aria-hidden="true"></i></div>
							 
								<div class="mid-1 agileits_w3layouts_mid_1_home">
								<div class="w3l-movie-text"style="width:400px; heigth:300px;">
								<button style="background:white;border:1px" id="film" name="film" value="<?php echo $name['film_id'] ?>"> <?php echo $name['filmAd'] ?></h6></button>						
								</div>
								<div class="mid-2 agile_mid_2_home"style="width:400px; heigth:300px;">
										<p><center><?php echo $name['vizyonTarihi'] ?></center></p>
								</div>
							</div>
							</form>
						</div>
						<?php } ?>
				</div>
			</div>			
		</div>

	<div class="general">
		<h4 class="latest-text w3_latest_text">Vizyondakiler</h4>
		<div class="container">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				<ul id="myTab" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">2018</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
						<div class="w3_agile_featured_movies">

						<?php
 						foreach($vizyondakiFilmler  as $film) { 
						$sorgu = "SELECT * FROM filmler WHERE film_id = '".$film->film_id."'";
						$req = $db->query($sorgu);
						$name = $req->fetch(PDO::FETCH_ASSOC);?>
							<div class="col-md-2 w3l-movie-gride-agile" style="width:400px; heigth:300px;">
							<form action="./?url=WebSiteHomePage/FilmBilgileri" method="Post">
							<button   type="Submit" style="background:white;border:1px"  class="hvr-shutter-out-horizontal" id="film"   name="film" value="<?php echo $name['film_id'];?>" class="btn btn-primary"><img src="images/2.jpg" title="album-name" style="width:400px; heigth:300px;" alt=" "></button>
														
									<div class="w3l-action-icon"><i  aria-hidden="true"></i></div>
								</a>
								<div class="mid-1 agileits_w3layouts_mid_1_home"style="width:400px; heigth:300px;">
									<div class="w3l-movie-text">
									<button style="background:white;border:1px" id="film" name="film" value="<?php echo $name['film_id'] ?>"> <?php echo $name['filmAd'] ?></h6></button>							
									</div>
									<div class="mid-2 agile_mid_2_home" style="width:400px; heigth:300px;">
										<p><center><?php echo $name['vizyonTarihi'] ?></center></p>

										<div class="clearfix"></div>
									</div>
								</div>
								<div class="ribben">
									<p>Yeni</p>
								</div>
							</div>
						 </form>

<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //general -->
<?php require VDIR.'/footer.php' ?>
