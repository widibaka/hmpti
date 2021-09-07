
<!-- Toastr -->
<script src="<?= base_url('assets/') ?>plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
  function toggle(id_peserta) {
    $("#keterangan-"+id_peserta).toggle(200);
    if ( $("#icon_keterangan-"+id_peserta).hasClass('fa-plus') ) {
      $("#icon_keterangan-"+id_peserta).removeClass('fa-plus')
      $("#icon_keterangan-"+id_peserta).addClass('fa-minus');
    }
    else if ( $("#icon_keterangan-"+id_peserta).hasClass('fa-minus') ) {
      $("#icon_keterangan-"+id_peserta).removeClass('fa-minus')
      $("#icon_keterangan-"+id_peserta).addClass('fa-plus');
    }
  }
  

  function fn_tampilkan_gambar() {
    var checkBox = document.getElementById("tampilkan_semua_gambar");
    if ( checkBox.checked == true ) {
      $("tr").each(function() { // looping setiap baris tabel
          var URL_GAMBAR = $(this).find("td .gambar").attr('href'); // mendapatkan value href yaitu URL gambar
          $(this).find("td .gambar").addClass('hide'); // elemen anchor dihilangi
          $(this).find("td img").attr('src', URL_GAMBAR); // URL tadi ditemplokne ning element img
      });
    }else{
      $("tr").each(function() { // looping setiap baris tabel
          $(this).find("td .gambar").removeClass('hide'); // elemen anchor dimunculin lagi
          $(this).find("td img").attr('src', ''); // URL dihilangin
      });
    }
  }

// Menginjakkan kaki ke ajax
function konfirmasi(id_event_participant,id_event_participant_f) {
  $('#tombol-'+id_event_participant_f+' a').html('Loading ...');
  $('#tombol-'+id_event_participant_f+' a').attr('disabled','disabled');
  $('#tombol-'+id_event_participant_f+' a').addClass('disabled');
  $.ajax({
     url:'<?= base_url('eventcreator_event/konfirmasiabsensi/') ?>'+id_event_participant,
     type:'POST',
     success: function(data){
       Notification('top','left',1000,'success','Konfirmasi berhasil');
       $('#tombol-'+id_event_participant_f+' a').attr('onclick', 'tolak('+id_event_participant+')'); // mengubahnya jadi tombol tolak
       let konten_baru = '<a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="tolak(\''+id_event_participant+'\','+id_event_participant_f+')">Tolak absensi</a>'; // pakai \' soalnya harus ada kutipnya karena yang dilempar adalah string
       $('#tombol-'+id_event_participant_f).html(konten_baru); // mengubahnya jadi tombol tolak
     },
     fail: function(xhr, textStatus, errorThrown) {
       Notification('top','left',1000,'danger','Error:'+errorThrown);
     }
  });
}
function tolak(id_event_participant,id_event_participant_f) {
  $('#tombol-'+id_event_participant_f+' a').html('Loading ...');
  $('#tombol-'+id_event_participant_f+' a').attr('disabled','disabled');
  $('#tombol-'+id_event_participant_f+' a').addClass('disabled');
  $.ajax({
     url:'<?= base_url('eventcreator_event/tolakabsensi/') ?>'+id_event_participant,
     type:'POST',
     success: function(data){
       Notification('top','left',1000,'info','Berhasil ditolak');
       $('#tombol-'+id_event_participant_f+' a').attr('onclick', 'tolak('+id_event_participant+')'); // mengubahnya jadi tombol konfirmasi
       let konten_baru = '<a href="javascript:void(0)" class="btn btn-sm btn-success" onclick="konfirmasi(\''+id_event_participant+'\','+id_event_participant_f+')">Konfirmasi absensi</a>'; // pakai \' soalnya harus ada kutipnya karena yang dilempar adalah string
       $('#tombol-'+id_event_participant_f).html(konten_baru); // mengubahnya jadi tombol konfirmasi
     },
     fail: function(xhr, textStatus, errorThrown) {
       Notification('top','left',1000,'danger','Error:'+errorThrown);
     }
  });
}


// Pilihannya (top,left) (top,center (top,right) (bottom,left) (bottom,center) (bottom,right)
function Notification(from, align, durasi,satu_dari_type, messages){
     type = ['','info','success','warning','danger','rose','primary'];
     color = Math.floor((Math.random() * 6) + 1);
     $.notify({
       icon: "notifications",
       message: messages
     },{
         type: satu_dari_type,
         timer: durasi,
         placement: {
             from: from,
             align: align
         }
     });
}

</script>