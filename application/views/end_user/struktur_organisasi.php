
		  <!-- Marketing messaging and featurettes
		  ================================================== -->
		  <!-- Wrap the rest of the page in another container to center all the content. -->

		  <div class="d-flex justify-content-center">
		  	<div class="container marketing">

		  	  <!-- Three columns of text below the carousel -->
		  	  <!-- <style type="text/css"> *{border: solid 1px red;} </style> -->
		  	  
		  	    <div class="col-12">
		  	      <h1 class="text-center mb-4 headline-event display-3"><strong>Struktur Organisasi</strong></h1>
		  	    </div>

		  	    <div style="margin: 60px"></div>

		  	    <?php foreach ($divisi as $key => $div): ?>
		  	    	<div class="divisi row">
		  	    	  <div class="col-lg-4 text-start">
		  	    	    <h2><?php echo $div['nama_divisi'] ?> <a href="<?php echo base_url() . "p/divisi/" . $div['id_divisi'] ?>"><i class="link_ke_profil fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Buka informasi tentang divisi ini"></i></a></h2>
		  	    	  </div>
		  	    	  <div class="col-lg-8 row text-center">
		  	    	    <?php 
		  	    	    	$jabatan = $this->Model_jabatan->get( $div['id_divisi'] )->result_array();
		  	    	    	
		  	    	    ?>
		  	    	    <?php foreach ($jabatan as $key => $jab): ?>
		  	    	    	<?php 
		  	    	    		$members = $this->Model_member->get( $jab['id_jabatan'] )->result_array();
		  	    	    	?>
		  	    	    	<?php foreach ($members as $key => $m): ?>
		  	    	    		<div class="d-flex justify-content-center">
		  	    	    			<div class="col-12 mb-3 d-flex justify-content-center">
													<a class="text-dark w-100" href="<?php echo base_url() . "p/profil/" . $m['nim'] ?>" style="text-decoration: none;" data-bs-toggle="##tooltip" data-bs-placement="top" title="" data-bs-original-title="Buka Profil">
														<div class="border hover-shadow member p-3" style="border-radius: 10px;">
															<div class="row d-flex justify-content-center">
																<div class="rounded-circle border shadow my-2" style="
																	width: 65px; 
																	height: 65px; 
																	background-image: url('<?php echo (!empty($m['image'])) ? base_url() . 'assets/img/members/' . $m['image'] : base_url() . 'assets/img/members/no_photo.png'; ?>');
																	background-repeat: no-repeat;
																	background-size: cover;
																	background-position: center;
																">
																</div>
																<h4>
																	<?php echo $m['nama'] ?>
																		<!-- <i class="link_ke_profil fas fa-info-circle"></i> -->
																</h4>
															</div>
															<p><?php echo $jab['nama_jabatan']; ?></p>
														</div>
													</a>
		  	    	    			</div>
		  	    	    		</div>
		  	    	    		
		  	    	    	<?php endforeach ?>
		  	    	    <?php endforeach ?>
		  	    	  </div>
		  	    	</div> <!-- /.divisi -->
		  	    <?php endforeach ?>

		  	  
		  	</div><!-- /.container -->
		  </div>
		  
