
<?php
include "../includes/config.php";
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else { ?>

<?php
include "template/header.php";

?>
<?php
include "template/menu.php";
?>

<?php
            if ($_GET['module'] == 'home') {
                include "module/home/home.php";
                 } elseif ($_GET['module'] == 'kategori') {
                include "module/kategori/list_kategori.php";
                 }elseif ($_GET['module'] == 'merek') {
                include "module/merek/list_merek.php";
            }elseif ($_GET['module'] == 'member') {
                include "module/member/list_member.php";

              }elseif ($_GET['module'] == 'penjualan') {
                include "module/penjualan/list_penjualan.php";
                  }elseif ($_GET['module'] == 'konfirmasi') {
                include "module/penjualan/konfirmasi.php";
                 }elseif ($_GET['module'] == 'detail') {
                include "module/penjualan/detail_pembelian.php";
            
                } elseif ($_GET['module'] == 'tambahkat') {
                include "module/kategori/tambah_kategori.php";
                } elseif ($_GET['module'] == 'editkat') {
                include "module/kategori/edit.php";
                } elseif ($_GET['module'] == 'feditkat') {
                include "module/kategori/edit_kategori.php";
              
                 } elseif ($_GET['module'] == 'tambahmer') {
                include "module/merek/tambah_merek.php";
            
            } elseif ($_GET['module'] == 'feditmer') {
                include "module/merek/edit_merek.php";
            }elseif ($_GET['module'] == 'produk') {
                include "module/produk/list_produk.php";
            }elseif($_GET['module'] == 'tambahpro') {
                include "module/produk/tambah_produk.php";
            }elseif($_GET['module'] == 'feditpro') {
                include "module/produk/edit_produk.php";
            }elseif($_GET['module'] == 'biayakirim') {
                include "module/ongkir/list_kirim.php";
            }elseif($_GET['module'] == 'tambahkirim') {
                include "module/ongkir/tambah_kirim.php";
            }elseif($_GET['module'] == 'editkir') {
                include "module/ongkir/edit_kirim.php";


            
		}else {
            	 include "module/home/home.php";
            }
			?>

<?php
include "template/footer.php";
?>

<?php } ?>