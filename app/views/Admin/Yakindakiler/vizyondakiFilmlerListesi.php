<?php require VDIR.'/Admin/header.php' ?>

<div class="container">
        <?php 
            $db = Db::getInstance();
        ?>
        <div class="row">
            <div class="col-sm-6" >
            <div class="card" >
            <div class="card-body">
                      <div class="table-responsive" style="align:left">
                          <table class="table table-hover ">
                          <thead>
                                <tr>
                                    <th>Film İsmi</th>
                                    <th></th>
                                </tr>
                            </thead>
                              <?php foreach($vizyondakiFilmler as $vizyondakiFilmler) { ?>
                                      <tr>
                                          <td>
                                          <?php 
                                          
                                          $req = $db->query("SELECT filmAd FROM filmler where film_id='".$vizyondakiFilmler->film_id."' ");
                                          $name = $req->fetch(PDO::FETCH_ASSOC);
                                          
                                          echo $name['filmAd']; ?>
                                          </td>
                                          <td>
                                            <form action="./?url=FilmVizyonaAlmaIslemleri/VizyondakilerFilmSilPost" method="Post">
                                            <button type="Submit" name="filmID" value="<?php echo $vizyondakiFilmler->film_id; ?>" class="btn btn-primary">Çıkar</button>
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
                    Vizyondaki Filmler listesi yan tarafta yer almaktadır.
                </div>
                <div class="alert alert-info" role="alert">
                    Vizyondaki Filmlere film eklemek için Yön Vizyondaki Filmler Film Ekle Menüsünü kullanabilirisin.z
                </div>
            </div>
        </div>
    </div>

<?php require VDIR.'/Admin/footer.php' ?>
