<input type=button value='Tambah Perusahaan' onclick=location.href='?module=add_perusahaan'>
<table width='96%'>
          <tr><th>no</th>
		  <th>Nama Perusahaan</th>
		  <th>Tanggal Daftar</th>
		  <th>Alamat</th>
		  <th>Wilayah</th>
		  <th>Email</th>
		  <th>Telepon</th>
		  <th>aksi</th></tr> 
<?		  
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
             <td align=center><a href=?module=mod_update_perusahaan&id=$r[id_perusahaan]>Edit</a> | 
	               <a href=./aksi.php?module=perusahaan&act=hapus&id=$r[id_perusahaan]>Hapus</a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
?>
