
<!-- jquery-validation -->
<script src="<?= base_url() ?>assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>assets/adminlte/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/moment/locales.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/adminlte/plugins/select2/js/select2.full.min.js"></script>
<!-- nouslider -->
<script src="<?= base_url() ?>assets/plugin_baru/nouislider/nouislider.js"></script>

<script type="text/javascript">

// preview image before upload
function readURL(input, display) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $(display).attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}
$("#edit_thumbnail").change(function() {
  $("#update_thumbnail").val(1);
  readURL(this, "#edit_preview_thumbnail");
});
$("#edit_poster").change(function() {
  $("#update_poster").val(1);
  readURL(this, "#edit_preview_poster");
});
$("#edit_sertifikat").change(function() {
  $("#update_sertifikat").val(1);
  readURL(this, "#edit_preview_sertifikat");
});
// preview image before upload


  

$(document).ready(function () {

  $('#edit_deskripsi').summernote({
    height: 500, 
    toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['link']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });

  $('#edit_pesan_utk_pendaftar').summernote({
    height: 500, 
    toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['link']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });

  //Timepicker
  $('#timepicker').datetimepicker({
      // inline: true,
      // sideBySide: true,
      locale: 'id',
      icons: {
        time: 'fa fa-clock',
        date: 'fa fa-calendar',
        up: 'fa fa-arrow-up',
        down: 'fa fa-arrow-down',
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-calendar-check-o',
        clear: 'fa fa-delete',
        close: 'fa fa-times'
      }
      
  });

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })

  $('#editForm').validate({
    rules: {
      judul: {
        required: true,
        minlength: 8
      },
      jadwal: {
        required: true,
      },
      deskripsi: {
        required: true,
        minlength: 50
      },
      <?php if ( empty($main_data['id_event']) ): ?>

        poster: {
          required: true,
        },

      <?php endif ?>
    },
    messages: {
      judul: {
        required: "Mohon isi judul event",
        minlength: "Minimal harus 8 digit",
      },
      jadwal: {
        required: "Mohon isi jadwal pelaksanaan event",
      },
      deskripsi: {
        required: "Mohon isi deskripsi",
        minlength: "Minimal harus 50 karakter",
      },
      <?php if ( empty($main_data['id_event']) ): ?>
        
        poster: {
          required: "Harus ada poster",
        },

      <?php endif ?>
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
      hide_loader($('#tombol_simpan1'));
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>


<script type="text/javascript">
    function update_posisi(){
      let x = $('#nilaiX').text();
      let y = $('#nilaiY').text();
      let nilaiX = x/<?php echo $sertifikat['lebar_image'] ?>*100; // nilai x dibagi lebar image, lalu dijadikan persen
      let nilaiY = y/<?php echo $sertifikat['tinggi_image'] ?>*100; // nilai y dibagi tinggi image, lalu dijadikan persen
      nilaiX = Math.round(nilaiX);
      nilaiY = Math.round(nilaiY);
      $('.nama_peserta').css('left', nilaiX + '%');
      $('.nama_peserta').css('top', nilaiY + '%');
      // console.log(nilaiX);
      // console.log(nilaiY);
    }
    $(document).ready(function() {
        // Untuk slider X

        var updateSliderX = document.getElementById('sliderX');
        var updateSliderValueX = document.getElementById('nilaiX');
        var updateSliderValueX2 = document.getElementById('posisi_x');

        noUiSlider.create(updateSliderX, {
            range: {
                min: 1,
                max: <?php echo $sertifikat['lebar_image'] ?>
            },
            connect: "lower",
            start: <?php echo $sertifikat['posisi_x']; ?>, // dimulai dari sini
        });

        updateSliderX.noUiSlider.on('update', function (values, handle) {
            updateSliderValueX.innerHTML = values[handle];
            updateSliderValueX2.value = values[handle];
            update_posisi();
        });


        // Untuk slider Y


        var updateSliderY = document.getElementById('sliderY');
        var updateSliderValueY = document.getElementById('nilaiY');
        var updateSliderValueY2 = document.getElementById('posisi_y');

        noUiSlider.create(updateSliderY, {
            range: {
                min: 1,
                max: <?php echo (int)$sertifikat['tinggi_image'] / 2.5; // Untuk sementara, bug sertifikat diatasi pakai ini aja dulu ?>
            },
            connect: "lower",
            start: <?php echo $sertifikat['posisi_y']; ?>, // dimulai dari sini
        });

        updateSliderY.noUiSlider.on('update', function (values, handle) {
            updateSliderValueY.innerHTML = values[handle];
            updateSliderValueY2.value = values[handle];
            update_posisi();
        });

    });


    $('#font_color_nama').colorpicker({
      format: 'rgb'
    })
    $('#font_color_nama').on('colorpickerChange', function(event) {
      $('#font_color_nama').parent().find('.fa-square').css('color', event.color.toString());
      $('.nama_peserta p').css('color', event.color.toString());
    });

    $('#font_color_id').colorpicker({
      format: 'rgb'
    })
    $('#font_color_id').on('colorpickerChange', function(event) {
      $('#font_color_id').parent().find('.fa-square').css('color', event.color.toString());
      $('.id_sertifikat p').css('color', event.color.toString());

    });

    $('#font_size').on('change', function(e){
      $(".nama_peserta").css( 'font-size', $(this).val()/8.571428571428571+"vw" );
      // sek sek, tak mikir... kalau 3.5vh = 30pt maka ...
    })
</script>