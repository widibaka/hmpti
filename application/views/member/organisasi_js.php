<!-- DataTables -->
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url() ?>assets/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- page script -->
<script>
  //Edit divisi
  function edit_prepare(nim) {
    let nama = $("#nama-"+nim).html();
    let id_jabatan = $("#id_jabatan-"+nim).html();
    let kontak = $("#kontak-"+nim).html();
    let deskripsi = $("#deskripsi-"+nim).html();
    let image = $("#image-"+nim).find("img").attr("src");
    // masukkan ke form
    $("#edit_nim").val(nim);
    $("#edit_nama").val(nama);
    $("#edit_preview").attr("src", image);
    $("#edit_kontak").val(kontak);
    $("#edit_deskripsi").val(deskripsi);
    $("#edit_id_jabatan").val(id_jabatan);
    // select divisinya
    document.getElementById(id_jabatan).selected = "true"
  }

  // preview image before upload
  function readURL(input, type) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        if ( type == "edit" ) {
          $('#edit_preview').attr('src', e.target.result);
        }
        else if ( type == "add" ){
          $('#add_preview').attr('src', e.target.result);
        }
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  $("#edit_image").change(function() {
    readURL(this, "edit");
  });
  $("#add_image").change(function() {
    readURL(this, "add");
  });
  // preview image before upload

  //Delete divisi
  function delete_divisi(id_jabatan) {
    alert(id_jabatan);
  }

  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language": {
          "url": "<?php echo base_url() ?>assets/adminlte/plugins/datatables/i18n/Indonesian.json"
      }
    });
  });

$(document).ready(function () {
  // $.validator.setDefaults({
  //   submitHandler: function () {
  //     alert( "Form successful submitted!" );
  //   }
  // });
  $('#editForm').validate({
    rules: {
      nama: {
        required: true,
        minlength: 1
      },
      id_divisi: {
        required: true,
      },
    },
    messages: {
      nama_jabatan: {
        required: "Mohon isi nama jabatan",
        minlength: "Minimal harus 3 karakter"
      },
      id_divisi: {
        required: "Mohon pilih divisi",
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
  $('#addForm').validate({
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

  //color picker with addon
  $('.navbar_bg-colorpicker').colorpicker()

  $('.navbar_bg-colorpicker').on('colorpickerChange', function(event) {
    $('.navbar_bg-colorpicker .fa-square').css('color', event.color.toString());
  });



  $('.navbar_text-colorpicker').colorpicker()

  $('.navbar_text-colorpicker').on('colorpickerChange', function(event) {
    $('.navbar_text-colorpicker .fa-square').css('color', event.color.toString());
  });

});
</script>