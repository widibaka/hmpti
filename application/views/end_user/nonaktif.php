
	<div class="container marketing">
		<h1 class="text-center mb-4 headline-event display-3"><strong>Anggota nonaktif</strong></h1>
		<div class="d-flex justify-content-center">
			<div class="col-md-4">
				<?php foreach ($anggota_nonaktif as $key => $m): ?>
					<?php echo $m['nim'] ?> - <?php echo $m['nama'] ?> <a href="<?php echo base_url() . "p/profil/" . $m['nim'] ?>"><i class="link_ke_profil fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Buka Profil"></i></a><br>
				<?php endforeach ?>
			</div>
		</div>
	</div>