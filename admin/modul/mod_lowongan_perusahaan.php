<?php
session_start();
switch($_GET[act]){
  // Tampil lowongan
  default:
    echo "<h2>&#187; Daftar Lowongan</h2>
          <button type=button style='width:150px;padding:5px;text-align:center;' onclick=location.href='?module=lowongan_perusahaan&act=tambahlowongan'>Tambah Lowongan</button>
          <table width='985'>
          <tr><th>no</th><th>Nama Perusahaan</th><th>Deskripsi</th><th>Tanggal Posting</th><th>User Posting</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM lowongan,perusahaan where lowongan.id_perusahaan=perusahaan.id_perusahaan and perusahaan.id_perusahaan='$_SESSION[id_perusahaan]' ORDER BY id_lowongan DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_lowongan]);
      echo "<tr><td>$no</td>
                <td>$r[nama_p]</td>";?>
                <td><?echo substr($r[deskripsi],0,50);?> ...</td>
                <?echo"<td>$tgl</td>
                <td>$r[user_posting]</td>
                <td align='center'><b><a href=?module=lowongan_perusahaan&act=editlowongan&id=$r[id_lowongan]>Edit</a> | ";?>
	                  <a  href='./aksi.php?module=lowongan_perusahaan&act=hapus&id=<?echo$r[id_lowongan];?>' onclick="return confirm('Anda yakin ingin menghapus data ini ?')">Hapus</a> |
					  <?
					  echo"<a href=?module=preview_pelamar&id=$r[id_lowongan]>Preview Pelamar</a>
		        </tr>";
    $no++;
    }
    echo "</table>";
    break;
  
  case "tambahlowongan":
    echo "<h2>&#187; Tambah Lowongan</h2>
          <form method=POST action='./aksi.php?module=lowongan_perusahaan&act=input' enctype='multipart/form-data'>
          <table>
          <tr><td>Nama Perusahaan</td><td> $_SESSION[namalengkap]  </td></tr>
          <tr><td>Deskripsi</td><td>  <textarea name='deskripsi' rows=2 style='width:700px;height:200px;' cols=70></textarea></td></tr>
          <tr><td>Persaratan Lowongan</td><td>  <textarea name='persaratan' rows=2 style='width:700px;height:500px;' cols=70></textarea></td></tr>
          <tr><td></td><td><input type=submit value=Simpan>
                  <input type=button value=Batal onclick=self.history.back()></td></tr>
				  <input type='hidden' value='$_SESSION[namalengkap]' name='username'>
          </table></form><br><br><br>";
     break;    
  case "editlowongan":
    $edit = mysql_query("SELECT * FROM lowongan,perusahaan WHERE lowongan.id_perusahaan=perusahaan.id_perusahaan and  lowongan.id_lowongan='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
    echo "<h2>&#187; Edit Lowongan</h2>
          <form method=POST enctype='multipart/form-data' action=./aksi.php?module=lowongan_perusahaan&act=update>
          <input type=hidden name='id' value=$r[id_lowongan]>
         <table>
         <tr><td>Nama Perusahaan</td><td> $_SESSION[namalengkap]  </td></tr>
          <tr><td>Deskripsi</td><td>  <textarea name='deskripsi' rows=2 style='width:700px;height:200px;' cols=70>$r[deskripsi]</textarea></td></tr>
          <tr><td>Persaratan Lowongan</td><td>  <textarea name='persaratan' rows=2 style='width:700px;height:500px;' cols=70>$r[persaratan]</textarea></td></tr>
          <tr><td></td><td><input type=submit value=Simpan>
                  <input type=button value=Batal onclick=self.history.back()></td></tr>
				  <input type='hidden' value='$_SESSION[namalengkap]' name='username'>
          </table></form><br><br><br>";
    break;  
}
?>
