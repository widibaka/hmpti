<script type="text/javascript">
	function get_detail(id_event) {
		var loader = `<div class="col-12" style="
					    background-image: url('<?php echo base_url() ?>assets/img/loader.gif');
					    background-repeat: no-repeat;
					    background-position: center;
					    min-height: 50px;
					  ">`;

		$("#detail_event").html(loader);
		setTimeout(function() {
			$.ajax({
				type: "GET",
				url: "<?php echo base_url() ?>p/ajax_detail_event/"+id_event,
				success: function (data) {
					$("#detail_event").html(data);
					$("#detail_event_wrapper").show(400); // actually shows the data of details
				},
			});
		}, 100);
	}
</script>