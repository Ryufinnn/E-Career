<?
$page=$_GET[page];
$update=$_GET[update];
$act=$_GET[act];
$sql=mysql_query("select * from registrasi where id_registrasi='$_GET[id]'");
$r=mysql_fetch_array($sql);
$tgl=tgl_indo($r[tgl_lahir]);
?>
<div class="content_title_01">&#187; User Account</div>
<div class='view'>
<table class='view' width='80%'>
<?
if(!empty($r[foto])){
echo"<div class='foto'><img src='../foto_calon/$r[foto]' width='130' height='160'></div>";
}else{
echo"<div class='foto'><img src='images/nofoto.jpg' width='130' height='160'></div>";
}
?>
<tr><td width='200'> No Registrasi</td><td>: <?echo $_GET[id];?></td></tr> 
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

