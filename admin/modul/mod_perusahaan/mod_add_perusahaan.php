<?
$module=$_GET[module];
$save=$_GET[save];
$act=$_GET[act];
$tgl=date("Ymd"); 
if ($module='add_perusahaan' AND $save=='ok'){
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
	move_uploaded_file($tmp, $upload_path.$file);
    $pass=md5($_POST[password]);	
	$sql=mysql_query("INSERT INTO perusahaan(nama_p,tgl_daftar,alamat,wilayah,email,tlp,password,foto) 
	                       VALUES('$_POST[nama]',
                                '$tgl',
                                '$_POST[alamat]',
                                '$_POST[wilayah]',
                                '$_POST[email]',
                                '$_POST[tlp]',
                                '$pass',
                                '$file')");
	
	?>	
<?			
		if($sql){				   
		?>  <br><br><center>
			<meta http-equiv='refresh' content='0;URL=?module=perusahaan'>
			</center>
			<?
		} else {
		?><meta http-equiv='refresh' content='0;URL=?module=perusahaan'><?
		}
}
?>
<div class="content_title_01">Form perusahaan</div>
<form method="post" action="?module=add_perusahaan&save=ok" enctype='multipart/form-data' onSubmit="return validasi(this)">
<table>  
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
          <tr><td>Gambar</td>       <td> : <input type='file' name='fupload'></td></tr>
<td></td>
<td><br><button type="submit" name="submit" ><img src="images/daftar.png" width='20' height='20' /> Save</button>
&nbsp;<button type="reset" onclick=location.href='?module=perusahaan' name="reset" ><img src="images/back.png" width='20' height='20' /> Back</button></td>
</tr>
</table>  
</div>	
</form>
			
                    
            

<??>
