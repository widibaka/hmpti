
<div class="container marketing d-flex justify-content-center mb-4">
	<div class="col-sm-12 col-md-8 col-lg-6">
			<p class="display-6 mb-4">Review event <?php echo $event['judul'] ?></p>

		    <!-- START THE FEATURETTES -->

		    <div class="row featurette text-left">
		      <div class="col-md-12">
		        <p class="lead">Silakan beri kami ulasan ataupun saran untuk event ini, agar kami menjadi lebih baik</p>
		      </div>
		    </div>
		    <div class="col-12 mb-5">
			    <form action="" method="post" id="reviewForm" enctype="multipart/form-data">
			    	<div class="form-group mb-3">

							
							<?php if( $event['wajib_bukti_kehadiran'] == 1 ) : ?>
								<div class="form-group mb-3">
									<?php 
										
										if ( $get_pendaftar->num_rows() > 0 ) {
											$disabled = 'disabled';
										}else{
											$disabled = '';
										}
									?>
									<strong>Bukti kehadiran:</strong><br>
									<img class="mb-2" height="180" src="<?php 
										echo ( !empty($get_pendaftar->row_array()['kehadiran']) ) ? base_url('assets/img/pendaftar/') . $get_pendaftar->row_array()['kehadiran'] : base_url('assets/img/no_image.jpg') ?>" id="preview_kehadiran">
									<p>
										<input name="indikator_kehadiran" type="hidden" class="form-control" id="indikator_kehadiran">
										<input name="kehadiran" type="file" class="form-control" id="kehadiran" accept="image/png, image/gif, image/jpeg, image/jpg" />
									</p>
									<p>Sebelum memberi ulasan, Anda (<?php echo $this->session->userdata('name') ?>) diharuskan untuk mengunggah bukti keikutsertaan Anda berupa screenshot/foto.</p>

								</div>
							<?php endif; ?>

			    		<div class="form-group mb-3">
			    			<strong>Rating & Ulasan:</strong><br>
			    			<p>Silakan beri kami rating dan ulasan maupun saran untuk event ini sehingga kami dapat menjadi lebih baik.</p>
			    			<div class="my-4">
			    				<div class="form-group">
			    					<input name="bintang" class="form-control" type="number" style="opacity: 0; height: 1px;" autocomplete="off">
			    				</div>
			    				<!-- bintang akan muncul di sini -->
			    			</div>
		    				<div class="form-group">
		    					<textarea name="saran" class="form-control" placeholder="Saran ..."><?php echo $get_pendaftar->row_array()['saran'] ?></textarea>
		    				</div>
			    		</div>

			    	</div>


			    	<?php 
			    	$email = $this->session->userdata('email');
			    	$pendaftar = $this->Model_pendaftar->check_exists( $email, $id_event ); //gak mau ribet wkwkwk ?>
			    	<?php if ( $pendaftar->num_rows() > 0 ): // check, kalau terdaftar, boleh kasih ulasan ?>
			    	    <?php if( $pendaftar->row_array()['status']=='Unset' ): ?>
									<?php if (empty($get_pendaftar->row_array()['kehadiran'])): ?>
									<!-- Solusi sementara gini dulu. Besok upgrade server! -->
			    	      <button type="submit" class="btn btn-primary btn-lg">Submit</button>
									<?php endif ?>
			    	    <?php elseif( $pendaftar->row_array()['status']=='Valid' ): ?>
			    	      <div class="alert alert-success mt-2"><i class="fa fa-check"></i> Review ini dinyatakan Valid dan telah dikunci oleh panitia.</div>
			    	    <?php elseif( $pendaftar->row_array()['status']=='Invalid' ): ?>
			    	      <div class="alert alert-danger mt-2"><i class="fa fa-times"></i> Maaf, review ini dinyatakan Invalid (tidak sah) oleh panitia karena melanggar ketentuan event.</div>
			    	  <?php endif ?>
			    	<?php endif ?>


			    	
		    		<a href="<?php echo base_url() ?>" class="btn btn-primary btn-lg"><i class="fa fa-home"></i> Kembali ke Home</a>
			    </form>

			    
		    </div>
	</div>

</div>