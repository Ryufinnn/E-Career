<?php
include "koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));
$pass_user     = anti_injection($_POST['password']);

$level=$_POST['level'];
if($level=='admin'){
$login=mysql_query("SELECT * FROM user WHERE username='$username' AND password='$pass' ");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $level;
  header('location:./admin/media.php?module=home');
}
else{
  echo "<script>alert('Maaf, Password Dan Username Anda Tidak Benar, atau account anda sudah di blokir !');javascript:history.go(-1) </script>";
}
}
else if($level=='perusahaan'){
$login=mysql_query("SELECT * FROM perusahaan WHERE email='$username' AND password='$pass' ");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION[id_perusahaan]= $r[id_perusahaan];
  $_SESSION[namauser]     = $r[email];
  $_SESSION[namalengkap]  = $r[nama_p];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $level;
  header('location:./admin/media.php?module=home');
}
else{
  echo "<script>alert('Maaf, Password Dan Username Anda Tidak Benar, atau account anda sudah di blokir !');javascript:history.go(-1) </script>";
}
}
else if($level=='user'){
$login=mysql_query("SELECT * FROM registrasi WHERE email='$username' AND password='$pass_user' ");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION[id_registrasi]= $r[id_registrasi];
  $_SESSION[username]     = $r[email];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[foto]    	  = $r[foto];
  $_SESSION[leveluser]    = $level;  
  $sid_lama = session_id();
  session_regenerate_id();
  $sid_baru = session_id();
  header('location:./?page=home');
}
else{
  echo "<script>alert('Maaf, Password Dan Username Anda Tidak Benar, atau account anda sudah di blokir !');javascript:history.go(-1) </script>";
}
}

?>
