<?php
session_start();
include "../config/koneksi.php";
include "../config/library.php";

$module=$_GET[module];
$act=$_GET[act];


// Menghapus data
if (isset($module) AND $act=='hapus'){
  mysql_query("DELETE FROM ".$module." WHERE id_".$module."='$_GET[id]'");
  header('location:media.php?module='.$module);
}
// Menghapus data
if (isset($module) AND $act=='hapus'){
  mysql_query("DELETE FROM lowongan WHERE id_lowongan='$_GET[id]'");
  header('location:media.php?module=lowongan_perusahaan');
}
// Menghapus data
if (isset($module) AND $act=='hapus'){
  mysql_query("DELETE FROM contact WHERE id_contact='$_GET[id]'");
  header('location:media.php?module='.$module);
}


// Input user
elseif ($module=='user' AND $act=='input'){
  $pass=md5($_POST[password]);
  mysql_query("INSERT INTO user(username,
                                password,
                                nama_lengkap,
                                email) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]')");
  header('location:media.php?module='.$module);
}

// Update user
elseif ($module=='user' AND $act=='update'){
  // Apabila password tidak diubah
  if (empty($_POST[password])) {
    mysql_query("UPDATE user SET username      = '$_POST[username]',
                                 nama_lengkap = '$_POST[nama_lengkap]',
                                 email        = '$_POST[email]'  
                           WHERE id_user      = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE user SET username      = '$_POST[username]',
                                 password     = '$pass',
                                 nama_lengkap = '$_POST[nama_lengkap]',
                                 email        = '$_POST[email]'  
                           WHERE id_user      = '$_POST[id]'");
  }
  header('location:media.php?module='.$module);
}
// perusahaan
elseif ($module=='perusahaan' AND $act=='input'){
  $pass=md5($_POST[password]);
  $tgl=date("Ymd"); 
  //untuk memindahkan file ke tempat uploadan
	$upload_path = "foto_calon/";
	// handle aplikasi : apabila folder yang dimaksud tidak ada, maka akan dibuat
	if (!is_dir($upload_path)){
		mkdir($upload_path);
		opendir($upload_path);
	}
	$file = $_FILES['fupload']['name'];
	$tmp  = $_FILES['fupload']['tmp_name'];
  move_uploaded_file($tmp, $upload_path.$file);
  mysql_query("INSERT INTO perusahaan(nama_p,tgl_daftar,alamat,wilayah,email,tlp,password,foto) 
	                       VALUES('$_POST[nama]',
                                '$tgl',
                                '$_POST[alamat]',
                                '$_POST[wilayah]',
                                '$_POST[email]',
                                '$_POST[tlp]',
                                '$pass',
                                '$file')");
  header('location:media.php?module='.$module);
}

// Update perusahaan
elseif ($module=='perusahaan' AND $act=='update'){
  // Apabila password tidak diubah
  if (empty($_POST[password])) {
    mysql_query("UPDATE perusahaan SET username      = '$_POST[username]',
                                 nama_lengkap = '$_POST[nama_lengkap]',
                                 email        = '$_POST[email]'  
                           WHERE id_user      = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE perusahaan SET username      = '$_POST[username]',
                                 password     = '$pass',
                                 nama_lengkap = '$_POST[nama_lengkap]',
                                 email        = '$_POST[email]'  
                           WHERE id_user      = '$_POST[id]'");
  }
  header('location:media.php?module='.$module);
}



// Input soal
elseif ($module=='lowongan' AND $act=='input'){
    mysql_query("INSERT INTO lowongan(id_perusahaan,deskripsi,persaratan,tgl_lowongan,user_posting) 
                            VALUES('$_POST[perusahaan]',
								   '$_POST[deskripsi]',
								   '$_POST[persaratan]',
                                   '$tgl_sekarang',
                                   '$_POST[username]')");
  
  header('location:media.php?module='.$module);
}

// Update lowongan
elseif ($module=='lowongan' AND $act=='update'){
   mysql_query("update lowongan set id_perusahaan='$_POST[perusahaan]',
								deskripsi='$_POST[deskripsi]',
								persaratan='$_POST[persaratan]',
								user_posting='$_POST[username]' where id_lowongan='$_POST[id]' ");
  header('location:media.php?module='.$module);
}
// Input soal
elseif ($module=='lowongan_perusahaan' AND $act=='input'){
    mysql_query("INSERT INTO lowongan(id_perusahaan,deskripsi,persaratan,tgl_lowongan,user_posting) 
                            VALUES('$_SESSION[id_perusahaan]',
								   '$_POST[deskripsi]',
								   '$_POST[persaratan]',
                                   '$tgl_sekarang',
                                   '$_POST[username]')");
  
  header('location:media.php?module='.$module);
}

// Update lowongan
elseif ($module=='lowongan_perusahaan' AND $act=='update'){
   mysql_query("update lowongan set deskripsi='$_POST[deskripsi]',
								persaratan='$_POST[persaratan]',
								user_posting='$_POST[username]' where id_lowongan='$_POST[id]' ");
  header('location:media.php?module='.$module);
}

?>
