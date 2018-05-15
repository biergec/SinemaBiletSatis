<?php require VDIR.'/header.php' ?>

<div class="container">
        <div class="row">
            <div class="col-sm-6" >
            <div class="card" >
            <div class="card-body">
                      <div class="table-responsive" style="align:left">
                          <table class="table table-hover ">
                              <?php foreach($filmTurleri as $filmTurleri) { ?>
                                      <tr>
                                          <td>
                                          <?php echo $filmTurleri->filmTurAd; ?>
                                          </td>
                                          <td>
                                            <form action="./?url=FilmTurleri/FilmTuruSilPost" method="Post">
                                            <button type="Submit" name="FilmTurSil" value=<?php echo $filmTurleri->tur_id; ?> class="btn btn-primary">Sil</button>
                                            </form> 
                                          </td>
                                      </tr>
                                <?php } ?>
                          </table>
                      </div>
                      <br>
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
            </div>
            <div class="col-sm-6">
              <br>
                <div class="alert alert-info" role="alert">
                    Film Tür listesi yan tarafta yer almaktadır.
                </div>
                <div class="alert alert-info" role="alert">
                   Film Türü eklemek için Film Türü Ekle Menüsünü kullanabilirisiniz.
                </div>
            </div>
        </div>
    </div>

<?php require VDIR.'/footer.php' ?>

