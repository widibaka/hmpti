
<div class="container marketing text-center d-flex justify-content-center mb-4">
	<div class="col-sm-12 col-md-8 col-lg-6">
			<p class="display-5 mb-4">Anda setuju untuk menjadi peserta event <?php echo $event['judul'] ?>?</p>

		    <!-- START THE FEATURETTES -->

		    <div class="row featurette text-center">
		      <div class="col-md-12">
		        <p class="lead">Dengan menjadi peserta event, Anda (<?php echo $this->session->userdata('name') ?>) menyetujui apabila menerima notifikasi melalui email terkait event ini. Apakah Anda yakin ingin mendaftar sebagai peserta dalam event ini? </p>
		      </div>
		    </div>
		    <div class="col-12 mb-5">
			    <form action="" method="post">
			    	<div class="form-group mb-3">
			    		<input type="hidden" name="konfirmasi" value="yes">
			    		<strong>Nama asli:</strong>
			    		<?php 
			    			$email = $this->session->userdata('email');
			    			$get_pendaftar = $this->Model_pendaftar->check_exists( $email, $id_event );
			    			if ( $get_pendaftar->num_rows() > 0 ) {
			    				$disabled = 'disabled';
			    			}else{
			    				$disabled = '';
			    			}
			    		?>
			    		<input required="" class="form-control" <?php echo $disabled ?> name="nama" placeholder="Nama asli ..." value="<?php 
			    			echo ( $get_pendaftar->num_rows() > 0 ) ? $get_pendaftar->row_array()['nama'] : $this->session->userdata('name') ?>">
			    		<p>Mohon beritahu kami nama asli Anda yang sebenar-benarnya <br>	agar kami dapat mencetak sertifikat untuk Anda di akhir event.</p>





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
								<?php echo str_replace(' ', '', $val) ?>
								<strong><?php echo $val ?>:</strong>
			    			<input type="text" class="form-control mb-3" <?php echo $disabled ?> name="<?php echo $val ?>" placeholder="" required value="<?php 
			    			echo ( !empty( $data_tambahan_baru[ str_replace(' ', '', $val) ] ) ) ? $data_tambahan_baru[ str_replace(' ', '', $val) ] : '' ?>">
			    		<?php endforeach ?>

							<label><span class="text-danger fw-700">(Hati-hati! Form ini hanya dapat diisi satu kali)</span></label>
			    	</div>
			    	<button type="submit" class="btn btn-primary btn-lg">Setuju & Submit</button>
		    		<a href="<?php echo base_url() ?>" class="btn btn-danger btn-lg">Kembali ke Home</a>
			    </form>

			    
		    </div>
	</div>

</div>