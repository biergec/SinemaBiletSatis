<?php require VDIR.'/Admin/header.php' ?>

<form action="./?url=Oyuncular/OyuncuEklemePost" method="Post">
  <div class="form-group">
   
  <label for="labelOyuncu">Oyuncu Ad</label>
    <input type="text" class="form-control"name="oyuncuAd">
  <br>
    <label for="labelOyuncu">Oyuncu Soyad</label>
    <input type="text" class="form-control"name="oyuncuSoyad">

  </div>
  <button type="Submit" value="Kaydet" class="btn btn-primary">Oyuncu Ekle</button>
  
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