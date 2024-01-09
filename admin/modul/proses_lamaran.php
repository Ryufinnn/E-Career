<?
session_start();
$page=$_GET[page];
$update=$_GET[update];
$act=$_GET[act];
$sql=mysql_query("SELECT * FROM lowongan,perusahaan,lamaran,registrasi where lamaran.id_lowongan=lowongan.id_lowongan 
	and registrasi.id_registrasi=lamaran.id_registrasi
	and lowongan.id_perusahaan=perusahaan.id_perusahaan 
	and perusahaan.id_perusahaan='$_SESSION[id_perusahaan]' and lamaran.id_lowongan='$_GET[id]'");
$r=mysql_fetch_array($sql);
$tgl=tgl_indo($r[tgl_lahir]);
?>
<?
$page=$_GET[module];
$terima=$_GET[terima];
$tolak=$_GET[tolak];
if($page=='proses_lamaran' and $terima=='ok'){
mysql_query("update  lamaran set status='Diterima' where id_perusahaan='$_GET[idp]' and id_registrasi='$_GET[idr]' and id_lowongan='$_GET[id]' ");
$subjek="Informasi Penerimaan";
$pesan="Selamat Saudara $r[nama_lengkap], lamaran anda diterima , dan silahkan ikuti test interview pada tanggal yang telah di tentukan !";
mail($r[email],$subjek,$pesan,"From: infokerja@ecareer.com");
echo"<script>window.location.href='?module=proses_lamaran&id=$_GET[id]&idp=$_GET[idp]'</script>";
}
if($page=='proses_lamaran' and $tolak=='ok' ){
mysql_query("update  lamaran set status='Tidak Diterima' where id_perusahaan='$_GET[idp]' and id_registrasi='$_GET[idr]' and id_lowongan='$_GET[id]' ");
$subjek="Informasi Penerimaan";
$pesan="Mohon maaf Saudara $r[nama_lengkap], lamaran anda tidak diterima";
mail($r[email],$subjek,$pesan,"From: infokerja@ecareer.com");				 
echo"<script>window.location.href='?module=proses_lamaran&id=$_GET[id]&idp=$_GET[idp]'</script>";
}
?>
<div class="content_title_01">&#187; Detail Data Pelamar</div>
<div class='view'>
<table class='view' width='80%'>
<center>
<a  onclick="return confirm('Anda yakin terima data pelamar ini, konfirmasi penerimaan akan dikirim ke email pelamar ?');" href='?module=proses_lamaran&terima=ok&id=<?echo$_GET[id];?>&idp=<?echo$r[id_perusahaan];?>&idr=<?echo$r[id_registrasi];?>' ><button style='width:155px;text-align:center;' class='tombol'> Terima Lamaran Ini</button></a>
&nbsp;
<a  onclick="return confirm('Anda yakin tolak data pelamar ini ?');"  href='?module=proses_lamaran&tolak=ok&id=<?echo$_GET[id];?>&idp=<?echo$r[id_perusahaan];?>&idr=<?echo$r[id_registrasi];?>'><button style='width:155px;text-align:center;' class='tombol'> Tolak Lamaran Ini</button></a>
&nbsp;
<a href='?module=preview_pelamar&id=<?echo$_GET[id];?>' ><button style='width:190px;text-align:center;' class='tombol'> Kembali Ke Data Lamaran</button></a>
<h2> Status Lamaran : <b><?echo $r[status];?></b></h2>
</center>
<?
if(!empty($r[foto])){
echo"<div class='foto'><img src='../foto_calon/$r[foto]' width='130' height='160'></div>";
}else{
echo"<div class='foto'><img src='images/nofoto.jpg' width='130' height='160'></div>";
}
?>
<tr><td width='200'> No Registrasi</td><td>: <?echo$r[id_registrasi];?></td></tr> 
<tr><td> Nama Lengkap</td><td>: <?echo $r[nama_lengkap];?></td></tr> 
<tr><td>Jenis Kelamin </td><td>: <?echo $r[jk];?></td></tr>
<tr><td> Tempat / Tanggal Lahir </td><td>: <?echo $r[tmp_lahir];?> / <?echo $tgl;?></td></tr>
<tr><td> Umur</td><td>: <?echo$r[umur];?></td></tr>				 
<tr><td> Alamat</td><td>: <?echo $r[alamat];?></td></tr> 
<tr><td> Tamatan</td><td>: <?echo $r[tamatan];?></td></tr> 
<tr><td> Jurusan</td><td>: <?echo $r[jurusan];?></td></tr> 
<tr><td> IPK </td><td>: <?echo $r[ipk];?></td></tr>   
<tr><td> Email</td><td>: <?echo $r[email];?></td></tr>  
</table>  
</div>	                           

