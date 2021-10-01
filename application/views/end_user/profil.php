			<?php if ( empty($nama) ): ?>

		  <div class="container marketing">

		    <p class="display-5 mb-4">Profil</p>

		    <!-- START THE FEATURETTES -->

		    <div class="row featurette mb-5">
		      <div class="col-md-7">
		        <h2 class="featurette-heading"><?php echo $nama ?></h2>
		        	<p class="lead">Anggota tidak ditemukan.</p>
		      </div>
		    </div>

		    <!-- /END THE FEATURETTES -->

		  </div><!-- /.container -->
			<?php return; endif ?>
		  <!-- Marketing messaging and featurettes
		  ================================================== -->
		  <!-- Wrap the rest of the page in another container to center all the content. -->

		  <div class="container marketing">

		    <p class="display-5 mb-4">Profil</p>

		    <!-- START THE FEATURETTES -->

		    <div class="row featurette mb-5">
		      <div class="col-md-7">
		        <h2 class="featurette-heading"><?php echo $nama ?></h2>
		        	<p class="lead">Jabatan: <?php 
		        		if ( !empty($id_jabatan) ) {
		        			echo $this->Model_jabatan->id_to_jabatan( $id_jabatan );
		        		}
		        		else{
		        			echo 'Tidak menjabat / nonaktif';
		        		}
		        	?></p>
		        <?php $kontak = explode(",", $kontak); ?>
		        <?php foreach ($kontak as $key => $k): ?>
		        	<p class="lead"><?php echo $k ?></p>
		        <?php endforeach ?>
		        <p class="lead">Kelas: <?php echo $kelas ?></p>
		        <p class="lead"><?php echo $deskripsi ?></p>
		      </div>
		      <div class="col-md-5">
		      	<div class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto overflow-hidden" style="
		      			width: 300px;
		      			height: auto; 
								border-radius: 10px;
		      			background: url('<?php echo (!empty($image)) ? base_url() . 'assets/img/members/' . $image : base_url() . 'assets/img/members/no_photo.png'; ?> ?>');
		      			background-size: cover;
		      			background-repeat: no-repeat;
		      			background-position: center;
		      	">
		      		<img src="<?php echo (!empty($image)) ? base_url() . 'assets/img/members/' . $image : base_url() . 'assets/img/members/no_photo.png'; ?> ?>" style="opacity: 0; width: 100%; height: 100%;">
		      	</div>

		      </div>
		    </div>

		    <!-- /END THE FEATURETTES -->

		  </div><!-- /.container -->

