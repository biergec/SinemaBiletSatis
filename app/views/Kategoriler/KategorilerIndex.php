<?php require VDIR.'/header.php' ?>

<div class="container">
        <div class="row">
            <div class="col-sm-6" >
            <div class="card" >
            <div class="card-body">
                      <div class="table-responsive" style="align:left">
                          <table class="table table-hover ">
                              <?php 
                              if($KategoriTuru){
                              foreach($KategoriTuru as $kategoriler) { ?>
                                      <tr>
                                          <td>
                                          <?php echo $kategoriler->kategoriAd; ?>
                                          </td>
                                          <td>
                                            <form action="./?url=Kategoriler/KategoriSilPost" method="Post">
                                            <button type="Submit" name="KategoriSil" value=<?php echo $kategoriler->kategori_id; ?> class="btn btn-primary">Sil</button>
                                            </form> 
                                          </td>
                                      </tr>
                                <?php }?> <?php }?>
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
                    Kategori Tür listesi yan tarafta yer almaktadır.
                </div>
                <div class="alert alert-info" role="alert">
                   Kategori Türü eklemek için Kategori Ekle Menüsünü kullanabilirisiniz.
                </div>
            </div>
        </div>
    </div>

<?php require VDIR.'/footer.php' ?>

