<?php
include "../includes/config.php";
// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else { ?>  
  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">List kategori</li>
          <!-- Breadcrumb Menu-->
          <li class="breadcrumb-menu d-md-down-none">
            <div class="btn-group" role="group" aria-label="Button group">
              <a class="btn" href="#">
                <i class="icon-speech"></i>
              </a>
              <a class="btn" href="./">
                <i class="icon-graph"></i>  Dashboard</a>
              <a class="btn" href="#">
                <i class="icon-settings"></i>  Settings</a>
            </div>
          </li>
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
<div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">
                    <strong>Basic Form</strong> Elements</div>
                  <div class="card-body">
                    <form class="form-horizontal" action="../admin/module/produk/simpanpro.php" method="post" enctype="multipart/form-data">
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Static</label>
                        <div class="col-md-9">
                          <p class="form-control-static">Tambah Produk</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Kategori</label>
                        <div class="col-md-9">
                          <select class="form-control" id="idKategori" name="idKategori">
                            <?php
                include "../includes/koneksi.php";
                $kueriKategori= mysql_query("select * from tbl_kategori");
                while($kat=mysql_fetch_array($kueriKategori)){
                ?>
                        <option value="<?php echo $kat['id_kategori_produk']; ?>"><?php echo $kat['nama_kategori']; ?></option>
                  <?php } ?>   
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Merek</label>
                        <div class="col-md-9">
                          <select class="form-control" id="idMerek" name="idMerek">
                                 <?php
                include "../includes/koneksi.php";
                $kueriKategori= mysql_query("select * from tbl_merek");
                while($kat=mysql_fetch_array($kueriKategori)){
                ?>
                        <option value="<?php echo $kat['id_merek']; ?>"><?php echo $kat['nama_merek']; ?></option>
                  <?php } ?> 
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama Produk</label>
                        <div class="col-md-9">
                          <input class="form-control" id="namaProduk" type="text" name="namaProduk" placeholder="Nama Produk">
                          <span class="help-block">This is a help text</span>
                        </div>
                      </div>
                   
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="textarea-input">Deskripsi produk</label>
                        <div class="col-md-9">
                          <textarea class="form-control" id="deskripsiProduk" name="deskripsiProduk" rows="9" placeholder="Content.."></textarea>
                        </div>
                      </div>
                       <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Stok</label>
                        <div class="col-md-9">
                          <input class="form-control" id="stok" type="text" name="stok" placeholder="stok">
                          <span class="help-block">This is a help text</span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Harga</label>
                        <div class="col-md-9">
                          <input class="form-control" id="hargaProduk" type="text" name="hargaProduk" placeholder="harga">
                          <span class="help-block">This is a help text</span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="file-input">Gambar</label>
                        <div class="col-md-9">
                          <input id="gambar" type="file" name="gambar">
                        </div>
                      </div>
                     
                     <div class="form-group row">
                        <label class="col-md-3 col-form-label">Slide</label>
                        <div class="col-md-9 col-form-label">
                          <div class="form-check checkbox">
                            <input class="form-check-input" id="slide" name="slide" type="checkbox" value="Y">
                            <label class="form-check-label" for="check1">Ya</label>
                          </div>
                          <div class="form-check checkbox">
                            <input class="form-check-input" id="slide" name="slide" type="checkbox" value="N">
                            <label class="form-check-label" for="check2">Tidak</label>
                          </div>
                          
                        </div>
                      </div>
                     
                      
                      
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Rekomendasi</label>
                        <div class="col-md-9 col-form-label">
                          <div class="form-check checkbox">
                            <input class="form-check-input" id="rekomendasi" name="rekomendasi" type="checkbox" value="Y">
                            <label class="form-check-label" for="check1">Ya</label>
                          </div>
                          <div class="form-check checkbox">
                            <input class="form-check-input" id="rekomendasi" name="rekomendasi" type="checkbox" value="N">
                            <label class="form-check-label" for="check2">Tidak</label>
                          </div>
                          
                        </div>
                      </div>
                     
                    
                       <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">
                      <i class="fa fa-dot-circle-o"></i> Submit</button>
                    <button class="btn btn-sm btn-danger" type="reset">
                      <i class="fa fa-ban"></i> Reset</button>
                  </div>
                      
                    </form>
                  </div>
                 
                </div>
                </div>
            </div> 
              </div>
              <!-- /.col-->
       </div>
       </main>
       </div>


<?php } ?>