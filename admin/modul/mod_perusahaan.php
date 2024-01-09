<?php
switch($_GET[act]){
  // Tampil perusahaan
  default:
    echo "<h2>&#187; Daftar Perusahaan</h2>
          <input type=button value='Tambah Perusahaan' onclick=location.href='?module=perusahaan&act=tambahperusahaan'>
          <table width=96%>
          <tr><th>no</th>
		  <th>Nama Perusahaan</th>
		  <th>Tanggal Daftar</th>
		  <th>Alamat</th>
		  <th>Wilayah</th>
		  <th>Email</th>
		  <th>Telepon</th>
		  <th>aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM perusahaan ORDER BY id_perusahaan");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
	 $tgl=tgl_indo($r[tgl_daftar]); 
       echo "<tr><td>$no</td>
             <td>$r[nama_p]</td>
             <td>$tgl</td>
             <td>$r[alamat]</td>
             <td>$r[wilayah]</td>
             <td>$r[email]</td>
             <td>$r[tlp]</td>
             <td align=center><a href=?module=perusahaan&act=editperusahaan&id=$r[id_perusahaan]>Edit</a> | 
	               <a href=./aksi.php?module=perusahaan&act=hapus&id=$r[id_perusahaan]>Hapus</a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  case "tambahperusahaan":
    echo "<h2>&#187; Tambah Perusahaan</h2>
          <form method=POST action='?module=perusahaan&act=input'>
          <table border='0'>
          <tr><td>Nama Perusahaan</td>     <td> : <input type=text name='nama' size='50'></td></tr>
          <tr><td>Alamat</td>     <td> : <input type=text name='alamat' size='50'></td></tr>
          <tr><td>Wilayah</td>     <td> : 	<select name='wilayah' style='width: 146px;' >
											<option value='Padang'>Padang</option>
											<option value='Jambi'>Jambi</option>
											<option value='Palembang'>Palembang</option>
											<option value='Pekanbaru'>Pekanbaru</option>
											<option value=''>dll</option>
											</select></td></tr>
		  <tr><td>Email</td>     <td> : <input type=text name='email'></td></tr>									
		  <tr><td>Telepon</td>     <td> : <input type=text name='tlp'></td></tr>									
          <tr><td>Password</td>     <td> : <input type=text name='password'></td></tr> 
          <tr><td>Gambar</td>       <td> : <input type='file' name='fupload' size=30></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br>";
     break;
    
  case "editperusahaan":
    $edit=mysql_query("SELECT * FROM perusahaan WHERE id_perusahaan='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>&#187; Edit Perusahaan</h2>
          <form method=POST action=?module=perusahaan&act=update>
          <input type=hidden name=id value='$r[id_perusahaan]'>
          <table>
		  <tr><td>Nama Perusahaan</td>     <td> : <input type=text name='nama' size='50' value='$r[nama_p]'></td></tr>
          <tr><td>Alamat</td>     <td> : <input type=text name='alamat' size='50' value='$r[alamat]'></td></tr>
          <tr><td>Wilayah</td>     <td> : 	<select name='wilayah' style='width: 146px;' >
											<option value='$r[wilayah]'>$r[wilayah]</option>
											<option value='Padang'>Padang</option>
											<option value='Jambi'>Jambi</option>
											<option value='Palembang'>Palembang</option>
											<option value='Pekanbaru'>Pekanbaru</option>
											<option value=''>dll</option>
											</select></td></tr>
          <tr><td>E-mail</td>       <td> : <input type=text name='email' value='$r[email]' size=30></td></tr>
          <tr><td>Password</td>     <td> : <input type=text name='password'> *) </td></tr>
          <tr><td colspan=2>*) Apabila password tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
