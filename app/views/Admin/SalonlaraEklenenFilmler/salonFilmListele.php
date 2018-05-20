
<?php require VDIR.'/Admin/header.php' ?>

  <div class="row">
            <div class="col-md-12" style="overflow-y: scroll;height:500px" >
            <div class="card" >
            <div class="card-body">
                      <div class="table-responsive" style="align:left">
                          <table class="table table-hover ">
                         <thead>
                         <tr>
                         <th>Salon Adı</th>
                         <th>Film Adı</th>
                         <th>Film Saati</th>
                         <th>  </th>
                         
                         </tr>
                         </thead>
                <?php foreach($slondakigosterilenfilmler as $slondakigosterilenfilmler) { ?>
                <?php 
                   $db = Db::getInstance();
                   $req = $db->query("SELECT salonAdi FROM sinema_film_salonlari where salon_id='".$slondakigosterilenfilmler->salon_id."'");
                   $req2 = $db->query("SELECT filmAd FROM filmler where film_id='".$slondakigosterilenfilmler->film_id."'");
                   $salonAdi = $req->fetch(PDO::FETCH_ASSOC);
                   $filmAdi = $req2->fetch(PDO::FETCH_ASSOC);
                ?>
                <tr>
                <td>
                <?php 
                   echo $salonAdi['salonAdi'];
                ?>
                </td>
                <td>
                <?php 
                   echo $filmAdi['filmAd'];
                ?>
                </td>
                <td>
                <?php 
                   echo $slondakigosterilenfilmler->baslama_zamani; echo " - " ; echo $slondakigosterilenfilmler->bitis_zamani;
                ?>
                </td>
                <td>
                <form action="./?url=SalonaFilmEkleme/filmSalonSilPost" method="Post">

                <input id="filmBaslama" name="filmBaslama" type="hidden" value="<?php echo $slondakigosterilenfilmler->baslama_zamani ; ?>">

                 <button type="Submit" name="sinema_film_salon_id" value="<?php echo $slondakigosterilenfilmler->sinema_film_salon_id; ?>" class="btn btn-primary">Sil</button>
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
            
        </div>

<?php require VDIR.'/Admin/footer.php' ?>
