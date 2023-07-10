<script src="<?=base_url('assets/plugins/flot/jquery.flot.js')?>"></script>
<script src="<?=base_url('assets/plugins/flot/plugins/jquery.flot.resize.js')?>"></script>
<script>
  $(document).ready(function () {
    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9], [7,2]],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'Senin'], [2,'Selasa'], [3,'Rabu'], [4,'Kamis'], [5,'Jumat'], [6,'Sabtu'], [6,'Minggu']]
      }
    })
    /* END BAR CHART */
  })
</script>