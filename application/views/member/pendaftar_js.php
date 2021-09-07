<!-- DataTables -->
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- page script -->
<script>

  function show_data_tambahan(id_pendaftar) {
    $.ajax({
      url: "<?php echo base_url() ?>admin/pendaftar/get_data_tambahan/"+id_pendaftar,
      success: function(data){
        $('#modal_konten_data_tambahan').html(data);
        $('#modal_data_tambahan').modal('show');
      }
    })
  }

  function saran_more(saran) {
    $("#saran_full").html(saran);
  }
  
  function show_error(errorThrown) {
    Swal.fire({
      title: 'Terjadi kesalahan!',
      icon: 'error',
      text: errorThrown,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Tutup'
    })
  }
  // STATUS EDIT STARTS
    function unset(id) {
      var target = $("#status-"+id);
      $.ajax({
        type: "GET",
        url: "<?php echo base_url() ?>admin/pendaftar/unset/"+id,
        success: function (response) {
          try{
            response = JSON.parse(response);
            if( response.status == true ){
              target.removeClass();
              target.addClass('dropdown-toggle');
              target.addClass('btn');
              target.addClass('btn-default');
              target.html('Unset');
            }
          }
          catch(err){
            show_error(err);
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          show_error(XMLHttpRequest+errorThrown);
        }
      });
    }
    function valid(id) {
      var target = $("#status-"+id);
      $.ajax({
        type: "GET",
        url: "<?php echo base_url() ?>admin/pendaftar/valid/"+id,
        success: function (response) {
          try{
            response = JSON.parse(response);
            if( response.status == true ){
              target.removeClass();
              target.addClass('dropdown-toggle');
              target.addClass('btn');
              target.addClass('btn-success');
              target.html('Valid');
            }
          }
          catch(err){
            show_error(err);
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          show_error(XMLHttpRequest+errorThrown);
        }
      });
      
    }
    function invalid(id) {
      var target = $("#status-"+id);
      $.ajax({
        type: "GET",
        url: "<?php echo base_url() ?>admin/pendaftar/invalid/"+id,
        success: function (response) {
          try{
            response = JSON.parse(response);
            if( response.status == true ){
              target.removeClass();
              target.addClass('dropdown-toggle');
              target.addClass('btn');
              target.addClass('btn-danger');
              target.html('Invalid');
            }
          }
          catch(err){
            show_error(err);
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          show_error(XMLHttpRequest+errorThrown);
        }
      });
      
    }
  // STATUS EDIT ENDS


  // DATA TABLE SERVER-SIDE STARTS
    var table;
    var table_settings = { 
            "processing": true, 
            "serverSide": true, 
            "order": [], 
             
            "ajax": {
                "url": "<?php echo base_url( 'admin/pendaftar/get_data/' . $event['id_event'] )?>",
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
            // "responsive": true,
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