
<?php require VDIR.'/header.php' ?>

<div class="container">
        <div class="row">
            <div class="col-sm-6">
            <div class="card" >
            <div class="card-body">
                      <div class="table-responsive" style="align:left">
                          <table class="table table-hover ">
                              <?php foreach($KategoriTuru  as $kategori) { ?>
                                      <tr>
                                          <td>
                                          <?php echo $kategori->kategoriAd; ?>
                                          </td>
                                          <td>
                                          <button type="Submit" value="Kaydet" class="btn btn-primary">Sil</button>
                                          </td>
                                      </tr>
                                <?php } ?>
                          </table>
                      </div>
            </div>
                  
                </div>
            </div>
            <div class="col-sm-6">
              <br>
                <div class="alert alert-info" role="alert">
                    Kategori listesi yan tarafta yer almaktadır.
                </div>
                <div class="alert alert-info" role="alert">
                Kategori eklemek için Kategori Ekle Menüsünü kullanabilirisin.z
                </div>
            </div>
        </div>
    </div>

<?php require VDIR.'/footer.php' ?>
