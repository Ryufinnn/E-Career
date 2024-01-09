<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";
include "../config/kodeauto.php";


if ($_GET[module]=='home'){
  echo "<h2>Selamat Datang</h2>
          <p>Hai <b>$_SESSION[namauser]</b>, silahkan klik menu pilihan yang berada 
          di sebelah kiri untuk mengelola content website. </p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p align=1>Login Hari ini: ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo "</p>";
}


elseif ($_GET[module]=='profil'){
  $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='11'");
  $r    = mysql_fetch_array($sql);

  echo "<h2>Profil Lembaga</h2>
        <form method=POST enctype='multipart/form-data' action=aksi.php?module=profil&act=update>
        <input type=hidden name=id value=$r[id_modul]>
        <table>
        <tr><td><img src=foto_berita/$r[gambar]></td></tr>
        <tr><td>Ganti Foto : <input type=file size=30 name=fupload></td></tr>
        <tr><td><textarea name=isi cols=94 rows=30>$r[static_content]</textarea></td></tr>
        <tr><td><input type=submit value=Update></td></tr>
        </form></table>";
}


elseif ($_GET[module]=='user'){
  include "modul/mod_user.php";
}

elseif ($_GET[module]=='lowongan'){
  include "modul/mod_lowongan.php";
}
elseif ($_GET[module]=='lowongan_perusahaan'){
  include "modul/mod_lowongan_perusahaan.php";
}
elseif ($_GET[module]=='preview_pelamar'){
  include "modul/mod_preview_lamaran.php";
}
elseif ($_GET[module]=='proses_lamaran'){
  include "modul/proses_lamaran.php";
}
elseif ($_GET[module]=='pendaftaran'){
  include "modul/mod_pendaftaran.php";
}


elseif ($_GET[module]=='view_registrasi'){
  include "modul/view_registrasi.php";
}

elseif ($_GET[module]=='perusahaan'){
  include "modul/mod_perusahaan/mod_daftar_perusahaan.php";
}
elseif ($_GET[module]=='add_perusahaan'){
  include "modul/mod_perusahaan/mod_add_perusahaan.php";
}
elseif ($_GET[module]=='mod_update_perusahaan'){
  include "modul/mod_perusahaan/mod_update_perusahaan.php";
}
elseif ($_GET[module]=='acount'){
  include "modul/mod_perusahaan/mod_update_perusahaan_level_perusahaan.php";
}
elseif ($_GET[module]=='pengumuman'){
  include "modul/mod_pengumuman.php";
}

elseif ($_GET[module]=='profinsi'){
  include "modul/mod_profinsi.php";
}


elseif ($_GET[module]=='hubungi'){
  include "modul/mod_hubungi.php";
}

else{
  echo "<p><b>MODUL BELUM ADA</b></p>";
}
?>
