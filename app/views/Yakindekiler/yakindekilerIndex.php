
<?php require VDIR.'/header.php' ?>

<div class="container">
        <div class="row">
            <div class="col-sm-6" style="overflow-y: scroll;height:500px" >
            <div class="card" >
            <div class="card-body">
                      <div class="table-responsive" style="align:left">
                          <table class="table table-hover ">
                         <thead>
                         <tr>
                         <th>Yakındaki Film Adı</th>
                         <th></th>
                         </tr>
                         </thead>
                         
                              <?php 
                              $db = Db::getInstance();
                              foreach($yakindakifilmler  as $yakindakifilmler) { ?>
                                      <tr>
                                          <td>
                                          <?php  
                                                $req = $db->query("SELECT filmAd FROM filmler where film_id='".$yakindakifilmler->film_id."'");
                                                $name = $req->fetch(PDO::FETCH_ASSOC);
                                                echo $name['filmAd'];
                                                ?>
                                          </td>
                                          <td>
                                          <form action="./?url=FilmVizyonaAlmaIslemleri/yakindekilerSilPost" method="Post">
                                            <button type="Submit" name="film_id" value=<?php echo $yakindakifilmler->film_id; ?> class="btn btn-primary">Sil</button>
                                            </form> 
                                          </td>
                                      </tr>
                                <?php } ?>
                          </table>
                      </div>
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
                    Yakındaki Filmlerin listesi yan tarafta yer almaktadır.
                </div>
            </div>
        </div>
    </div>

<?php require VDIR.'/footer.php' ?>
