
<?php require VDIR.'/Admin/header.php' ?>

<div class="container">
        <div class="row">
            <div class="col-sm-6" style="overflow-y: scroll;height:500px" >
            <div class="card" >
            <div class="card-body">
                      <div class="table-responsive" style="align:left">
                          <table class="table table-hover ">
                         <thead>
                         <tr>
                         <th>PNR İndirim Miktarı</th>
                         <th>PNR Kodu</th>
                         <th>PNR Stok</th>
                         <th></th>
                         </tr>
                         </thead>
                              <?php foreach($PNR  as $PNR) { ?>
                                      <tr>
                                          <td>
                                          <?php echo $PNR->indirimMiktari; ?>
                                          </td>
                                          <td>
                                          <?php echo $PNR->pnrKod; ?>
                                          </td>
                                          <td>
                                          <?php echo $PNR->stok; ?>
                                          </td>
                                          <td>
                                          <form action="./?url=PNR/PNRSilPost" method="Post">
                                            <button type="Submit" name="PNRSil" value=<?php echo $PNR->pnrKod; ?> class="btn btn-primary">Sil</button>
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
                    PNR listesi yan tarafta yer almaktadır.
                </div>
                <div class="alert alert-info" role="alert">
                PNR eklemek için PNR Ekle Menüsünü kullanabilirisin.z
                </div>
            </div>
        </div>
    </div>

<?php require VDIR.'/Admin/footer.php' ?>
