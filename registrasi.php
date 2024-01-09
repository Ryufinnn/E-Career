
				<div class="content_title_01">Form Registrasi</div>
				<form method="post" action="cek_login.php">
                        <table>
						<div>
						<h3>SILAHKAN ISI DATA ANDA DISINI</h3><hr>

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
<td><select name='Tahun'>
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
<tr><td> IPK </td><td><input type='text' size='4' maxlength='4' name='IPK'></td></tr>   
<tr><td> Email</td><td><input type='text' name='email'></td></tr> 
<tr><td> Kata Sandi Baru</td><td><input type='password' name='password'></td></tr> 
<tr><td> Ulangi Kata Sandi</td><td><input type='password' name='konf_pass'></td></tr>
<tr><td>Foto</td><td><input type='file' name='fupload'></td></tr>
<td></td>
					<td><button type="submit" name="submit" >Sign Up</button>
					<button type="reset" name="reset" >Clear</button></td>
				</tr>
						</table>  
						</div>	
                    </form>
			
                    
            