<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php //echo $this->session->flashdata("message"); 
        ?>
        <div class="card">
          <div class="card-header">
            <div class="card-header card-header-icon" data-background-color="rose">
              <i class="material-icons">tv</i>
            </div>
          </div>
          <div class="card-content">
            <form action="" id="form" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="form-horizontal">
              <div class="card-content">
                <br>
                <div class="row">
                    <div class="col-xs-6">
                        <input type="hidden" name="posisi_x" id="posisi_x">
                        <p>Koordinat X: <span id="nilaiX">0</span>px</p>
                        <div id="sliderX" class="slider"></div>
                    </div>
                    <div class="col-xs-6">
                        <input type="hidden" name="posisi_y" id="posisi_y">
                        <p>Koordinat Y: <span id="nilaiY">0</span>px</p>
                        <div id="sliderY" class="slider"></div>
                    </div>
                </div>
                <br>
                <div class="row float-center text-center" style="overflow: hidden;">
                  <div class="col-sm-12 mt-4 text-center " style="border: solid 2px red">
                    <img style="width: 100%;" src="<?php 

                    if( !empty($sertifikat['image']) ){
                      echo base_url('assets/image/sertifikat/') . $sertifikat['image']; 
                    }else{
                      echo base_url("assets/dashboard/img/placeholder.jpg");
                    }

                    ?>" alt="...">
                    <span class="nama_peserta text-center" style="width: auto; position: absolute; border: solid 0px red; font-family: Arial; font-size: 3.5vw; font-weight: bold;"><p style=" margin-left:-100%; color: black;">[ Nama Peserta ]</p></span>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn  btn-rose btn-fill btn-wd">Simpan<div class="ripple-container"></div></button>
              </div>
              <div class="text-center">
                <a href="<?php echo base_url('eventcreator_event/sertifikat/'.$this->encryptor->enkrip('enkrip',$id_event)); ?>" class="btn  btn-rose btn-fill btn-wd">Kembali<div class="ripple-container"></div></a>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>