Giriş Yap & Kayıt Ol
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="w3_login_module">
							<div class="module form-module">
							  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
								<div class="tooltip">Tıklayın</div>
							  </div>
							  <div class="form">
								<h3>Hesabınız ile giriş yapın</h3>	
								<form action="./?url=WebSiteHomePage/girisYap" method="post">
								  <input type="text" name="Mail" placeholder="E-Posta Adresiniz" required="">
								  <input type="password" name="Password" placeholder="Şifreniz" required="">
								  <input type="submit" value="Giriş Yap">
								</form>
							  </div>
							  <div class="form">
								<h3>Yeni Hesap Oluştur</h3>

								<?php 
								if($uyari){
									echo $uyari;
								}
								?>

								<form action="./?url=WebSiteHomePage/uyeOl" method="post">
								  <input type="text" class="form-control" name="Ad" placeholder="Adınız*" required="">
									<input type="text" class="form-control" name="Soyad" placeholder="Soyadınız*" required=""> 
									<p>Cinsiyetiniz :* <select class="form-control custom-select" name="Cinsiyet" id="Cinsiyet">
										<option value="Kadin">Kadın</option>
										<option value="Erkek">Erkek</option>
									</select></p><br>
								  <input type="number" class="form-control" name="Yas" placeholder="Yaşınızı Giriniz*" required=""><br>
								  <input type="password" class="form-control" name="Password" placeholder="Şifreniz*" required="">
								  <input type="password" class="form-control" name="PasswordTekrar" placeholder="Şifreniz Tekrar*" required="">
								  <input type="email" class="form-control" name="Email" placeholder="Mail Adresiniz*" required="">
								  <input type="number" class="form-control" name="Phone" placeholder="Telefon Numaranız*" required=""><br>
								  <input type="submit" value="Kayıt Ol">
								</form>

							  </div>
							</div>
						</div>
					</div>
				</section>
				