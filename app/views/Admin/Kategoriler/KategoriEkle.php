
<?php require VDIR.'/Admin/header.php' ?>

<form action="./?url=Kategoriler/KategoriEklemePost" method="Post">
  <div class="form-group">
   
  <label for="labelKategori">Kategori Ad</label>
    <input type="text" class="form-control"name="kategoriAd" required>
  <br>
  </div>
  <button type="Submit" value="Kaydet" class="btn btn-primary">Kategori Ekle</button>
  
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