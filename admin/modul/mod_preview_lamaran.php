<?php
session_start();

    echo "<h2>&#187; Daftar Pelamar Kerjaan</h2>
          <table width='985'>
          <tr><th>No</th>
		  <th>No Pelamar</th>
		  <th>Nama Pelamar</th>
		  <th>Jenis Kelamin</th>
		  <th>Tanggal Lahir</th>
		  <th>Umur</th>
		  <th>Berkas Lamaran</th>
		  <th>Tanggal Lamaran</th>
		  <th>Status Lamaran</th>
		  <th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM lowongan,perusahaan,lamaran,registrasi where lamaran.id_lowongan=lowongan.id_lowongan 
	and registrasi.id_registrasi=lamaran.id_registrasi
	and lowongan.id_perusahaan=perusahaan.id_perusahaan 
	and perusahaan.id_perusahaan='$_SESSION[id_perusahaan]' and lamaran.id_lowongan='$_GET[id]' ORDER BY .lamaran.id_lowongan DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_lowongan]);
      $tgl_lahir=tgl_indo($r[tgl_lahir]);
      echo "<tr><td>$no</td>
                <td>$r[id_registrasi]</td>
                <td>$r[nama_lengkap]</td>
                <td>$r[jk]</td>
                <td>$tgl_lahir</td>
                <td>$r[umur] Tahun</td>
                <td><a href='downlot.php?file=$r[lampiran]'  ><b>Download Berkas</b></a></td>
				<td>$tgl</td>
                <td>$r[status]</td>
                <td align='center'><b><a href=?module=proses_lamaran&id=$r[id_lowongan]>Lihat Ditail</a></td></tr>";
    $no++;
    }
    echo "</table>";
   

?>
