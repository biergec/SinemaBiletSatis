<?php require VDIR.'/Admin/header.php' ?>

            <?php 
            
            $db = Db::getInstance();

            if($uyari){
                echo $uyari;
            }?>
            <?php 
            if($result){
             echo $result;
           }
           ?>
            
            <form action="./?url=FilmVizyonaAlmaIslemleri/VizyondakilerFilmEklePost" method="Post">
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <button type="Submit" value="Kaydet" class="btn btn-primary">Seçili Filmleri Vizyondakilere Ekle</button>
            </div>
            </div>
        
        <div class="col-md-6"  style="overflow-y">
            <div><label for="labelsalon">Vizyondakilere Eklenecek Filmleri Seçiniz</label>
            <br><hr>
            <fieldset>
            <?php foreach($yakindaCikacakFilmler as $yakindaCikacakFilmler) { ?>
                <input type="checkbox" name="filmID[]" value=<?php echo $yakindaCikacakFilmler->film_id; ?>>&nbsp; <?php 
                
                $req = $db->query("SELECT filmAd FROM filmler where film_id='".$yakindaCikacakFilmler->film_id."' ");
                $name = $req->fetch(PDO::FETCH_ASSOC);
                echo $name['filmAd'];
                
                    ?> <br>
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

<?php require VDIR.'/Admin/footer.php' ?>