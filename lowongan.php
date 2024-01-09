
<div class="content_right">
<h2>&#187; Info Pekerjaan Terbaru</h2>
<table border='0' width='700'>

<?
$tampil=mysql_query("SELECT * FROM lowongan,perusahaan where lowongan.id_perusahaan=perusahaan.id_perusahaan  ORDER BY id_lowongan DESC limit 0,5");
$no=1;
while ($r=mysql_fetch_array($tampil)){
$tgl=tgl_indo($r[tgl_lowongan]);
?>
<tr><td>
<img src="foto_lowongan/<?echo$r[foto];?>" width='130' height='130' />
<div class='title_perusahaan1'><b><?echo$r[nama_p];?></b></div>
<?echo$tgl;?> - <?echo$r[alamat];?>
<p><?echo substr($r[deskripsi],0,350);?> <a href='?page=detail_lowongan&id=<?echo$r[id_lowongan];?>&idp=<?echo$r[id_perusahaan];?>'> Continue Reading >> </a></p>
</td></tr>
<?
}
?>
</table>
</div>