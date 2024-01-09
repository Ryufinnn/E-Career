<?
// Modul hubungi kami
if ($_GET['page']=='contact'){
 
  echo "<div id='content'><h4 class='heading colr'>&#187; Kontak Kami</h4>"; 
  echo "<b> Hubungi kami secara online dengan mengisi form di bawah ini:</b>
        <table width=100% style='border: 0pt dashed #0000CC;padding: 10px;'>
        <form action='?page=contact&act=simpan' method=POST>
        <tr><td><span class='table4'>Nama:</td><td>  <input type=text class='isikoment3' name=nama size=40></td></tr>
        <tr><td><span class='table4'>Email:</td><td>  <input type=text class='isikoment3' name=email size=40></td></tr>
        <tr><td><span class='table4'>Subjek:</td><td>  <input type=text class='isikoment3' name=subjek size=55></td></tr>
        <tr><td valign=top><span class='table4'>Pesan:</td><td><textarea class='isikoment3' name='pesan'  style='width: 410px; height: 100px;'></textarea></td></tr>
        </td><td></td><td><button  type=submit  class='button green'><img src='images/contact.png' width='15' height='15' > Send</button></td></tr>
        </form></table><br />"; 
            
}
if ($_GET['page']=='contact' and $_GET[act]=='simpan'){


$nama=trim($_POST[nama]);
$email=trim($_POST[email]);
$subjek=trim($_POST[subjek]);
$pesan=$_POST[pesan];

if (empty($nama)){
  echo "<span class='table8'>Anda belum mengisikan NAMA<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";
}
elseif (empty($email)){
  echo "<span class='table8'>Anda belum mengisikan EMAIL<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";
}
elseif (empty($subjek)){
  echo "<span class='table8'>Anda belum mengisikan SUBJEK<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";
}
else{

  mysql_query("INSERT INTO contact(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
  echo "<b>Terima kasih telah menghubungi kami. <br /> Kami akan segera meresponnya.</b></p>";
	

  
	}
	}
?>
</div>