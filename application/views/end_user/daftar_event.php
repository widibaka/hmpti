<style>
.shaking {
  /* Start the shake animation and make the animation last for 0.5 seconds */
  animation: shake 1s;

  /* When the animation is finished, start again */
  animation-iteration-count: infinite;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  50% { transform: translate(18px, 1px) rotate(30deg); }
  100% { transform: translate(1px, 1px) rotate(0deg); }
}
</style>


<div class="container marketing text-center d-flex justify-content-center mb-4">
	<div class="col-sm-12 col-md-8 col-lg-6">
			

				<?php 
					$email = $this->session->userdata('email');
					$get_pendaftar = $this->Model_pendaftar->check_exists( $email, $id_event );
					if ( $get_pendaftar->num_rows() == 0 ) : // Kalau belum mendaftar ?>

							<p class="display-5 mb-4">Anda setuju untuk menjadi peserta event <?php echo $event['judul'] ?>?</p>
							<!-- START THE FEATURETTES -->
							<div class="row featurette text-center">
								<div class="col-md-12">
									<p class="lead">Dengan menjadi peserta event, Anda (<?php echo $this->session->userdata('name') ?>) menyetujui apabila menerima notifikasi melalui email terkait event ini. Apakah Anda yakin ingin mendaftar sebagai peserta dalam event ini? </p>
								</div>
							</div>
							<div class="col-12 mb-5">
								<form action="" method="post" enctype="multipart/form-data">
									<div class="form-group mb-3">
										<input type="hidden" name="konfirmasi" value="yes">
										<strong>Nama asli:</strong>
										
										<input required="" class="form-control mb-3" name="nama" placeholder="Nama asli ..." value="<?php 
											echo ( $get_pendaftar->num_rows() > 0 ) ? $get_pendaftar->row_array()['nama'] : $this->session->userdata('name') ?>">
										
										<?php if ( !empty($event['sertifikat']) ): ?>
											<p>Mohon beritahu kami nama asli Anda yang sebenar-benarnya <br>	agar kami dapat mencetak sertifikat untuk Anda di akhir event.</p>
										<?php endif ?>

										<?php if( $event['apakah_berbayar'] == 1 ) : ?>
											<div class="form-group mb-3">
												<strong>Bukti pembayaran :</strong><br>
												<img class="mb-2" height="180" src="<?php 
													echo ( !empty($get_pendaftar->row_array()['pembayaran']) ) ? base_url('assets/img/pendaftar/') . $get_pendaftar->row_array()['pembayaran'] : base_url('assets/img/no_image.jpg') ?>" id="preview_pembayaran">
												<p>
													<input name="indikator_pembayaran" type="hidden" class="form-control" id="indikator_pembayaran">
													<input name="pembayaran" type="file" class="form-control" id="pembayaran" accept="image/png, image/gif, image/jpeg, image/jpg" required />
												</p>
											</div>
										<?php endif; ?>

										<?php 
											// ini gunanya biar bisa dipanggil di bawah sana nanti
											if ( !empty($get_pendaftar->row_array()['data_tambahan']) ) {
												$data_tambahan = json_decode($get_pendaftar->row_array()['data_tambahan'], true);
												$data_tambahan_baru = [];
												foreach ($data_tambahan as $key => $value) {
													$data_tambahan_baru[str_replace('_', '', $key)] = $value;
												}
											}
										?>

										<?php foreach( array_filter(explode( ',', $event['data_tambahan']) )as $key => $val): ?>
											<strong><?php echo $val ?>:</strong>
											<input type="text" class="form-control mb-3" name="<?php echo $val ?>" placeholder="" required value="<?php 
											echo ( !empty( $data_tambahan_baru[ str_replace(' ', '', $val) ] ) ) ? $data_tambahan_baru[ str_replace(' ', '', $val) ] : '' ?>">
										<?php endforeach ?>

										<label><span class="text-danger fw-700">(Hati-hati! Form ini hanya dapat diisi satu kali)</span></label>
									</div>
									<button type="submit" class="btn btn-success btn-lg">Setuju & Submit</button>
									<a href="<?php echo base_url() ?>" class="btn btn-primary btn-lg"><i class="fa fa-home"></i> Kembali ke Home</a>
								</form>

								
							</div>

					<?php else :  // Kalau sudah mendaftar ?>

							<p class="display-5 mb-4">Anda telah terdaftar di event <?php echo $event['judul'] ?></p>
							<!-- START THE FEATURETTES -->
							<div class="row featurette text-center my-4">
								<div class="col-md-12">
									<i class="fa fa-check-circle text-success shaking" style="font-size: 9rem;"></i>
								</div>
							</div>
							<div class="row featurette text-center my-4">
								<div class="col-md-12" style="word-wrap: break-word;">
									<?php echo $event['pesan_utk_pendaftar'] ?>
								</div>
							</div>
							<div class="col-12 mb-4">
								<a href="<?php echo base_url() ?>" class="btn btn-primary btn-lg"><i class="fa fa-home"></i> Kembali ke Home</a>
							</div>
					<?php endif; ?>

		    
	</div>

</div>