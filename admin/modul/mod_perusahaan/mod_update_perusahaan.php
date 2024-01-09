<?
$module=$_GET[module];
$save=$_GET[save];
$act=$_GET[act];
$tgl=date("Ymd"); 
$tampil=mysql_query("SELECT * FROM perusahaan where id_perusahaan='$_GET[id]'");
$r=mysql_fetch_array($tampil);
if ($module='mod_update_perusahaan' AND $save=='ok'){
	//untuk memindahkan file ke tempat uploadan
	$upload_path = "../foto_lowongan/";
	// handle aplikasi : apabila folder yang dimaksud tidak ada, maka akan dibuat
	if (!is_dir($upload_path)){
		mkdir($upload_path);
		opendir($upload_path);
	}
	$file = $_FILES['fupload']['name'];
	$tmp  = $_FILES['fupload']['tmp_name'];	
	$id_perusahaan=kdauto(perusahaan,"P");
	
    $pass=md5($_POST[password]);	                         
	if (empty($_POST[password])) {
   $sql=mysql_query("update perusahaan set nama_p='$_POST[nama]',
											tgl_daftar='$tgl',
											alamat='$_POST[alamat]',
											wilayah='$_POST[wilayah]',
											email='$_POST[email]',
											tlp='$_POST[tlp]' where id_perusahaan='$_POST[id_perusahaan]' ");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    $sql=mysql_query("update perusahaan set nama_p='$_POST[nama]',
											tgl_daftar='$tgl',
											alamat='$_POST[alamat]',
											wilayah='$_POST[wilayah]',
											email='$_POST[email]',
											tlp='$_POST[tlp]',
											password='$pass' where id_perusahaan='$_POST[id_perusahaan]' ");
  }
  if (empty($file)) {
   $sql=mysql_query("update perusahaan set nama_p='$_POST[nama]',
											tgl_daftar='$tgl',
											alamat='$_POST[alamat]',
											wilayah='$_POST[wilayah]',
											email='$_POST[email]',
											tlp='$_POST[tlp]' where id_perusahaan='$_POST[id_perusahaan]' ");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
	move_uploaded_file($tmp, $upload_path.$file);
    $sql=mysql_query("update perusahaan set nama_p='$_POST[nama]',
											tgl_daftar='$tgl',
											alamat='$_POST[alamat]',
											wilayah='$_POST[wilayah]',
											email='$_POST[email]',
											tlp='$_POST[tlp]',
											password='$pass',
											foto='$file' where id_perusahaan='$_POST[id_perusahaan]' ");
  }
	?>	
<?			
		if($sql){				   
		?>  <br><br><center>
			<meta http-equiv='refresh' content='0;URL=?module=perusahaan'>
			</center>
			<?
		} else {
			?>			
			<meta http-equiv='refresh' content='0;URL=?module=perusahaan'><?
		}
			//echo "<script>window.location = '?module=formulir'</script>";
}
?>
<div class="content_title_01">Form Update Perusahaan</div>
<form method="post" action="?module=mod_update_perusahaan&save=ok" enctype='multipart/form-data' onSubmit="return validasi(this)">
<table>  
<input type='hidden' name='id_perusahaan' size='50' value='<?echo$r[id_perusahaan];?>'>
<tr><td>Nama Perusahaan</td>     <td> : <input type=text name='nama' size='50' value='<?echo$r[nama_p];?>'></td></tr>
          <tr><td>Alamat</td>     <td> : <input type=text name='alamat' size='50' value='<?echo$r[alamat];?>'></td></tr>
          <tr><td>Wilayah</td>     <td> : 	<select name='wilayah' style='width: 146px;'>
											<option value='<?echo$r[wilayah];?>' selected><?echo$r[wilayah];?></option>
											<option value='Padang'>Padang</option>
											<option value='Jambi'>Jambi</option>
											<option value='Palembang'>Palembang</option>
											<option value='Pekanbaru'>Pekanbaru</option>
											<option value=''>dll</option>
											</select></td></tr>
          <tr><td>E-mail</td>       <td> : <input type=text name='email' value='<?echo$r[email];?>' size=30></td></tr>
          <tr><td>Telepon</td>       <td> : <input type=text name='tlp' value='<?echo$r[tlp];?>' size=30></td></tr>
          <tr><td>Password</td>     <td> : <input type=text name='password'> *) </td></tr>
          <tr><td colspan='2'>*) Apabila password tidak diubah, dikosongkan saja.</td></tr> 
          <tr><td>Gambar</td>       <td> : <input type='file' name='fupload'></td></tr>
<td></td>
<td><br><button type="submit" name="submit" ><img src="images/daftar.png" width='20' height='20' /> Update</button>
&nbsp;<button type="reset" onclick=location.href='?module=perusahaan' name="reset" ><img src="images/back.png" width='20' height='20' /> Back</button></td>
</tr>
</table>  
</div>	
</form>
			
                    
            

<??>
