<?php require VDIR.'/Admin/header.php' ?>

<form action="./?url=FilmSalonlari/FilmSalonEklePost" method="Post">
  <div class="form-group">
   
  <label for="labelsalon">Salon Adı</label>
    <input type="text" class="form-control" name="SinemaSalonAdi" required>
  <br>
    <label for="labelsalonKoltukSayisi">Salon Koltuk Sayısı</label>
    <input type="text" class="form-control" name="SinemaSalonKoltukSayisi" required>

  </div>
  <button type="Submit" value="Kaydet" class="btn btn-primary">Salon Ekle</button>
  
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
<?php require VDIR.'/Admin/footer.php' ?>