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
	$nama="";
	$lang="";
	foreach($ilowongan as $li){
		if($this->input->get('id') == $li->id_ilowongan){
			$nama = $li->ilowongan_alias;
			$lang = $li->ilowongan_name;
		}
		
	}
		$dat = $nama."_".date('d/m/Y')."_".substr(md5(time()), 0, 4).".xls";
	// header("Content-type:application/vnd.ms-excel");
	// header("Content-Disposition: attachment; filename=".$dat);
		
		header('Content-type: application/vnd.ms-excel');
		header("Content-Disposition: attachment; filename=".$dat);
	?>

	<center>
		<p><?= $lang." ".date('d/m/Y')?></p>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Domicile</th>
			<th>No.Whatsapp</th>
			<th>Age</th>
			<th>Job name</th>
			<th>Expectation Salary</th>
			<th>Reason</th>
		</tr>
		<?php $no=1; foreach($lisn as $row){?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo ucfirst($row->namai); ?></td>
			<td><?php echo ucfirst($row->domisili); ?></td>
			<td><?php echo $row->nowa; ?></td>
			<td><?php echo $row->umur; ?></td>
			<td><?php echo ucfirst($row->inama); ?></td>
			<td><?php echo "Rp. ".number_format($row->gaji); ?></td>
			<td><?php echo ucfirst($row->alasan); ?></td>

		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>