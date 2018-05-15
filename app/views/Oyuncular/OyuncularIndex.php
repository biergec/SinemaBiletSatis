
<?php require VDIR.'/header.php' ?>

<div class="container">
  <div class="row">
    <div class="col-md-6">
        
    </div>
  </div>
</div>

<div class="container">
        <div class="row">
            <div class="col-sm-6" style="overflow-y: scroll;height:500px" >
            <div class="card" >
            <div class="card-body">
                      <div class="table-responsive" style="align:left">
                          <table class="table table-hover ">
                              <?php foreach($posts  as $oyuncu) { ?>
                                      <tr>
                                          <td>
                                          <?php echo $oyuncu->oyuncuAd; ?>
                                          </td>
                                          <td>
                                          </td>
                                      </tr>
                                <?php } ?>
                          </table>
                      </div>
            </div>
                  
                </div>
            </div>
            <div class="col-sm-6">
              <br>
                <div class="alert alert-info" role="alert">
                    Oyuncu listesi yan tarafta yer almaktadır.
                </div>
                <div class="alert alert-info" role="alert">
                   Oyuncu eklemek için Oyuncu Ekle Menüsünü kullanabilirisin.z
                </div>
            </div>
        </div>
    </div>

<?php require VDIR.'/footer.php' ?>
