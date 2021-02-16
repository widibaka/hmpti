
		  <!-- Marketing messaging and featurettes
		  ================================================== -->
		  <!-- Wrap the rest of the page in another container to center all the content. -->

		  <div class="container marketing">

		    <p class="display-5 mb-4"><?php echo $nama_divisi ?></p>

		    <!-- START THE FEATURETTES -->

		    <div class="row featurette">
		      <div class="col-md-7 order-md-2">
		        <p class="lead"><?php echo $deskripsi ?></p>
		      </div>
		    </div>

		    <hr class="featurette-divider">

		    <div style="margin-top: 100px;"></div>

		    <div class="divisi row">
		      <div class="col-lg-4 text-start">
		        <h2>Anggota</h2>
		      </div>
		      <div class="col-lg-8 row text-center">
		        <?php 
		        	$jabatan = $this->Model_jabatan->get( $id_divisi )->result_array();
		        	
		        ?>
		        <?php foreach ($jabatan as $key => $jab): ?>
		        	<?php 
		        		$members = $this->Model_member->get( $jab['id_jabatan'] )->result_array();
		        	?>
		        	<?php foreach ($members as $key => $m): ?>
		        		<div class="col-12 mb-3">
		        			<div class="border shadow member p-3 ml-1">
		        			  <p><?php echo $jab['nama_jabatan']; ?></p>
		        			  <h4><?php echo $m['nama'] ?> <a href="<?php echo base_url() . "p/profil/" . $m['nim'] ?>"><i class="link_ke_profil fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Buka Profil"></i></a></h4>
		        			</div>
		        		</div>
		        	<?php endforeach ?>
		        <?php endforeach ?>
		      </div>
		    </div> <!-- /.divisi -->

		    <hr class="featurette-divider">

		    <div style="margin-top: 100px;"></div>

		    <div class="row">
		      <h2>Program Kerja</h2>
		    </div>

		    <div class="d-flex justify-content-center bg-gray-2 rounded py-4">
		      <div class="container row">

		        <?php foreach ($proker_jamak as $key => $proker): ?>
		        	<div class="col-sm-12 col-md-5 col-lg-3 proker">
		        	  <div class="card shadow mx-1 my-3">
		        	    <div class="card-body">
		        	      <h5 class="card-title"><?php echo $proker['judul'] ?></h5>
		        	      <p class="card-text"><?php echo $proker['deskripsi'] ?></p>
		        	      <p class="card-text"><small class="text-muted"><?php echo $proker['waktu'] ?></small></p>
		        	    </div>
		        	  </div>
		        	</div> <!-- /.proker -->
		        <?php endforeach ?>

		      </div>
		    </div>
		    

		    <div style="margin-top: 100px;"></div>

		    <!-- /END THE FEATURETTES -->

		  </div><!-- /.container -->
