<?php require VDIR.'/Admin/header.php' ?>

<form action="./?url=FilmTurleri/FilmTuruEklePost" method="Post">
  <div class="form-group">
   
  <label for="labelFilmTur">Film Tür Bilgisi</label>
    <input type="text" class="form-control" name="FilmTur" required>
  </div>
  <button type="Submit" value="Kaydet" class="btn btn-primary">Film Türü Ekle</button>
  
  <?php 
  if($uyari){
    echo $uyari;
  }

?>

</form> 

<hr>

<?php 

 if($result)
 {
    echo $result;
 }

?>

<?php require VDIR.'/Admin/footer.php' ?>