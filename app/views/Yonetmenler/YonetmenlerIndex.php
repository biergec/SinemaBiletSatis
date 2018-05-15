
<?php require VDIR.'/header.php' ?>

<div class="container">
        <div class="row">
            <div class="col-sm-6" style="overflow-y: scroll;height:500px" >
            <div class="card" >
            <div class="card-body">
                      <div class="table-responsive" style="align:left">
                          <table class="table table-hover ">
                              <?php foreach($posts  as $yonetmen) { ?>
                                      <tr>
                                          <td>
                                          <?php echo $yonetmen->yonetmenAd; ?>
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
                    Yönetmen listesi yan tarafta yer almaktadır.
                </div>
                <div class="alert alert-info" role="alert">
                   Yönetmen eklemek için Yönetmen Ekle Menüsünü kullanabilirisin.z
                </div>
            </div>
        </div>
    </div>

<?php require VDIR.'/footer.php' ?>
