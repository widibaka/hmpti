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
  function edit_prepare(id) {
    let include_logo = $("#include_logo-"+id).html();
    let judul = $("#judul-"+id).html();
    let paragraf = $("#paragraf-"+id).html();
    let posisi = $("#posisi-"+id).html();
    let image = $("#image-"+id).find("img").attr("src");
    let filename = $("#image-"+id).attr("filename");

    // masukkan ke form
    $("#edit_id_carousel").val(id);
    $("#edit_judul").val(judul);
    $("#edit_paragraf").val(paragraf);
    $("#edit_preview").attr("src", image);
    $("#edit_image_filename").val(filename);
    // select 
    document.getElementById(include_logo).selected = "true";
    document.getElementById(posisi).selected = "true";
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

  //Delete
  function delete_carousel(id) {
    Swal.fire({
      title: 'Yakin ingin menghapus carousel ini?',
      text: "Tindakan ini tidak akan dapat dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus saja!'
    }).then((result) => {
      if (result.value) {
        window.location.href = "<?php echo base_url() ?>admin/carousel/delete/"+id;
      }
    });
    
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
      // image: {
      //   required: true,
      // },
      include_logo: {
        required: true,
      },
      posisi: {
        required: true,
      },
    },
    messages: {
      // image: {
      //   required: "Mohon pilih gambar",
      // },
      include_logo: {
        required: "Mohon isi bagian ini",
      },
      posisi: {
        required: "Mohon isi bagian ini",
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