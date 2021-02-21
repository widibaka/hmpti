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
  function edit_prepare(id_jabatan) {
    let nama_jabatan = $("#nama_jabatan-"+id_jabatan).html();
    let id_divisi = $("#id_divisi-"+id_jabatan).html();
    // masukkan ke form
    $("#edit_id_jabatan").val(id_jabatan);
    $("#edit_nama_jabatan").val(nama_jabatan);
    // select divisinya
    document.getElementById(id_divisi).selected = "true"
  }


  
  //Delete
  function delete_row(id) {
    Swal.fire({
      title: 'Yakin ingin menghapus jabatan ini?',
      text: "Tindakan ini tidak akan dapat dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus saja!'
    }).then((result) => {
      if (result.value) {
        window.location.href = "<?php echo base_url() ?>admin/jabatan/delete/"+id;
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
      nama_jabatan: {
        required: true,
        minlength: 3
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
      nama_jabatan: {
        required: true,
        minlength: 3
      },
      id_divisi: {
        required: true,
      },
    },
    messages: {
      nama_jabatan: {
        required: "Mohon isi nama jabatan",
        minlength: "Minimal harus 5 karakter"
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
});
</script>