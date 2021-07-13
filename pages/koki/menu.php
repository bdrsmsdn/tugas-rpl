<?php require_once('./header.php') ?>
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Menu</h1>
            </div>
            <div class="row">
              <div class="mb-4 p-3">
                <button class="btn btn-dark btn-lg" name="TblTambah" data-toggle="modal" data-id="modal" data-target="#tambah_modal">
                Tambah</button>
              </div>
              <div class="mb-4 p-3">
                <form method="POST" action="produk-cari.php" class="needs-validation">
                  <div class="input-group">
                    <input type="text" class="form-control" name="cari" placeholder="Search" required="">
                    <div class="input-group-btn">
                      <button class="btn btn-dark" name="TblCari"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="row">
                  <table class="table table-dark text-white text-center table-striped table-responsive-sm">
                    <tr>
                        <th>No</th><th>Nama Minuman</th><th>Stok Tersedia</th>
                        <th>Harga</th><th>Status</th><th colspan="2">Aksi</th>
                    </tr>      
                    <tr>
                        <td>1</td>
                        <td>Dawet Original</td>
                        <td>100</td>
                        <td>8000</td>
                        <td>
                        <div>
                                <a class="TblTampil btn btn-warning shadow-none" href="" name="TblTampil" data-toggle="modal" data-id="modal" data-target="#tampil_modal">TAMPILKAN
                                </a>
                            </div>
                        </td>
                        <td>
                            <div>
                                <a class="TblEdit" href="" name="TblEdit" data-toggle="modal" data-id="modal" data-target="#edit_modal"><i class="far fa-edit"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div>
                                <a class="TblDelete" href="" name="TblDelete" data-toggle="modal" data-id="modal" data-target="#delete_modal"><i class="far fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Dawet Original</td>
                        <td>100</td>
                        <td>8000</td>
                        <td>
                        <div>
                                <a class="TblTampil btn btn-warning shadow-none" href="" name="TblTampil" data-toggle="modal" data-id="modal" data-target="#tampil_modal">TAMPILKAN
                                </a>
                            </div>
                        </td>
                        <td>
                            <div>
                                <a class="TblEdit" href="" name="TblEdit" data-toggle="modal" data-id="modal" data-target="#edit_modal"><i class="far fa-edit"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div>
                                <a class="TblDelete" href="" name="TblDelete" data-toggle="modal" data-id="modal" data-target="#delete_modal"><i class="far fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Dawet Original</td>
                        <td>100</td>
                        <td>8000</td>
                        <td>
                        <div>
                                <a class="TblTampil btn btn-warning shadow-none" href="" name="TblTampil" data-toggle="modal" data-id="modal" data-target="#tampil_modal">TAMPILKAN
                                </a>
                            </div>
                        </td>
                        <td>
                            <div>
                                <a class="TblEdit" href="" name="TblEdit" data-toggle="modal" data-id="modal" data-target="#edit_modal"><i class="far fa-edit"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div>
                                <a class="TblDelete" href="" name="TblDelete" data-toggle="modal" data-id="modal" data-target="#delete_modal"><i class="far fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Dawet Original</td>
                        <td>100</td>
                        <td>8000</td>
                        <td>
                        <div>
                                <a class="TblTampil btn btn-warning shadow-none" href="" name="TblTampil" data-toggle="modal" data-id="modal" data-target="#tampil_modal">TAMPILKAN
                                </a>
                            </div>
                        </td>
                        <td>
                            <div>
                                <a class="TblEdit" href="" name="TblEdit" data-toggle="modal" data-id="modal" data-target="#edit_modal"><i class="far fa-edit"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div>
                                <a class="TblDelete" href="" name="TblDelete" data-toggle="modal" data-id="modal" data-target="#delete_modal"><i class="far fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Dawet Original</td>
                        <td>100</td>
                        <td>8000</td>
                        <td>
                        <div>
                                <a class="TblTampil btn btn-warning shadow-none" href="" name="TblTampil" data-toggle="modal" data-id="modal" data-target="#tampil_modal">TAMPILKAN
                                </a>
                            </div>
                        </td>
                        <td>
                            <div>
                                <a class="TblEdit" href="" name="TblEdit" data-toggle="modal" data-id="modal" data-target="#edit_modal"><i class="far fa-edit"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div>
                                <a class="TblDelete" href="" name="TblDelete" data-toggle="modal" data-id="modal" data-target="#delete_modal"><i class="far fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </table>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
