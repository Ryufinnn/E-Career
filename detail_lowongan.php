<?
session_start();
?>
<div class="content_right">
<h2>&#187; Detail Lowongan Pekerjaan</h2>
<?
if(empty($_SESSION[username])){
?>
<img src="images/warning.png" width='20' height='20' /><h3><blink> Maaf, Anda harus login terlebih dahulu untuk melihat detail dari perusahaan ini !, Jika anda belum punya akun silahkan daftar dengan mengklik tombol dibawah. </blink></h3>
<center><button style='width:120px;' onclick=location.href='?page=registrasi'><img src="images/daftar.png" width='15' height='15' /> Daftar Disini</button>
<?
}else{
$cek=mysql_query("SELECT * FROM lamaran where id_lowongan='$_GET[id]' and id_perusahaan='$_GET[idp]' and id_registrasi='$_SESSION[id_registrasi]'");
$jml=mysql_num_rows($cek);
?>

<table border='0' width='700'>
<?
if($jml>0){
?>
<a  onclick="return confirm('Anda yakin akan membatalkan lamaran anda pada perusahaan ini ?');" href='?page=detail_lowongan&batal=ok&id=<?echo$_GET[id];?>&idp=<?echo$_GET[idp];?>' ><button style='width:340px;' class='tombol'><img src="images/hapus.png" width='20' height='20' /> Lamaran Sudah Dikirim, Batalkan Lamaran !</button></a>
<?
}else{
?>
<a  onclick="return confirm('Anda yakin akan mendaftarkan diri anda pada perusahaan ini ?');" href='?page=detail_lowongan&kirim=ok&id=<?echo$_GET[id];?>&idp=<?echo$_GET[idp];?>' ><button style='width:185px;' class='tombol'><img src="images/kirim.png" width='20' height='23' /> Kirim Lamaran Anda !</button></a>
<?
}
$tampil=mysql_query("SELECT * FROM lowongan,perusahaan where lowongan.id_perusahaan=perusahaan.id_perusahaan  and lowongan.id_lowongan='$_GET[id]'");
$no=1;
$r=mysql_fetch_array($tampil);
$tgl=tgl_indo($r[tgl_lowongan]);
?>
<tr><td>
<img src="foto_lowongan/<?echo$r[foto];?>" width='130' height='130' />
<div class='title_perusahaan1'><b><?echo$r[nama_p];?></b></div>
<?echo$tgl;?> - <?echo$r[alamat];?>
<p><?echo$r[deskripsi];?></p>
</td></tr>
<tr><td><p><?echo$r[persaratan];?></p></td></tr>

</table>
<?
}
?>
</div>

<?
$page=$_GET[page];
$kirim=$_GET[kirim];
$batal=$_GET[batal];
if($page=='detail_lowongan' and $kirim=='ok' ){
$tgl=date('Ymd');
$sql_save=mysql_query("insert into lamaran (id_perusahaan,id_registrasi,id_lowongan,tgl_lamaran) 
					  values('$_GET[idp]','$_SESSION[id_registrasi]','$_GET[id]','$tgl') ");
echo"<script>window.location.href='?page=detail_lowongan&id=$_GET[id]&idp=$_GET[idp]'</script>";
}
if($page=='detail_lowongan' and $batal=='ok' ){
$tgl=date('Ymd');
$sql_save=mysql_query("delete from lamaran where id_perusahaan='$_GET[idp]' and id_registrasi='$_SESSION[id_registrasi]' and id_lowongan='$_GET[id]' ");					 
echo"<script>window.location.href='?page=detail_lowongan&id=$_GET[id]&idp=$_GET[idp]'</script>";
}

?>