Hoşgeldiniz, <?php echo $_SESSION["kullanici"]; ?>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="w3_login_module">
							<div class="module form-module">
                                <br>
                                <div style="margin-left: 10px;" >
                               <center>
                               <b><?php echo $_SESSION['mail']; ?> </b><br>
                               <b><?php echo "IP Adresiniz = ".$_SERVER["REMOTE_ADDR"]." " ?></b>
                               
                                    <br>
                                    <br>
                                    <form action="./?url=WebSiteHomePage/Profil" method="Post">
                                    <button type="Submit" name="Mail" value ="<?php echo $_SESSION['mail']; ?>" class="btn btn-info">Profil Sayfam</button>
                                    <br>
                                    <br>

                                    <?php 
                                    if(isset($_SESSION["yetki"])){
                                        if($_SESSION["yetki"]=="true"){ ?>
                                            <a href="./?url=adminAnaSayfasi/index" class="btn btn-info">Yönetim Paneli</a>
                                            <br>
                                            <br>
                                     <?php    }
                                    }
                                    ?>
                                    </form> 
                                        <a href="./?url=WebSiteHomePage/cikisYap" class="btn btn-info" style="kullaniciBilgileriSagUstKose" > Çıkış Yap</a>
                                    <br>
                                    <br>
                                    </center> 
                                </div>
							</div>
						</div>
					</div>
				</section>
				