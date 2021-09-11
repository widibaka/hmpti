<script>

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

$("#pembayaran").change(function() {
  $("#indikator_pembayaran").val(1);
  readURL(this, "#preview_pembayaran");
});

</script>