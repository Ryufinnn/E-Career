<?
$page=$_GET[page];
$update=$_GET[update];
$act=$_GET[act];
$sql=mysql_query("select * from registrasi where id_registrasi='$_GET[nodaftar]'");
$r=mysql_fetch_array($sql);

if ($page='view_registrasi' AND $update=='ok'){
	//untuk memindahkan file ke tempat uploadan
	$upload_path = "foto_calon/";
	// handle aplikasi : apabila folder yang dimaksud tidak ada, maka akan dibuat
	if (!is_dir($upload_path)){
		mkdir($upload_path);
		opendir($upload_path);
	}
	$file = $_FILES['fupload']['name'];
	$tmp  = $_FILES['fupload']['tmp_name'];	
	$id_registrasi=kdauto(registrasi,"RG");
	move_uploaded_file($tmp, $upload_path.$file);	
	$sql=mysql_query("update registrasi set nama_lengkap='$_POST[nm_lengkap]',
											jk='$_POST[jk]',
											tmp_lahir='$_POST[tmpt_lhir]',
											tgl_lahir='$_POST[tahun]-$_POST[bulan]-$_POST[tanggal]',
											umur='$_POST[umur]',
											alamat='$_POST[alamat]',
											tamatan='$_POST[tamatan]',
											jurusan='$_POST[jurusan]',
											ipk='$_POST[ipk]',
											email='$_POST[email]',
											password='$_POST[password]',
											foto='$file' where id_registrasi='$_GET[nodaftar]'");

	?>
<div style=\"font-size:14px;color:red\"><img src='images/loading.gif' width='400' height='50'><h3>Pelase Wait ...</h3></div>		
<?			
		if($sql){				   
		?>  <br><br><center>
			<meta http-equiv='refresh' content='2;URL=?page=view_registrasi&nodaftar=<?echo$_GET[nodaftar];?>'>
			</center>
			<?
		} else {
			$error = "<div style=\"font-size:14px;color:red\">Data Gagal Disimpan</div>";?>
			
			<meta http-equiv='refresh' content='2;URL=?page=view_registrasi&nodaftar=<?echo$_GET[nodaftar];?>'>
			<?
		}
			//echo "<script>window.location = '?page=formulir'</script>";
}else{
?>
<div class="content_title_01">My Account</div>
<form method="post" action="?page=view_registrasi&nodaftar=<?echo $_GET[nodaftar];?>&update=ok" enctype='multipart/form-data' onSubmit="return validasi(this)">
<table width='100%'>
<?
if(!empty($r[foto])){
echo"<div class='foto'><img src='foto_calon/$r[foto]' width='130' height='160'></div>";
}else{
echo"<div class='foto'><img src='images/nofoto.jpg' width='130' height='160'></div>";
}
?>
<div>
<tr><td> No Registrasi</td><td><input type='text' name='no_registrasi' value='<?echo $_GET[nodaftar];?>' disabled></td></tr> 
<tr><td> Nama Lengkap</td><td><input type='text' name='nm_lengkap' value='<?echo $r[nama_lengkap];?>' ></td></tr> 
<tr><td height="48">Jenis Kelamin </td>
<?
$jk=$r[jk];
if($jk=='pria'){
?>
<td>
<input name="jk" type="radio" checked value="pria"/>Pria
<input name="jk" type="radio" value="wanita"/>Wanita
</td>
<?
}else{
?>
<td>
<input name="jk" type="radio"  value="pria"/>Pria
<input name="jk" type="radio" checked value="wanita"/>Wanita
</td>
<?
}
?></tr>	
<?
$vtgl=substr($r[tgl_lahir],8,2);
$vbln=substr($r[tgl_lahir],5,2);
$vthn=substr($r[tgl_lahir],0,4);
if($vbln==1){$vnm_bln="Januari";}
else if($vbln==2){$vnm_bln="Februari";}
else if($vbln==3){$vnm_bln="Maret";}
else if($vbln==4){$vnm_bln="April";}
else if($vbln==5){$vnm_bln="Mei";}
else if($vbln==6){$vnm_bln="Juni";}
else if($vbln==7){$vnm_bln="Juli";}
else if($vbln==8){$vnm_bln="Agustus";}
else if($vbln==9){$vnm_bln="September";}
else if($vbln==10){$vnm_bln="Oktober";}
else if($vbln==11){$vnm_bln="November";}
else if($vbln==12){$vnm_bln="Desember";}
?>	
<tr><td> Tempat / Tanggal Lahir </td><td><input name="tmpt_lhir" value='<?echo $r[tmp_lahir];?>' type="text"  maxlength="35"/> /
					<?php
						echo "<select name=tanggal>
						<option value='$vtgl'>$vtgl</option>";
							for($no=1;$no<=31;$no++)
							{
								echo "<option value=$no>$no</option>";
							}
						echo "</select>";
						$nama_bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
						echo "<select name=bulan><option value='$vbln'>$vnm_bln</option>";
							for($no=1;$no<=12;$no++)
							{
								echo "<option value=$no>$nama_bln[$no]</option>";
							}
						echo "</select>";
						$thn_skrg=date("Y");
						echo "<select name=tahun><option value='$vthn'>$vthn</option>";
							for($no=1980;$no<=$thn_skrg;$no++)
							{
								echo "<option value=$no>$no</option>"; 
							}
						echo "</select>";
					?> 
					
				</tr>
<tr>
<td> Umur</td><td>
<select name='umur'>
	<option value='<?echo$r[umur];?>'><?echo$r[umur];?> Tahun</option>
	<option value='15'>15 Tahun</option>
	<option value='16'>16 Tahun</option>
	<option value='17'>17 Tahun</option>
	<option value='17'>18 Tahun</option>
	<option value='17'>19 Tahun</option>
</select>	
</tr>				 
<tr><td> Alamat</td><td><input type='text' size='54' value='<?echo $r[alamat];?>' name='alamat'></td></tr> 
<tr><td> Tamatan</td><td><input type='text' value='<?echo $r[tamatan];?>' name='tamatan'></td></tr> 
<tr><td> Jurusan</td><td><input type='text' value='<?echo $r[jurusan];?>' name='jurusan'></td></tr> 
<tr><td> IPK </td><td><input type='text' size='4' maxlength='4' value='<?echo $r[ipk];?>' name='ipk'></td></tr>   
<tr><td> Email</td><td><input type='text' value='<?echo $r[email];?>' name='email'></td></tr> 
<tr><td> Kata Sandi </td><td><input type='text' value='<?echo $r[password];?>' name='password'></td></tr> 
<tr><td>Ganti Foto</td><td><input type='file' name='fupload'></td></tr>
<td></td>
<td><br><button type="submit" name="submit" ><img src="images/update.png" width='18' height='18' /> Update</button></td>
</tr>
</table>  
</div>	
</form>                            
<?}?>
