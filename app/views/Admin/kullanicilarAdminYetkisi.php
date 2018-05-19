<?php require VDIR.'/Admin/header.php' ?>

<div class="container">
        <div class="row">
        <?php 
                        if(isset($uyari)){
                            echo $uyari;
                        }

                        if(isset($result))
                        {
                            echo $result;
                        } ?>
                        <br>
        <div class="col-md-12" >
            <div class="card" >
            <div class="card-body">
                      <div class="table-responsive" style="align:left">
                          <table class="table table-hover ">
                          <thead>
                                <tr>
                                    <th>Kullanici</th>
                                    <th>Mail</th>
                                    <th>Cinsiyet</th>
                                    <th>Yaş</th>
                                    <th>Telefon</th>
                                    <th> </th>
                                </tr>
                            </thead>
                              <?php foreach($kullanicilar as $kullanicilar) { ?>
                                      <tr>
                                          <td>
                                          <?php echo $kullanicilar->ad; echo $kullanicilar->soyad; ?>
                                          </td>
                                          <td>
                                          <?php echo $kullanicilar->mail; ?>
                                          </td>
                                          <td>
                                          <?php echo $kullanicilar->cinsiyet; ?>
                                          </td>
                                          <td>
                                          <?php echo $kullanicilar->yas; ?> 
                                          </td>
                                          <td>
                                          <?php echo $kullanicilar->cepTelefonu; ?>
                                          </td>
                                          <td>
                                              
                                              <?php 
                                             
                                              if($kullanicilar->yetki == "Admin") { ?>
                                                
                                                <form action="./?url=adminAnaSayfasi/kullaniciAdminYetkisiAl" method="Post">
                                            <button type="Submit" name="kullaniciAdminYetkisiAl" value="<?php echo $kullanicilar->kullanici_id; ?>" class="btn btn-info">Yetkiyi Al</button>
                                            </form> 

                                                <?php } ?>
                                            
                                                <?php 
                                              if($kullanicilar->yetki !="Admin") { ?>
                                            <form action="./?url=adminAnaSayfasi/kullaniciAdminYetkisiVer" method="Post">
                                            <button type="Submit" name="kullaniciYetkiVer" value="<?php echo $kullanicilar->kullanici_id; ?>" class="btn btn-primary">Yetki Ver</button>
                                            </form> 

                                                <?php } ?>

                                          </td>
                                      </tr>
                                <?php } ?>
                          </table>
                      </div>
                      <br>
                     
        </div>
                </div>
            </div>
        </div>
    </div>

<?php require VDIR.'/Admin/footer.php' ?>

