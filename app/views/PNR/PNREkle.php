<?php require VDIR.'/header.php' ?>

<form action="./?url=PNR/PNREklemePost" method="Post">
  <div class="form-group">
   
  <label for="labelPNR">PNR İndirim Miktarı(Yüzde)</label>
    <input type="text" class="form-control"name="indirimMiktari">
  <br>
    <label for="labelKod">PNR Kodu</label>
    <input type="text" class="form-control"name="pnrKod">
    <br>
    <label for="labelStok">Stok Sayısı</label>
    <input type="text" class="form-control"name="stok">
  </div>
  <button type="Submit" value="Kaydet" class="btn btn-primary">PNR Ekle</button>
  
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