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
          <li class="breadcrumb-item active">Dashboard</li>
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
 				<div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Kategori </div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>kategori</th>
                          <th><div class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center btn-group-sm" role="group"> Aksi</div></th>
                        </tr>
               
                      </thead>

                      <tbody>
                                      <?php
                include "../includes/config.php";
                include "../includes/koneksi.php";
                $no=0;
                $kueriKategori= mysql_query("select * from tbl_kategori");
                while($kat=mysql_fetch_array($kueriKategori)){
                $no++;
                ?>
                        <tr>
                        <td><?php echo "$no"; ?></td>
                          <td><?php echo $kat['nama_kategori']; ?></td>
                          
                          <td>
                          <div class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center btn-group-sm" role="group" >
                  
                       <form action="<?php echo $admin_url; ?>module/kategori/hapus.php" method="post">
                          <fieldset>
                            <input type="hidden" name="id_kategori" id="id_kategori" value="<?php echo $kat['id_kategori_produk']; ?>">
                            <button type="submit"   class="btn btn-secondary btn-danger">Hapus</button>
                          </fieldset>
                        </form>
                         <form action="<?php echo $admin_url; ?>admin.php?module=feditkat" method="post">
                          <fieldset>
                            <input type="hidden" name="id_kategori" id="id_kategori" value="<?php echo $kat['id_kategori_produk']; ?>">
                            <button type="submit"  class="btn btn-secondary btn-dark">Edit</button>
                          </fieldset>
                        </form>
                  </div>
                  </td>
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                       
                    </table>
                   

                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="#">Prev</a>
                      </li>
                      <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">4</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                    <div  class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
                    <a href="<?php echo $base_url; ?>admin/admin.php?module=tambahkat">
                    <button class="btn btn-primary" type="button">
                      <i class="icon-plus "></i> Tambah</button></a>
                  </div>
                  </div>
                </div>
              </div>

              <!-- /.col-->
            </div>
       </div>
       </div>
      </main>
</div>

<?php } ?>