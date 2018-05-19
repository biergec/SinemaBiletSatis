<?php require VDIR.'/header.php' ?>
<br>
<br>
<h4 class="latest-text w3_latest_text"><?php 
    echo $kullanici['ad']." ";
    echo $kullanici['soyad']; 
    ?></h4>
<div class="container">
  <div class="col-md-6">
  <div>
    <ul style="	font-size: 24px;">
        <b> Mail : </b><?php 
        echo $kullanici['mail'];
        ?>
        <br><br>
        <b>Telefon :</b>   <?php 
        echo $kullanici['cepTelefonu'];
        ?>
        <br> <br>
        <b>Cinsiyet : </b><?php 
        echo $kullanici['cinsiyet'];
        ?><br> <br>
        <b>Yaş : </b><?php 
        echo $kullanici['yas'];
        ?><br> <br>
    </ul>
</div>
  </div> 
  <div class="col-md-6">
  <div>
    <ul style="	font-size: 24px;">
    <div class="alert alert-primary" role="alert">
     <img src="images/1.jpg" style="width:600px; height:300px; margin-bottom:10px" alt="">
    </div>
    </ul>
</div>
</div> 

</div>
<br>
<br>
<?php require VDIR.'/footer.php' ?>
