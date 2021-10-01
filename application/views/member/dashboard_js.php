
<!-- ChartJS -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/chart.js/Chart.min.js"></script>

<script type="text/javascript">
  
  $(function () {
    /* ChartJS
     * ------- */

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = {
      labels  : [<?php foreach ($events as $key => $val) { echo '"' . $val['judul'] . '", '; } ?>],
      datasets: [
        {
          label               : 'Jumlah Peserta',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php foreach ($events as $key => $val) { echo '"' . $val['jumlah_pendaftar'] . '", '; } ?>]
        },
      ]
    }

    
    var barChart_panitiaCanvas = $('#barChart_panitia').get(0).getContext('2d')
    var barChart_panitiaData = {
      labels  : [<?php foreach ($members as $key => $val) { echo '"' . $val['nama'] . '", '; } ?>],
      datasets: [
        {
          label               : 'Menjadi Panitia',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php foreach ($members as $key => $val) { echo '"' . $val['menjadi_panitia'] . '", '; } ?>]
        },
      ]
    }

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    setTimeout(function() {
      var barChart = new Chart(barChartCanvas, {
        type: 'bar', 
        data: barChartData,
        options: barChartOptions
      });

      var barChart_panitia = new Chart(barChart_panitiaCanvas, {
        type: 'bar', 
        data: barChart_panitiaData,
        options: barChartOptions
      });
    }, 1500);
  })
</script>