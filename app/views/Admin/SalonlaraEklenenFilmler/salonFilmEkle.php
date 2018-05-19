<?php require VDIR.'/Admin/header.php' ?>

            <?php 
            if($uyari){
                echo $uyari;
            }?>
            <?php 
            if($result){
             echo $result;
           }
           ?>
            
            <form action="./?url=SalonaFilmEkleme/SalonaFilmEklePost" method="Post">
            <div class="row">
            <div class="col-md-6">
            
            <div class="form-group">
    
            <label for="labelsalon">Film Başlama Saati</label>
            <input type="text" class="form-control" name="baslangiczamani">
            <br>

            <label for="labelsalon">Film Bitiş Saati</label>
            <input type="text" class="form-control" name="bitiszamani">
            <br>
            
            <label for="labelsalon">Salon Seçiniz</label>
            <select class="custom-select" id="filmSalonlari" name="filmSalonlari">
            <?php foreach($filmSalonlari as $filmSalonlari) { ?>
                <option  value=<?php echo $filmSalonlari->salon_id; ?>><?php echo $filmSalonlari->salonAdi; ?></option>
                <?php } ?>
              </select>

              <br>
              <br>

              <label for="labelsalon">Film Seçiniz</label>
            <select class="custom-select" id="film" name="film">
            <?php foreach($film as $film) { ?>
                <option value=<?php echo $film->film_id; ?> > <?php echo $film->filmAd; ?>&nbsp;- <?php echo $film->filmSuresi; ?> Dakika </option>
                <?php } ?>
              </select>

                <br>
              <br>

            <button type="Submit" value="Kaydet" class="btn btn-primary">Salona Film Ekle</button>
            
            </div>
            </div>
        
        <div class="col-md-6"  style="overflow-y">
            <div><label for="labelsalon">Salonlardaki Filmler</label>
            <br><hr>
            <fieldset>
            <?php foreach($slondakigosterilenfilmler as $slondakigosterilenfilmler) { ?>
                <?php 
                   $db = Db::getInstance();
                   $req = $db->query("SELECT salonAdi FROM sinema_film_salonlari where salon_id='".$slondakigosterilenfilmler->salon_id."'");
                   $req2 = $db->query("SELECT filmAd FROM filmler where film_id='".$slondakigosterilenfilmler->film_id."'");
                   $salonAdi = $req->fetch(PDO::FETCH_ASSOC);
                   $filmAdi = $req2->fetch(PDO::FETCH_ASSOC);
                ?>
                <p>
                <?php 
                   echo $salonAdi['salonAdi'];
                ?>
                </p>
                <p>
                <?php 
                   echo $filmAdi['filmAd'];
                ?>
                </p>
                <p>
                <?php 
                   echo $slondakigosterilenfilmler->baslama_zamani; echo " - " ; echo $slondakigosterilenfilmler->bitis_zamani;
                ?>
                </p>
                <hr>
                <?php } ?>
            </fieldset>
        </div>

        </form> 
        
 </div>

<hr>

<?php require VDIR.'/Admin/footer.php' ?>