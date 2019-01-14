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
                   <?php
              include "../includes/config.php";
              include "../includes/koneksi.php";

              $idKategori=$_POST['id_kategori'];
              $queryEdit=mysql_query("SELECT * FROM tbl_kategori WHERE id_kategori_produk='$idKategori'");

              $hasilQuery=mysql_fetch_array($queryEdit);
             $idKategori=$hasilQuery['id_kategori_produk'];
              $namaKategori=$hasilQuery['nama_kategori'];

              ?>
                    <form class="form-horizontal" action="../admin/module/kategori/edit.php" method="post">
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label"><b>Edit kategori</b></label>
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Nama Kategori</label>
                        <div class="col-md-9">
                        <input type="hidden" name="id_kategori" value="<?php echo $idKategori; ?>">
                          <input class="form-control" id="namaKategori" type="text" name="nama_kategori" value="<?php echo $namaKategori; ?>" >
                          
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