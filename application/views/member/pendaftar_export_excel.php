<html>
<head>
	<title>Export Excel</title>
</head>
<body> 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=[Export] Data ". $event['judul'] ." - ". $status .".xls");
	?>
 
	<table border="1">
		<tr>
	        <th>No.</th>
	        <th>Email</th>
	        <th>Nama</th>
	        <th>Kehadiran</th>
	        <th>Pembayaran</th>
	        <th>Bintang</th>
	        <th>Saran</th>
	        <th>Status</th>
					<?php foreach (json_decode($main_data[0]['data_tambahan'], true) as $key => $val): ?>
						<th><?php echo $key ?></th>
					<?php endforeach; ?>
		</tr>
		<?php foreach ($main_data as $key => $val): ?>
			<tr>
				<td><?php echo $key+1 ?></td>
				<td><?php echo $val['email'] ?></td>
				<td><?php echo $val['nama'] ?></td>

				<?php if ( empty($val['kehadiran']) ): ?>
					<td style="background-color: red"><?php echo $val['kehadiran'] ?></td>
				<?php else: ?>
					<td><?php echo base_url() . 'assets/img/pendaftar/' . $val['kehadiran'] ?></td>
				<?php endif ?>

				<?php if ( empty($val['pembayaran']) ): ?>
					<td style="background-color: red"><?php echo $val['pembayaran'] ?></td>
				<?php else: ?>
					<td><?php echo base_url() . 'assets/img/pendaftar/' . $val['pembayaran'] ?></td>
				<?php endif ?>

				<td><?php echo $val['bintang'] ?></td>
				<td><?php echo $val['saran'] ?></td>
				<?php if ( $val['status'] == 'Unset' ): ?>
					<td style="background-color: #eee"><?php echo $val['status'] ?></td>
				<?php elseif ( $val['status'] == 'Valid' ): ?>
					<td style="background-color: green"><?php echo $val['status'] ?></td>
				<?php elseif ( $val['status'] == 'Invalid' ): ?>
					<td style="background-color: red"><?php echo $val['status'] ?></td>
				<?php endif ?>
				<?php foreach (json_decode($main_data[$key]['data_tambahan'], true) as $key => $val): ?>
					<td><?php echo $val ?></td>
				<?php endforeach; ?>
				
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>