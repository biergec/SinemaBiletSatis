
<?php require VDIR.'/header.php' ?>

<form action="./?url=FilmVizyonaAlmaIslemleri/yakindekilerEklemePost" method="Post">
  <div class="form-group">
   


  <label for="labelYakındaki">Yakındaki Filmler Ekle</label>
  <td>

        <?php
        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM filmler where not film_id in(SELECT film_id FROM film_yakinda)");?>
        <fieldset><?php
        foreach($req->fetchAll() as $filmAd) {?>
                <input type="checkbox" name="film_id[]" value=<?php echo $filmAd['film_id']; ?>>&nbsp; <?php echo $filmAd['filmAd']; ?> <br>
        <?php
        } 
        ?>
        </fieldset>

</td>
  <br>
  </div>
  <button type="Submit" value="Kaydet" class="btn btn-primary">Ekle</button>
  <?php 




  if($uyari){
    echo $uyari;
  }

?>
</form> 
<hr>
<?php 
 if($result){
  echo $result;
}
?>
<?php require VDIR.'/footer.php' ?>