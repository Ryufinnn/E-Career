<?
$page=$_GET[page];
$save=$_GET[save];
$act=$_GET[act];


if ($page='registrasi' AND $save=='ok'){

     if(empty($_POST[nm_lengkap]) or empty($_POST[jk]) or empty($_POST[tmpt_lhir])){
	 echo"<script>alert('Maaf, Data Anda Belum Lengkap !');window.location='?page=registrasi'</script>";
	 }else{
	//untuk memindahkan file ke tempat uploadan
	$upload_path = "foto_calon/";
	// handle aplikasi : apabila folder yang dimaksud tidak ada, maka akan dibuat
	if (!is_dir($upload_path)){
		mkdir($upload_path);
		opendir($upload_path);
	}
	$file = $_FILES['fupload']['name'];
	$tmp  = $_FILES['fupload']['tmp_name'];	
	
	$upload_path_lampiran = "lampiran/";
	$lampiran = $_FILES['lampiran']['name'];
	$tmp_lampiran  = $_FILES['lampiran']['tmp_name'];
	move_uploaded_file($tmp_lampiran, $upload_path_lampiran.$lampiran);	// lampiran
	
	$id_registrasi=kdauto(registrasi,"RG");
	
	move_uploaded_file($tmp, $upload_path.$file);	// foto
	$sql=mysql_query("INSERT INTO registrasi(id_registrasi,nama_lengkap,jk,tmp_lahir,tgl_lahir,umur,alamat,tamatan,jurusan,ipk,lampiran,email,password,foto) 
	VALUES('$id_registrasi','$_POST[nm_lengkap]','$_POST[jk]','$_POST[tmpt_lhir]','$_POST[tahun]-$_POST[bulan]-$_POST[tanggal]','$_POST[umur]','$_POST[alamat]','$_POST[tamatan]','$_POST[jurusan]','$_POST[ipk]','$lampiran','$_POST[email]','$_POST[password]','$file')");
	}
	?>
<div style=\"font-size:14px;color:red\"><img src='images/loading.gif' width='400' height='50'><h3>Pelase Wait ...</h3></div>		
<?			
		if($sql){				   
		?>  <br><br><center>
			<meta http-equiv='refresh' content='2;URL=?page=view_registrasi&nodaftar=<?echo $_POST[no_registrasi];?>'>
			</center>
			<?
		} else {
			$error = "<div style=\"font-size:14px;color:red\">Data Gagal Disimpan</div>";?>
			
			<meta http-equiv='refresh' content='2;URL=?page=registrasi'><?
		}
			//echo "<script>window.location = '?page=formulir'</script>";
}else{
?>
<div class="content_title_01">Form Registrasi</div>
<form method="post" action="?page=registrasi&save=ok" enctype='multipart/form-data' onSubmit="return validasi(this)">
<table>
<div class='foto'><img src='images/nofoto.jpg' width='130' height='160'></div>
<div>
<h4>Silahkan Isi Data Anda Disini</h4>
<tr><td> No Registrasi</td><td><input type='text' name='no_registrasi' value='<?echo kdauto(registrasi,"RG");?>' readonly></td></tr> 
<tr><td> Nama Lengkap</td><td><input type='text' name='nm_lengkap'></td></tr> 
<tr><td height="48">Jenis Kelamin </td>
<td><input name="jk" type="radio" value="pria"/>Pria
<input name="jk" type="radio" value="wanita"/>Wanita
</td></tr>		
<tr><td> Tempat / Tanggal Lahir </td><td><input name="tmpt_lhir" type="text"  maxlength="35"/> /
					<?php
						echo "<select name=tanggal><option value=0>Tanggal</option>";
							for($no=1;$no<=31;$no++)
							{
								echo "<option value=$no>$no</option>";
							}
						echo "</select>";
						$nama_bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
						echo "<select name=bulan><option value=0>Bulan</option>";
							for($no=1;$no<=12;$no++)
							{
								echo "<option value=$no>$nama_bln[$no]</option>";
							}
						echo "</select>";
						$thn_skrg=date("Y");
						echo "<select name=tahun><option value=0>Tahun</option>";
							for($no=1980;$no<=$thn_skrg;$no++)
							{
								echo "<option value=$no>$no</option>"; 
							}
						echo "</select>";
					?> 
					
				</tr>
<tr>
<td> Umur</td>
<td><select name='umur'>
	<option value='Pilih Umur Anda'>Pilih Umur Anda</option>
	<option value='15'>15 Tahun</option>
	<option value='16'>16 Tahun</option>
	<option value='17'>17 Tahun</option>
	<option value='17'>18 Tahun</option>
	<option value='17'>19 Tahun</option>
	
</tr>				 
<tr><td> Alamat</td><td><input type='text' size='54' name='alamat'></td></tr> 
<tr><td> Tamatan</td><td><input type='text' name='tamatan'></td></tr> 
<tr><td> Jurusan</td><td><input type='text' name='jurusan'></td></tr> 
<tr><td> IPK </td><td><input type='text' size='4' maxlength='4' name='ipk'></td></tr>  
<tr><td>Lampirkan File</td><td><input type='file' name='lampiran'></td></tr> 
<tr><td> Email</td><td><input type='text' name='email'></td></tr> 
<tr><td> Kata Sandi Baru</td><td><input type='password' name='password'></td></tr> 
<tr><td> Ulangi Kata Sandi</td><td><input type='password' name='konf_pass'></td></tr>
<tr><td>Foto</td><td><input type='file' name='fupload'></td></tr>
<td></td>
<td><br><button type="submit" name="submit" ><img src="images/daftar.png" width='20' height='20' /> Sign Up</button>
&nbsp;<button type="reset" name="reset" ><img src="images/back.png" width='20' height='20' /> Clear</button></td>
</tr>
</table>  
</div>	
</form>
			
                    
            

<?}?>
