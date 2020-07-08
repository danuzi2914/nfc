<!DOCTYPE html>
<html>
<head>
	<title>DATA BARU HELPDESK</title>
</head>
<body>
	<center>
		<h1>DAFTAR ANGGOTA HELPDESK</h1>
		<h3>Tambah Data Baru</h3>
	</center>
	<form action="<?php echo base_url().'crud/tambah_aksi';?>"method="post">
		<table style="margin: 20px auto;">
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" placeholder="Masukan Nama Lengkap"></td>
			</tr>
			<tr>
				<td>NIM/NIP</td>
				<td><input type="text" name="nim" placeholder="Masukan NIM/NIP"></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><input type="text" name="status"></td>
			</tr>
			<tr>
				<td>No.HP</td>
				<td><input type="text" name="nohp"></td>
			</tr>
			<tr>
				<td>Fakultas / Unit Kerja</td>
				<td><input type="text" name="fakultas"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>
</body>
</html>