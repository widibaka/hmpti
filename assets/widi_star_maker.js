// Ini adalah buatan saya Widi Baka. Entah kenapa kepikiran bikin ini waktu magang wkwkwk
// Widi Baka 2020 at Semesta Play / Semesta Group

// Star Buttons STARTS
	function star_buttons_init( target_name ) {
		let target = $('[name="'+ target_name +'"]');
		for (var i = 1; i < 6; i++) {
			target.parent().append( '<a href="javascript:void(0)" onclick="fill_star( \''+ target_name +'\', \'' + i +'\' )"><i class="fa fa-star text-secondary h1" id='+ target_name + '-' + i +'></i></a>' );
		}
	}

	function fill_star(target_name, value_star) {
		for (var i = 1; i <= 5; i++) { // reset dulu semua buttons
			$( '#'+target_name+'-'+i ).removeClass('text-warning');
		}
		for (var i = 1; i <= value_star; i++) { // di looping sampai sejumlah rating yang dipilih dari kiri ke kanan
			$( '#'+target_name+'-'+i ).addClass('text-warning');
		}
		$('[name="'+ target_name +'"]').val( value_star );
	}

// Star Buttons ENDS