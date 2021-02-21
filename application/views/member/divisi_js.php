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
  function edit_prepare(id_divisi) {
    let nama_divisi = $("#nama_divisi-"+id_divisi).html();
    let deskripsi = $("#deskripsi-"+id_divisi).html();
    // masukkan ke form
    $("#edit_id_divisi").val(id_divisi);
    $("#edit_nama_divisi").val(nama_divisi);
    $("#edit_deskripsi").val(deskripsi);
  }


  //Delete
  function delete_row(id) {
    Swal.fire({
      title: 'Yakin ingin menghapus divisi ini?',
      text: "Tindakan ini tidak akan dapat dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus saja!'
    }).then((result) => {
      if (result.value) {
        window.location.href = "<?php echo base_url() ?>admin/divisi/delete/"+id;
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
      nama_divisi: {
        required: true,
        minlength: 5
      },
      deskripsi: {
        required: true,
        minlength: 50
      },
      terms: {
        required: true
      },
    },
    messages: {
      nama_divisi: {
        required: "Mohon isi nama divisi",
        minlength: "Minimal harus 5 karakter"
      },
      deskripsi: {
        required: "Mohon isi keterangan divisi",
        minlength: "Minimal harus 50 karakter"
      },
      terms: "Please accept our terms"
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
      nama_divisi: {
        required: true,
        minlength: 5
      },
      deskripsi: {
        required: true,
        minlength: 50
      },
      terms: {
        required: true
      },
    },
    messages: {
      nama_divisi: {
        required: "Mohon isi nama divisi",
        minlength: "Minimal harus 5 karakter"
      },
      deskripsi: {
        required: "Mohon isi keterangan divisi",
        minlength: "Minimal harus 50 karakter"
      },
      terms: "Please accept our terms"
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