
<!-- jquery-validation -->
<script src="<?= base_url() ?>assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Star Maker -->
<script src="<?= base_url() ?>assets/widi_star_maker.js"></script>

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
$("#kehadiran").change(function() {
  $("#indikator_kehadiran").val(1);
  readURL(this, "#preview_kehadiran");
});
// preview image before upload


  

$(document).ready(function () {

  // Buat star buttons
  star_buttons_init('bintang');

  <?php if ( !empty($get_pendaftar->row_array()['bintang']) ): ?>
    fill_star('bintang', '<?php echo $get_pendaftar->row_array()['bintang'] ?>');
  <?php endif ?>
  

  $('#reviewForm').validate({
    rules: {
      bintang: {
        required: true,
      },
      saran: {
        required: true,
      },
    },
    messages: {
      bintang: {
        required: "Mohon beri kami bintang",
      },
      saran: {
        required: "Mohon beri kami saran ataupun ulasan agar kami menjadi lebih baik",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
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