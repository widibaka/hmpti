<script type="text/javascript">

	function do_countdown() {
		$(".countdown_wrapper").each(function() {
			var countdown = $(this).find(".countdown").data("time");
			// console.log(countdown.html())
			// Set the date we're counting down to 
			var countDownDate = new Date(countdown).getTime();

			// Get today's date and time
			var now = new Date().getTime();
			  
			// Find the distance between now and the count down date
			var distance = countDownDate - now;

			if (distance > 0) {
			  	// Time calculations for days, hours, minutes and seconds
			  	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			  	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			  	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			  	var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			  	  
			  	// Output the result in an element with id="demo"
			  	$(this).find(".countdown").html( days + "hari " + hours + "jam " + minutes + "menit " );
			  	  
			}else{
				$(this).html("Pendaftaran telah ditutup");
			}
		});
	}

	

	$(document).ready(function() {
		do_countdown(); // <-- at first on load
		setInterval(function() {
			do_countdown();
		},20000); //<-- run at every 20 secs

		<?php if ( !empty( $this->input->get('event') ) ): ?>
			$("#exampleModal").modal("show");
			get_detail(<?php echo $this->input->get('event') ?>);
		<?php endif ?>
		
	});
</script>