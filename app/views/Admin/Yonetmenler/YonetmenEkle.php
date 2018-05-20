
<?php require VDIR.'/Admin/header.php' ?>

<form action="./?url=Yonetmenler/YonetmenEklemePost" method="Post">
  <div class="form-group">
   
  <label for="labelYonetmen">Yönetmen Ad</label>
    <input type="text" class="form-control"name="yonetmenAd" required>
  <br>
    <label for="labelYonetmen">Yönetmen Soyad</label>
    <input type="text" class="form-control"name="yonetmenSoyad" required>

  </div>
  <button type="Submit" value="Kaydet" class="btn btn-primary">Yönetmen Ekle</button>
  
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