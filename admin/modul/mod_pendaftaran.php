<?php
    echo "<h2>&#187; Daftar Pendaftaran</h2>
          <table width='985'>
          <tr><th>no</th><th>No Registrasi</th><th>Nama Lengkap</th><th>Jenis Kelamin</th><th>Alamat</th><th>Tamatan Dari</th><th>Jurusan</th><th>Email</th><th>IPK</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM registrasi ORDER BY id_registrasi DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_lowongan]);
      echo "<tr><td>$no</td>
                <td>$r[id_registrasi]</td>
                <td>$r[nama_lengkap]</td>
                <td>$r[jk]</td>
                <td>$r[alamat]</td>
                <td>$r[tamatan]</td>
                <td>$r[jurusan]</td>
                <td>$r[email]</td>
                <td>$r[ipk]</td>
                <td><a href=?module=view_registrasi&act=preview&id=$r[id_registrasi]>Preview</a>
		        </tr>";
    $no++;
    }
    echo "</table>";
    
?>
