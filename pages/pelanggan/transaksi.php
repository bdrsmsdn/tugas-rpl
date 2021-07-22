<?php
session_start();

require_once '../../functions.php';

$dp=$_SESSION["id_pelanggan"];

if (!isset($_SESSION['cart'])) {
 header('Location: index.php');
}

$cart = unserialize(serialize($_SESSION['cart']));
$total_item = 0;
$total_bayar = 0;

//VALIDASI STOK TAPI ERROR
// for ($i=0; $i<count($cart); $i++) { 
//     $tt = $cart[$i]['qty'];
//     $de = $cart[$i]['id'];
//     $query = mysqli_query($conn, "SELECT stok FROM minuman WHERE id_minuman='$de'");
//     foreach($query as $dd) :
//     if ($dd['stok'] < $tt) {
//         $_SESSION['pesan'] = "Pesanan ditolak.";
//     }
//     endforeach;
//     break;
// }

// proses penyimpanan data ke tabel PESANAN
for ($i=0; $i<count($cart); $i++) { 
 $total_item = $cart[$i]['qty'];
 $total_bayar = $cart[$i]['qty'] * $cart[$i]['price'];
 $iddd = $cart[$i]['id'];
 $query = mysqli_query($conn, "INSERT INTO pesanan (jumlah_pesanan, total_harga, tanggal, id_pelanggan, id_minuman) VALUES ('$total_item', '$total_bayar', '" . date('Y-m-d') . "','$dp', '$iddd')");
}

// proses penyimpanan data ke tabel PEMBAYARAN
$id_order = mysqli_insert_id($conn);
for ($i=0; $i<count($cart); $i++) { 
$tb += $cart[$i]['qty'] * $cart[$i]['price'];

 $query = mysqli_query($conn, "INSERT INTO pembayaran (total_pembayaran, tgl_pembayaran, id_pesanan) VALUES ('$tb', '" . date('Y-m-d') . "', '$id_order')");
}

//proses pengurangan stok jika ada pembelian 
//MASIH ERROR BTW
for ($i=0; $i<count($cart); $i++) { 
    $total_item = $cart[$i]['qty'];
    $total_bayar = $cart[$i]['qty'] * $cart[$i]['price'];
    $iddd = $cart[$i]['id'];
    $query = mysqli_query($conn, "UPDATE minuman SET
    stok -= $total_item WHERE id_minuman='$iddd'");
   }

// unset session
unset($_SESSION['cart']);
$_SESSION['pesan'] = "Pembelian sedang diproses, terimakasih.";
header('Location: index.php');