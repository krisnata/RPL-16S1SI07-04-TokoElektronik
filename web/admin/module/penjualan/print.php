<?php
include "../../../includes/config.php";
include "../../../includes/koneksi.php";

session_start();
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
                    <i class="fa fa-align-justify"></i> detail transaksi </div>
                  <div class="card-body">
                  <?php 

                     $id=$_POST['id_member'];

 $kueriProduk= mysql_query("SELECT * FROM tbl_member WHERE Id_member='$id' ");
                
                while($p=mysql_fetch_array($kueriProduk)){
                  
                
                ?>

                     
                   <form class="form-horizontal" action="../admin/module/produk/simpanpro.php" method="post" enctype="multipart/form-data">

                      <div class="form-group row">


                        
                        <div class="col-md-9">
                          <p class="form-control-static">Detail Member</p>
                        </div>
                      </div>
                     
                  
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama member</label>
                        <div class="col-md-7">
                          <input class="form-control" id="namaProduk" readonly name="namaProduk" value="<?php echo $p['nama_lengkap']; ?>">
                        
                        </div>
                      </div>
                   <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Email</label>
                        <div class="col-md-7">
                          <input class="form-control" id="email" readonly name="email" value="<?php echo $p['email']; ?> " >
                        
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">No telfon</label>
                        <div class="col-md-7">
                          <input class="form-control" id="no_telp" readonly name="no_telp" value="<?php echo $p['no_telp'];?>">
                        
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Alamat</label>
                        <div class="col-md-7">
                          <input class="form-control" id="alamat" readonly name="alamat" value="<?php echo $p['alamat']; ?>" >
                        
                        </div>
                      </div>
                         <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Provinsi</label>
                        <div class="col-md-7">
                          <input class="form-control" id="provinsi" readonly name="provinsi" value="<?php echo $p['provinsi']; ?>" >
                        
                        </div>
                      </div>
                      
                      
                      
                    
                    
                  
                     
                     
                      
                      
                      
                     
                    
                  
                    <?php } ?>
           
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Produk</th>
                          <th>Gambar Produk</th>
                          <th>Tanggal beli</th>
                          <th>Jumlah</th>
                          <th>Total</th>
                          
                          
                          
                          
                        </tr>
               
                      </thead>

                      <tbody>
                                 <?php
                $idt=$_POST['id_tagihan'];
               
                $no=0;
                
                $kueriProduk= mysql_query("select * from tbl_detail_order,tbl_member,tbl_tagihan,tbl_produk WHERE tbl_tagihan.id_tagihan='$idt' AND tbl_detail_order.Id_member=tbl_member.Id_member AND tbl_detail_order.id_tagihan=tbl_tagihan.id_tagihan AND tbl_detail_order.id_produk=tbl_produk.id_produk")or die(mysql_error());
                $total=0;
                while($pro=mysql_fetch_array($kueriProduk)){
                  $subtotal    = $pro['harga'] * $pro['jumlah'];
                $total = $total + $subtotal;
                $no++;

                ?>
                        <tr>
                         <td><?php echo "$no" ?></td>
                      <td><?php echo $pro['nama_produk']; ?></td>
                      <td>
                        <div class="thumb-image">
                      <img src="upload/<?php echo $pro['gambar'];?>" data-imagezoom="true" class="img-fluid" height="100" width="150" >
                    </div>
                      </td>
                      <td><?php echo $pro['tanggal_beli']; ?></td>
                      <td><?php echo $pro['jumlah']; ?></td>
                      <td>Rp. <?php echo number_format($pro['total_tagihan']); ?></td>
                     
                    

                      
                      
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                       
                    </table>
                   



                    
                  
                  </div>
                  <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">
                      <i class="fa fa-dot-circle-o"></i> print</button>
                    
                  </div>
                      
                    </form>
                </div>
              </div>

              <!-- /.col-->
            </div>
       </div>
       </div>
      </main>
</div>
<script>
  window.print();
</script>

<?php } ?>