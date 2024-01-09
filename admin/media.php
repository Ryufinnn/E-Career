<?php
session_start();
if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser])){
  echo "<link href='../config/adminstyle.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../><b>LOGIN</b></a></center>";
}
else{
?>

<html>
<head>
<title>::: Design By Nilla & Ismet :::</title>
<link href="../config/adminstyle.css" rel="stylesheet" type="text/css" />
<link href="../style/nav.css" rel="stylesheet" type="text/css" />
</head>
<body>
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
<script language="javascript" type="text/javascript">
    <!--
    function MM_jumpMenu(targ,selObj,restore){// v3.0
     eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
    if (restore) selObj.selectedIndex=0;
    }
    //-->
   </script>
<div id="main">
<img src="images/header.jpg" width="1024" height="200">
<nav id="topNav">
        	<ul>
			<?
			if($_SESSION[leveluser]=='admin'){
			?>
              <li><a href="?module=home" ><img src="images/home.png" width='15' height='15' > Home</a></li>
              <li><a href="?module=user" ><img src="images/user.ico" width='15' height='15' > &nbsp;Setting User</a> </li>
              <li><a href="?module=hubungi" title="">&nbsp;&nbsp;&nbsp;<img src="images/contact.png" width='15' height='15' > &nbsp;Contact</a></li>
              <li><a href="?module=pendaftaran"><img src="images/daftar.png" width='15' height='15' > Data Pendaftaran</a></li>
              <li><a href="?module=perusahaan"><img src="images/daftar.png" width='15' height='15' > Data Perusahaan</a></li>
			  <li><a href="?module=lowongan"><img src="images/lowongan.png" width='19' height='15' >  Lowongan</a></li>
			  <li><a href="logout.php" class="last"><img src="images/logout.png" width='16' height='15' > Log Out</a></li>
			  <?
			  }else{
			  ?>
			  <li><a href="?module=home" ><img src="images/home.png" width='15' height='15' > Home</a></li>
              <li><a href="?module=acount" ><img src="images/user.ico" width='15' height='15' > &nbsp;Setting Account</a> </li>
			  <li><a href="?module=lowongan_perusahaan"><img src="images/lowongan.png" width='19' height='15' > Daftar Lowongan</a></li>
			  <li><a href="logout.php" class="last"><img src="images/logout.png" width='16' height='15' > Log Out</a></li>
			  <?
			  }
			  ?>
			</ul>
    </nav>
  <div id="content">
		<?php include "content.php"; ?>
  </div>


		
</div>
<div id="footer">
<br><center>Copyright &copy; <a href="../">2014 Design By Nilla & Ismet</a></center><br>
		</div>
</body>
</html>
<?php
}
?>
