<?php require VDIR.'/Admin/header.php' ?>

<div class="container">
        <div class="row">
            <div class="col-sm-6" >
            <div class="card" >
            <div class="card-body">
                      <div class="table-responsive" style="align:left">
                          <table class="table table-hover ">
                              <?php foreach($yonetmenler as $yonetmenler) { ?>
                                      <tr>
                                          <td>
                                          <?php echo $yonetmenler->yonetmenAd; ?>
                                          </td>
                                          <td>
                                            <form action="./?url=Yonetmenler/YonetmenSilPost" method="Post">
                                            <button type="Submit" name="YonetmenSil" value=<?php echo $yonetmenler->yonetmen_id; ?> class="btn btn-primary">Sil</button>
                                            </form> 
                                          </td>
                                      </tr>
                                <?php } ?>
                          </table>
                      </div>
                      <br>
                      </div>
                      <?php 
                        if($uyari){
                            echo $uyari;
                        }

                        ?>
                        <?php 

                        if($result)
                        {
                            echo $result;
                        }

                        ?>
                  
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

<?php require VDIR.'/Admin/footer.php' ?>
