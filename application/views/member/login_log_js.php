<!-- DataTables -->
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- page script -->
<script>
  // $(function () {
  //   $('#example2').DataTable({
  //     "paging": true,
  //     "lengthChange": true,
  //     "searching": true,
  //     "ordering": true,
  //     "info": true,
  //     "autoWidth": false,
  //     "responsive": true,
  //     "language": {
  //         "url": "<?php echo base_url() ?>assets/adminlte/plugins/datatables/i18n/Indonesian.json"
  //     }
  //   });
  // });


  // DATA TABLE SERVER-SIDE STARTS
    var table;
    var table_settings = { 
            "processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?php echo base_url( 'admin/login_log/get_data/' )?>",
                "type": "POST"
            },
            // "columnDefs": [
            // { 
            //     "targets": [ 6, 7 ], 
            //     "orderable": false, 
            // },
            // ],
            "language": {
                "url": "<?php echo base_url() ?>assets/adminlte/plugins/datatables/i18n/Indonesian.json"
            },
            "info": true,
            "autoWidth": false,
            "responsive": true,
    }
    function refresh_table() {
      table.ajax.reload();
    }

    $(document).ready(function() {
        //datatables
        table = $('#example2').DataTable( table_settings );
    });
  // DATA TABLE SERVER-SIDE ENDS
  


  //Delete
  function delete_row(id) {
    Swal.fire({
      title: 'Yakin ingin menonaktifkan member ini?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya'
    }).then((result) => {
      if (result.value) {
        window.location.href = "<?php echo base_url() ?>admin/anggota/nonaktifkan/"+id;
      }
    });
  }

</script>