<?php
session_start();
include"koneksi.php";
include"config/kodeauto.php";
include "config/fungsi_indotgl.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Design By Nilla & Ismet</title>
<meta name="keywords" content="free website templates, hotel and travel, CSS, XHTML, design layout" />
<meta name="description" content="E CAREER - free website template provided by templatemo.com" />
<link href="style/style.css" rel="stylesheet" type="text/css" />
<link href="style/nav.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	
function harusangka(jumlah){ // fungsi untuk harus angka pada text
  var karakter = (jumlah.which) ? jumlah.which : event.keyCode
  if (karakter > 31 && (karakter < 48 || karakter > 57))
    return false;

  return true;
}
</script>
</head>
<body>
<div id="templatemo_container">
	<!-- Free Website Template by www.TemplateMo.com -->
    <div id="templatemo_header">
	<img src="images/header.jpg" width='1050' height='215' >
    </div> <!-- end of header -->
    
    
    <nav id="topNav">
        	<ul>
              <li><a href="./" ><img src="images/home.png" width='15' height='15' > Home</a></li>
              <li><a href="?page=profile" ><img src="images/user.ico" width='15' height='15' > &nbsp;Profile</a> </li>
              <li><a href="?page=contact" title="">&nbsp;&nbsp;&nbsp;<img src="images/contact.png" width='15' height='15' > &nbsp;Contact</a></li>
              <?
			  if(empty($_SESSION[username])){
			  ?>
			  <li><a href="?page=registrasi"><img src="images/daftar.png" width='15' height='15' > Registrasi</a></li>
			  <?}else{}?>
			  <li><a href="?page=lowongan"><img src="images/lowongan.png" width='19' height='15' > Lowongan</a></li>
			  
				<li><a><form action='?page=cari_lowongan' method='post'>Search <input  name="kata" placeholder=' Cari Perusahaan,Lowongan,dll' value='<?echo$_REQUEST[kata];?>' type="text" style="width:250px;" />	
			    &nbsp;<button class='cari' style="width:40px;text-align:center;"> Go</button></form></a></li>
		  </ul>
    </nav>
    <div id="templatemo_content">    
    	<div id="content_left">
        	<div class="content_left_section">
            	
				<?php
				if(!empty($_SESSION[username])){				
				?>
				<h3><img src="images/chat1.png" width='20' height='20' > Hallo <?echo$_SESSION[namalengkap];?> !</h2>
                <div class='menu_left'><a href="./" class="last"><img src="images/left.png" width='15' height='10' > Home</a></div>
                <div class='menu_left'><a href="?page=setting_akun" class="last"><img src="images/left.png" width='15' height='10' > Setting Akun</a></div>
				<div class='menu_left'><a href="./logout.php" class="last"><img src="images/left.png" width='15' height='10' > Log Out</a></div>											
				<?php
				}else{
				?>
				<div class='menu_left'>&#187; Login Your Account Here</div>
				<form method="post" action="cek_login.php">
                        <table width='300' border='0'>
						<div class="form_row">
							<tr>
								<td width='110'>Email / User Name</td>
								<td>: </td>
								<td>
									<input class="inputfield" name="username"  type="text" style="width:140px;" />
								</td>
							</tr>
							<tr>
								<td>Level</td>
								<td>:</td>
								<td>
									<select name='level' style="width: 146px;" >
									<option value='user'>User</option>
									<option value='perusahaan'>Perusahaan</option>
									<option value='admin'>Admin</option>
									</select>
								</td>
							<tr>
								<td>Password</td>
								<td>:</td>
								<td>
									<input class="inputfield" name="password"  type="password" style="width: 140px;" />
								</td>
							 <tr> 
							  <td></td><td></td><td>
							  <br>&nbsp;<button type='submit'><img src="images/login.png" width='15' height='15' /> Masuk</button></div> </td>                       
                            </tr>
						  </div>
						</table>
                      </form>  
				
				
				<?	
				}
				?>
				
				<div class='kotak_judul_left'>
				<div class='judul_left'><img src="images/lowongan.png" width='15' height='15' > Lowongan Terbaru</div>
				
				<marquee-off onmouseover=this.stop() height=250  onmouseout=this.start() BEHAVIOR=alternate  direction="down" >
				<?
				$tampil=mysql_query("SELECT * FROM lowongan,perusahaan where lowongan.id_perusahaan=perusahaan.id_perusahaan ORDER BY id_lowongan DESC limit 4");
				$no=1;
				while ($r=mysql_fetch_array($tampil)){
				$tgl=tgl_indo($r[tgl_lowongan]);
				?>
				<div class='isi_left'>
				<img src="foto_lowongan/<?echo$r[foto];?>" width='50' height='50' />
				<div class='title_perusahaan1'><b><?echo$r[nama_p];?></b></div>
				<?echo$tgl;?> - <?echo$r[alamat];?><br>
				<a href='?page=detail_lowongan&id=<?echo$r[id_lowongan];?>&idp=<?echo$r[id_perusahaan];?>'> Continue Reading >> </a>
				</div>	
				<?
				}
				
				?>
				
				
				</marquee>				
				</div>
             </div> 
        </div> <!-- end of content left -->
        
        <div id="content_right">
        
        	<div class="content_right_section">
			
			<?php
			$page=$_GET[page];
			if($page=='registrasi'){
			include"modul/mod_registrasi/registrasi.php";
			}
			else if($page=='view_registrasi'){
			include"modul/mod_registrasi/view_registrasi.php";
			}
			else if($page=='setting_akun'){
			include"modul/mod_registrasi/edit_akun.php";
			}
			else if($page=='profile'){
			include"profile.php";
			}
			else if($page=='contact'){
			include"contact.php";
			}
			else if($page=='lowongan'){
			include"lowongan.php";
			}
			else if($page=='cari_lowongan'){
			include"cari_lowongan.php";
			}
			else if($page=='detail_lowongan'){
			include"detail_lowongan.php";
			}
			else if($page=='info'){
			include"info_terbaru.php";
			}
			else if($page='home'){
			?>
            <div class="content_title_01">&#187; Welcome to  Website E Career</div>
            <div class="content_right">
            
            <p> <font size='4'>Di sini dapat mempermudah anda dalam pencarian lowongan pekerjan untuk menunjang anda dalam memenuhi kebutuhan hidup
			 yang mana dengan pesatnya perkembangan teknologi dan ditambah perkembangan penduduk yang sangat besar membuat susahnya dalam
			  pencarian kerja. untuk itu kami merancang sebuah web yang memudahkan masyarakat dalam mendapatkan informasi lowongan pekerjaan.</font></p>
       	    </div>
       	    </div>
		<?}?>
        </div> <!-- end of content right -->
        
        <div class="cleaner">&nbsp;</div>
    </div>
    
    <div id="templatemo_footer">
    Copyright &copy; 2013 by: <a href="#">Nilla Rahmayati & Ismet Helmi</a></div>
        <div style="clear: both; margin-top: 10px;">                
            <a href="http://validator.w3.org/check?uri=referer"></a>
            <a href="http://jigsaw.w3.org/css-validator/check/referer"></a>        </div> 
</div> <!-- end of footer -->
</body>
</html>