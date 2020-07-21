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
		$dat = "Desktop_publishing_".date('d/m/Y')."_".substr(md5(time()), 0, 4).".xls";
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
			<th>Email</th>
			<th>No.Whatsapp</th>
			<th>Age</th>
			<th>Job name</th>
			<th>Reason</th>
			<th>Date submitted</th>
		</tr>
		<?php 
		// koneksi database
		$query = $this->db->query("SELECT rfreelance.id_freelance,rfreelance.nama_freelance as namaf, 
        rfreelance.email as emailf, rfreelance.no_wa as nof, rfreelance.umur, 
        rfreelance.cv_freelance as cv, rfreelance.portofolio_freelance as porto, 
        rfreelance.alasan, rfreelance.others, jobs.jobs_name as namaj,rfreelance.approve,
        language_pair.language as namal,rfreelance.tanggal FROM rfreelance LEFT JOIN jobs 
        ON rfreelance.id_job = jobs.id_job LEFT JOIN language_pair on 
        rfreelance.id_lang = language_pair.id_lang where rfreelance.id_job = 3 and COALESCE(rfreelance.deleted,0) = 0");
        ?>
		<?php $no=1; foreach($query->result() as $row){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo ucfirst($row->namaf); ?></td>
			<td><?php echo $row->emailf; ?></td>
			<td><?php echo $row->nof; ?></td>
			<td><?php echo $row->umur; ?></td>
			<td><?php echo ucfirst($row->namaj); ?></td>
			<td><?php echo ucfirst($row->alasan); ?></td>
			<td><?php echo ucfirst($row->tanggal); ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>