
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

			    		<strong>Nomor HP / Whatsapp (opsional):</strong>
			    		<input <?php echo $disabled ?> type="text" class="form-control" name="hp" placeholder="No. HP ..."  value="<?php 
			    			echo ( !empty($get_pendaftar->row_array()['hp']) ) ? $get_pendaftar->row_array()['hp'] : '' ?>">

			    		<label class="h6">Mohon beritahu kami nama asli Anda yang sebenar-benarnya agar kami dapat mencetak sertifikat untuk Anda di akhir event. <br><span class="text-danger">(Hati-hati! Hanya dapat diinputkan sekali di setiap event)</span></label>
			    	</div>
			    	<button type="submit" class="btn btn-primary btn-lg">Setuju & Submit</button>
		    		<a href="<?php echo base_url() ?>" class="btn btn-danger btn-lg">Kembali ke Home</a>
			    </form>

			    
		    </div>
	</div>

</div>