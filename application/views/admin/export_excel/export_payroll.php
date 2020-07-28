<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 0.5px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
		$dat = "Recap_payroll_".date('d/m/Y')."_".substr(md5(time()), 0, 4).".xls";
	// header("Content-type:application/vnd.ms-excel");
	// header("Content-Disposition: attachment; filename=".$dat);
		
		header('Content-type: application/vnd.ms-excel');
		header("Content-Disposition: attachment; filename=".$dat);
	?>

	<center>
		<p>Desktop Publishing <?= date('d/m/Y')?></p>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Name</th>
			
			<th>Month</th>
			<th>Total Earnings</th>
			<th>Status</th>
			
		</tr>
		<?php 
		// koneksi database
		$query = $this->db->query("SELECT nama_lengkap as namar, karyawan_id FROM karyawan")->result();
		$query2 = $this->db->query("SELECT `payroll_id`, `karyawan_id`, `tanggal`, `status`, `jumlah` FROM `payroll`")->result();
        ?>
		<?php $no=1; foreach($query as $row){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo ucfirst($row->namar); ?></td>
			
			<td><?php echo date('F') ?></td>
			<td>
			<?php $stat = "<p style='text-align:right'>-</p>";?>

			<?php foreach($query2 as $pay){
				if ($row->karyawan_id == $pay->karyawan_id){
				$stat = $pay->jumlah;
				}
			}echo $stat?>
			</td>
			<td>
			<?php $stat = "Unpaid";?>

			<?php foreach($query2 as $pay){
				if ($row->karyawan_id == $pay->karyawan_id){
				if(($pay->status == "terbayar") && (date('F',strtotime($pay->tanggal)) == date('F'))){$stat= "Paid";}
				else{$stat = "Unpaid";}
				}
			} echo $stat;?>
			</td>
			
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>