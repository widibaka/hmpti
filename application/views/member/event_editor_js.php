
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
// preview image before upload


  

$(document).ready(function () {

  $('#edit_deskripsi').summernote({
    toolbar: [
      // [groupName, [list of button]]
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
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

  $('#editForm').validate({
    rules: {
      nim: {
        required: true,
        number: true,
        minlength: 8
      },
      nama: {
        required: true,
        minlength: 1
      },
      email: {
        required: true,
        email: true
      },
      id_jabatan: {
        required: true,
      },
      deskripsi: {
        required: true,
        minlength: 50
      },
    },
    messages: {
      nim: {
        required: "Mohon isi NIM mahasiswa",
        number: "Mohon isi hanya dengan angka",
        minlength: "Minimal harus 8 digit",
      },
      nama: {
        required: "Mohon isi nama individu ini",
        minlength: "Minimal harus 1 karakter",
      },
      email: {
        required: "Mohon isi email",
        email: "Mohon isi format email dengan betul",
      },
      id_jabatan: {
        required: "Mohon pilih jabatan",
      },
      deskripsi: {
        required: "Mohon isi deskripsi individu ini",
        minlength: "Minimal harus 50 karakter",
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