
<div class="content_right">
<h2>&#187; Cari Pekerjaan Dengan Kata : <?echo$_REQUEST[kata];?> </h2>
<table border='0' width='700'>

<?
$tampil=mysql_query("SELECT distinct(lowongan.id_lowongan) as id_lowongan,lowongan.id_perusahaan,deskripsi,id_lowongan,tgl_lowongan FROM lowongan,perusahaan where 
lowongan.id_perusahaan=perusahaan.id_perusahaan  and 
perusahaan.nama_p like '%$_POST[kata]%' or lowongan.deskripsi like '%$_POST[kata]%' order by lowongan.id_lowongan asc ");
$no=1;
while ($r=mysql_fetch_array($tampil)){
$tgl=tgl_indo($r[tgl_lowongan]);
$sql=mysql_query("SELECT * from perusahaan where id_perusahaan='$r[id_perusahaan]' ");
$f=mysql_fetch_array($sql);
?>
<tr><td>
<img src="foto_lowongan/<?echo$f[foto];?>" width='130' height='130' />
<div class='title_perusahaan1'><b><?echo$f[nama_p];?></b></div>
<?echo$tgl;?> - <?echo$f[alamat];?>
<p><?echo substr($r[deskripsi],0,350);?> <a href='?page=detail_lowongan&id=<?echo$r[id_lowongan];?>'> Continue Reading >> </a></p>
</td></tr>
<?
}
?>
</table>
</div>