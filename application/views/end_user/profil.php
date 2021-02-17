
		  <!-- Marketing messaging and featurettes
		  ================================================== -->
		  <!-- Wrap the rest of the page in another container to center all the content. -->

		  <div class="container marketing">

		    <p class="display-5 mb-4">Profil</p>

		    <!-- START THE FEATURETTES -->

		    <div class="row featurette mb-5">
		      <div class="col-md-7">
		        <h2 class="featurette-heading"><?php echo $nama ?></h2>
		        	<p class="lead">Jabatan: <?php echo $this->Model_jabatan->id_to_jabatan( $id_jabatan ); ?></p>
		        <?php $kontak = explode(",", $kontak); ?>
		        <?php foreach ($kontak as $key => $k): ?>
		        	<p class="lead"><?php echo $k ?></p>
		        <?php endforeach ?>
		        <p class="lead"><?php echo $deskripsi ?></p>
		      </div>
		      <div class="col-md-5">
		      	<div class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto rounded-3 overflow-hidden" style="
		      			width: 500px; 
		      			height: 500px; 
		      			background: url('<?php echo base_url() . "assets/img/members/" . $image ?>');
		      			background-size: cover;
		      			background-repeat: no-repeat;
		      			background-position: center;
		      	">
		      		<img src="<?php echo base_url() . "assets/img/members/" . $image ?>" style="opacity: 0; width: 100%; height: 100%;">
		      	</div>

		      </div>
		    </div>

		    <!-- /END THE FEATURETTES -->

		  </div><!-- /.container -->

