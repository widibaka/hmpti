<script type="text/javascript">
    function update_posisi(){
      let x = $('#nilaiX').text();
      let y = $('#nilaiY').text();
      let nilaiX = x/<?php echo $sertifikat['lebar_image'] ?>*100; // nilai x dibagi lebar image, lalu dijadikan persen
      let nilaiY = y/<?php echo $sertifikat['tinggi_image'] ?>*100; // nilai y dibagi tinggi image, lalu dijadikan persen
      nilaiX = Math.round(nilaiX);
      nilaiY = Math.round(nilaiY);
      $('.nama_peserta').css('left', nilaiX + '%');
      $('.nama_peserta').css('top', nilaiY + '%');
      // console.log(nilaiX);
      // console.log(nilaiY);
    }
    $(document).ready(function() {
        // Untuk slider X

        var updateSliderX = document.getElementById('sliderX');
        var updateSliderValueX = document.getElementById('nilaiX');
        var updateSliderValueX2 = document.getElementById('posisi_x');

        noUiSlider.create(updateSliderX, {
            range: {
                min: 0,
                max: <?php echo $sertifikat['lebar_image'] ?>
            },
            connect: "lower",
            start: <?php echo $sertifikat['posisi_x']; ?>, // dimulai dari sini
        });

        updateSliderX.noUiSlider.on('update', function (values, handle) {
            updateSliderValueX.innerHTML = values[handle];
            updateSliderValueX2.value = values[handle];
            update_posisi();
        });


        // Untuk slider Y


        var updateSliderY = document.getElementById('sliderY');
        var updateSliderValueY = document.getElementById('nilaiY');
        var updateSliderValueY2 = document.getElementById('posisi_y');

        noUiSlider.create(updateSliderY, {
            range: {
                min: 0,
                max: <?php echo $sertifikat['tinggi_image'] ?>
            },
            connect: "lower",
            start: <?php echo $sertifikat['posisi_y']; ?>, // dimulai dari sini
        });

        updateSliderY.noUiSlider.on('update', function (values, handle) {
            updateSliderValueY.innerHTML = values[handle];
            updateSliderValueY2.value = values[handle];
            update_posisi();
        });

    });
</script>