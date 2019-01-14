<?php
include "../includes/config.php";
// session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";

} else { 
  ?>  

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
                    <form class="form-horizontal" action="../admin/module/merek/simpanmer.php" method="post" >
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label"><b>Tambah Merek</b></label>
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Nama merek</label>
                        <div class="col-md-9">
                          <input class="form-control" id="namaKategori" type="text" name="namaMerek" placeholder="Text">
                          
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