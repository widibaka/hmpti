<div class="container marketing">

    <p class="display-5 mb-4">Credits</p>
    

    <!-- START THE FEATURETTES -->

    <div class="row featurette mb-5">
      <div class="col-md-12">
        
        <?php foreach ($developers as $key => $team): ?>
        <div class="col-12" style="height: 60px"></div>
        <h2 class="h2 pl-3 mb-4">[<?php echo $team['tahun'] ?>] <?php echo $team['judul'] ?></h2>
        <h3 class="h3 pl-3"><?php echo $team['leader'] ?> - <i>project leader</i></h3>
        <ul>
        <?php foreach ($team['members'] as $key => $val): ?>
        	<h3 class="h3 pl-3"><li><?php echo $val ?> - <i>member</i></li></h3>
        <?php endforeach ?>
        </ul>
        <?php endforeach ?>

      </div>
    </div>

    <!-- /END THE FEATURETTES -->

</div><!-- /.container -->