<?php require_once('./footer.php') ?>
<!-- Modal TAMPIL-->
<div class="modal fade" id="tampil_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tampilkan Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="frm" class="needs-validation" action="">
        <div class="row">
            <div class="form-group col-md-8 col-12">
            <tr>
                <td>Stok untuk hari ini</td>
                <td><input type="number" class="form-control" id="id_minumanq" name="id_minuman" maxlength="15" required></td>
            </tr>
            </div>
        </div>            
    </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-warning" name="TblTampil">Submit</button>
      </div>
    </div>
  </div>
          </form>
</div>

<!-- Modal DELETE-->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="frm" class="needs-validation" action="produk-update.php">
        <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Kode Produk</td>
                  <td><input type="text" class="form-control" id="id_minumanq" name="id_minuman" maxlength="15" readonly></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Nama</td>
                  <td><input type="text" class="form-control" name="nama_barang" id="namaq" maxlength="50" readonly></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Stok Tersedia</td>
                  <td><input type="text" class="form-control" name="stok" id="stokq" maxlength="6" readonly></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Harga</td>
                  <td><input type="text" class="form-control" id="hargaq" name="harga" maxlength="10" readonly></td>
                </tr>
              </div>
            </div>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-danger" name="TblHapus">Delete</button>
      </div>
    </div>
  </div>
          </form>
</div>

<script>
  $(document).ready(function(){
    $('.TblDelete').on('click', function(){
      $('#delete_modal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      
      $('#id_minumanq').val(data[0]);
      $('#namaq').val(data[1]);
      $('#stokq').val(data[2]);
      $('#hargaq').val(data[3]);
    })
  })
</script>

<!-- Modal EDIT-->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="frm" class="needs-validation" action="produk-update.php">
        <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Kode Produk</td>
                  <td><input type="text" class="form-control" id="id_minuman" name="id_minuman" maxlength="15" readonly></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Nama</td>
                  <td><input type="text" class="form-control" name="nama_barang" id="nama" maxlength="50" required=""></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Stok Tersedia</td>
                  <td><input type="text" class="form-control" name="stok" id="stok" maxlength="6" required=""></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Harga</td>
                  <td><input type="text" class="form-control" id="harga" name="harga" maxlength="10" required=""></td>
                </tr>
              </div>
            </div>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" name="TblUpdate">Save changes</button>
      </div>
    </div>
  </div>
          </form>
</div>

<script>
  $(document).ready(function(){
    $('.TblEdit').on('click', function(){
      $('#edit_modal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      
      $('#id_minuman').val(data[0]);
      $('#nama').val(data[1]);
      $('#stok').val(data[2]);
      $('#harga').val(data[3]);
    })
  })
</script>
<!-- Modal TAMBAH-->
<div class="modal fade" id="tambah_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="frm" class="needs-validation" action="produk-simpan.php" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>ID Minuman</td>
                  <td><input type="text" class="form-control" name="kode_barang" maxlength="15" required=""></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Nama Minuman</td>
                  <td><input type="text" class="form-control" name="nama_barang" maxlength="50" required=""></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Harga</td>
                  <td><input type="text" class="form-control" name="harga" maxlength="10" required=""></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Gambar</td>
                  <td><input class="form-control" type="file" id="formFile" name="gambar" required></td>
                </tr>
              </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" name="TblSimpan">Save changes</button>
      </div>
    </div>
  </div>
</form>
</div>
  </body>
</html>