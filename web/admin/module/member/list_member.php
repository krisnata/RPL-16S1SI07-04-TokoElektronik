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
                    <i class="fa fa-align-justify"></i> Member </div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>username</th>
                          <th>Nama member</th>
                          <th>email</th>
                          <th>no_telp</th>
                          <th>Alamat</th>
                          <th>Provinsi</th>
                          <th><div class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center btn-group-sm" role="group"> Aksi</div></th>
                        </tr>
               
                      </thead>

                      <tbody>
                             <?php
                include "../includes/config.php";
                include "../includes/koneksi.php";
                $no=0;
                $kueriProduk= mysql_query("select * from tbl_member");
                while($pro=mysql_fetch_array($kueriProduk)){
                $no++;
                ?>
                        <tr>
                         <td><?php echo "$no" ?></td>
                      <td><?php echo $pro['username']; ?></td>
                      <td><?php echo $pro['nama_lengkap']; ?></td>
                      <td><?php echo $pro['email']; ?></td>
                      <td><?php echo $pro['no_telp']; ?></td>
                      <td><?php echo $pro['alamat']; ?></td>
                      <td><?php echo $pro['provinsi']; ?></td>
                          
                          <td>
                          <div class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center" role="group" >
                      <form action="<?php echo $admin_url; ?>module/produk/hapuspro.php" method="post">
                          <fieldset>
                            <input type="hidden" name="id_member" id="id_member" value="<?php echo $pro['id_member']; ?>">
                            <button type="submit" name="submit" class="btn btn-secondary btn-danger">Hapus</button>
                          </fieldset>
                        </form>
                         <form action="<?php echo $admin_url; ?>admin.php?module=feditpro" method="post">
                          <fieldset>
                            <input type="hidden" name="id_member" id="id_member" value="<?php echo $pro['id_member']; ?>">
                            <button type="submit" name="submit" class="btn btn-secondary btn-dark">Edit</button>
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