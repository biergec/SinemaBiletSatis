<?php require VDIR.'/header.php' ?>


            <?php 
            if($uyari){
                echo $uyari;
            }?>
            <?php 
            if($result){
             echo $result;
           }
           ?>
            
            <form action="./?url=Film/FilmEklePost" method="Post">
            <div class="row">
            <div class="col-md-6">
            
            <div class="form-group">
    
            <label for="labelsalon">Film Adı</label>
            <input type="text" class="form-control" name="filmAdi">
            <br>

            <label for="labelsalon">Film Süresi</label>
            <input type="number" class="form-control" name="filmSuresi">
            <br>

            <label for="labelsalon">Film Özeti</label>
            <input type="text" class="form-control" name="filmOzet">
            <br>

            <label for="labelsalon">Vizyon Tarihi</label>
            <input type="text" class="form-control" name="vizyonTarihi">
            <br>
            <label for="labelsalon">Film Fiyatı</label>
            <input type="number" class="form-control" name="filmFiyati">
            <br>
            
            <label for="labelsalon">Film Kategori</label>
            <select class="custom-select" id="kategorilerID" name="kategorilerID">
            <option name="kategorilerID" selected>Kategori Seciniz</option>
            <?php foreach($kategoriler as $kategori) { ?>
                <option  value=<?php echo $kategori->kategori_id; ?>><?php echo $kategori->kategoriAd; ?></option>
                <?php } ?>
              </select>

              <br>
              <br>
                

              <label for="labelsalon">Film Türü</label>
            <select class="custom-select" id="filmTurleriID" name="filmTurleriID">
            <option name="filmTurleriID" selected>Tür Seciniz</option>
            <?php foreach($filmTurleri as $filmTurleri) { ?>
                <option value=<?php echo $filmTurleri->tur_id; ?> > <?php echo $filmTurleri->filmTurAd; ?> </option>
                <?php } ?>
              </select>

                <br>
              <br>


              <label for="labelsalon">Film Yönetmeni</label>
            <select class="custom-select" id="yonetmenlerID" name="yonetmenlerID">
            <option name="yonetmenlerID" selected>Yönetmen Seciniz</option>
            <?php foreach($yonetmenler as $yönetmen) { ?>
                <option value=<?php echo $yönetmen->yonetmen_id; ?>><?php echo $yönetmen->yonetmenAd; ?></option>
                <?php } ?>
              </select>

              <br>
              <br>
            <button type="Submit" value="Kaydet" class="btn btn-primary">Film Ekle</button>
            
            </div>
            </div>
       

        
        <div class="col-md-6"  style="overflow-y">
            <div><label for="labelsalon">Oyuncuları Seciniz</label>
            <br><hr>
            <fieldset>
            <?php foreach($oyuncular as $oyuncular) { ?>
                <input type="checkbox" name="oyuncularID[]" value=<?php echo $oyuncular->oyuncu_id; ?>>&nbsp; <?php echo $oyuncular->oyuncuAd; ?> <br>
                <hr>
                <?php } ?>
            </fieldset>
        </div>


        </form> 
        
        

 </div>

<hr>
<?php 
 if($result){
  echo $result;
}
?>
<?php require VDIR.'/footer.php' ?>