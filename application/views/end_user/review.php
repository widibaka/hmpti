
<div class="container marketing d-flex justify-content-center mb-4">
	<div class="col-sm-12 col-md-8 col-lg-6">
			<p class="display-6 mb-4">Review event <?php echo $event['judul'] ?></p>

		    <!-- START THE FEATURETTES -->

		    <div class="row featurette text-left">
		      <div class="col-md-12">
		        <p class="lead">Sebelum memberi ulasan, Anda (<?php echo $this->session->userdata('name') ?>) diharuskan untuk mengunggah bukti keikutsertaan Anda berupa screenshot/foto.</p>
		      </div>
		    </div>
		    <div class="col-12 mb-5">
			    <form action="" method="post" id="reviewForm" enctype="multipart/form-data">
			    	<div class="form-group mb-3">
			    		<div class="form-group mb-3">
			    			<?php 
			    				
			    				if ( $get_pendaftar->num_rows() > 0 ) {
			    					$disabled = 'disabled';
			    				}else{
			    					$disabled = '';
			    				}
			    			?>
			    			<strong>1. Bukti kehadiran:</strong><br>
			    			<img class="mb-2" height="180" src="<?php 
			    				echo ( !empty($get_pendaftar->row_array()['kehadiran']) ) ? base_url('assets/img/pendaftar/') . $get_pendaftar->row_array()['kehadiran'] : base_url('assets/img/no_image.jpg') ?>" id="preview_kehadiran">
			    			<p>
		    					<input name="indikator_kehadiran" type="hidden" class="form-control" id="indikator_kehadiran">
		    					<input name="kehadiran" type="file" class="form-control" id="kehadiran">
		    				</p>

			    		</div>

			    		<div class="form-group mb-3">
			    			<strong>2. Bukti pembayaran </strong>(Hanya untuk event berbayar, abaikan jika gratis)<strong>:</strong><br>
			    			<img class="mb-2" height="180" src="<?php 
			    				echo ( !empty($get_pendaftar->row_array()['pembayaran']) ) ? base_url('assets/img/pendaftar/') . $get_pendaftar->row_array()['pembayaran'] : base_url('assets/img/no_image.jpg') ?>" id="preview_pembayaran">
		    				<p>
		    					<input name="indikator_pembayaran" type="hidden" class="form-control" id="indikator_pembayaran">
		    					<input name="pembayaran" type="file" class="form-control" id="pembayaran">
		    				</p>
			    		</div>

			    		<div class="form-group mb-3">
			    			<strong>3. Rating & Ulasan:</strong><br>
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
			    	<button type="submit" class="btn btn-primary btn-lg">Submit</button>
		    		<a href="<?php echo base_url() ?>" class="btn btn-danger btn-lg">Kembali ke Home</a>
			    </form>

			    
		    </div>
	</div>

</div>