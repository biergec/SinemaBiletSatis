<?php require VDIR.'/Admin/header.php' ?>

<div class="container">
        <div class="row">
            <div class="col-sm-6" >
                        
                        <?php 
                        if($uyari){
                            echo $uyari;
                        }
                        if($result)
                        {
                            echo $result;
                        }
                        ?>


                        <br>
            <div class="card" >
            <div class="card-body">
                      <div class="table-responsive" style="align:left">
                          <table class="table table-hover ">
                          <thead>
                                <tr>
                                    <th>Film Türleri</th>
                                    <th></th>
                                </tr>
                            </thead>
                              <?php foreach($filmTurleri as $filmTuru) { ?>
                                      <tr>
                                          <td>
                                          <?php echo $filmTuru->filmTurAd; ?>
                                          </td>
                                          <td>
                                            <form action="./?url=FilmTurleri/FilmTuruSilPost" method="Post">
                                            <button type="Submit" name="FilmTurSil" value=<?php echo $filmTuru->tur_id; ?> class="btn btn-primary">Sil</button>
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
                    Yeni Tür bilgisi eklemek için Tür Ekle Menüsünü kullanabilirisiniz.
                </div>
            </div>
        </div>
    </div>

<?php require VDIR.'/Admin/footer.php' ?>

