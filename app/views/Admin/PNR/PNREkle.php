<?php require VDIR.'/Admin/header.php' ?>

<form action="./?url=PNR/PNREklemePost" method="Post">
  <div class="form-group">
   
  <label for="labelPNR">PNR İndirim Miktarı TL</label>
    <input type="text" class="form-control"name="indirimMiktari" required>
  <br>
    <label for="labelKod">PNR Kodu</label>
    <input type="text" class="form-control"name="pnrKod" required>
    <br>
    <label for="labelStok">Stok Sayısı</label>
    <input type="text" class="form-control"name="stok" required>
  </div>
  <button type="Submit" value="Kaydet" class="btn btn-primary">PNR Ekle</button>
  
  <?php 
  if(isset($uyari)){
    echo $uyari;
  }

?>
</form> 
<hr>
<?php 
 if(isset($result)){
  echo $result;
}
?>
<?php require VDIR.'/Admin/footer.php' ?>