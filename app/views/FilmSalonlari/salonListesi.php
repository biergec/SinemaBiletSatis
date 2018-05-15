<?php require VDIR.'/header.php' ?>

<div class="container">
        <div class="row">
            <div class="col-sm-6" >
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
                        <br>
            <div class="card" >
            <div class="card-body">
                      <div class="table-responsive" style="align:left">
                          <table class="table table-hover ">
                          <thead>
                                <tr>
                                    <th>Salon Adı</th>
                                    <th>Koltuk Sayısı</th>
                                    <th></th>
                                </tr>
                            </thead>
                              <?php foreach($filmSalonlari as $salonListesi) { ?>
                                      <tr>
                                          <td>
                                          <?php echo $salonListesi->salonAdi; ?>
                                          </td>
                                          <td>
                                          <?php echo $salonListesi->koltukSayisi; ?>
                                          </td>
                                          <td>
                                            <form action="./?url=FilmSalonlari/SinemaSalonSilPost" method="Post">
                                            <button type="Submit" name="SinemaSalonID" value=<?php echo $salonListesi->salon_id; ?> class="btn btn-primary">Sil</button>
                                            </form> 
                                          </td>
                                      </tr>
                                <?php } ?>
                          </table>
                      </div>
                      <br>
                     
        </div>
                </div>
            </div>
            <div class="col-sm-6">
              <br>
                <div class="alert alert-info" role="alert">
                    Sinema Salon listesi yan tarafta yer almaktadır.
                </div>
                <div class="alert alert-info" role="alert">
                    Yeni Sinema Salon bilgisi eklemek için Salon Ekle Menüsünü kullanabilirisiniz.
                </div>
            </div>
        </div>
    </div>

<?php require VDIR.'/footer.php' ?>

