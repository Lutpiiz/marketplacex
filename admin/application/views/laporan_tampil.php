<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>


<div class="row">
    <div id="pemasukan" class="col-md-6 px-5 py-3"></div>
    <div id="layanan" class="col-md-6 px-5 py-3"></div>
</div>
<div id="penjualan" class="col px-5 py-3"></div>

<!-- chart pemasukan -->
<script>
    // Fetch data dari controller
    fetch('<?php echo base_url('laporan/chart_pemasukan'); ?>')
        .then(response => response.json())
        .then(data => {
            // Konfigurasi Highcharts
            Highcharts.chart('pemasukan', {
                chart: {
                    type: 'column' // Bisa diubah menjadi 'line' jika ingin line chart
                },
                title: {
                    text: 'Jumlah Pemasukan Per Hari'
                },
                xAxis: {
                    categories: data.categories,
                    title: {
                        text: 'Tanggal'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Total Penjualan (Rp)'
                    },
                    labels: {
                        formatter: function() {
                            return 'Rp. ' + this.value;
                        }
                    }
                },
                tooltip: {
                    pointFormat: 'Total Penjualan: <b>Rp. {point.y}</b>'
                },
                series: [{
                    name: 'Penjualan',
                    data: data.data,
                    color: '#FF5733' // Warna custom
                }]
            });
        })
        .catch(error => console.error('Error fetching chart data:', error));
</script>

<!-- chart layanan -->
<script>
    // Fetch data dari controller
    fetch('<?php echo base_url('laporan/chart_layanan'); ?>')
        .then(response => response.json())
        .then(data => {
            // Konfigurasi Highcharts
            Highcharts.chart('layanan', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Layanan yang Dipesan'
                },
                tooltip: {
                    pointFormat: '<b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.y}'
                        }
                    }
                },
                series: [{
                    name: 'Jumlah Pesanan',
                    colorByPoint: true,
                    data: data // Data dari controller
                }]
            });
        })
        .catch(error => console.error('Error fetching pie chart data:', error));
</script>

<!-- chart penjualan -->
<script>
    // Fetch data dari controller
    fetch('<?php echo base_url('laporan/chart_penjualan'); ?>')
        .then(response => response.json())
        .then(data => {
            // Konfigurasi Highcharts
            Highcharts.chart('penjualan', {
                chart: {
                    type: 'line' // Bisa diubah menjadi 'column' untuk column chart
                },
                title: {
                    text: 'Jumlah Penjualan Per Hari'
                },
                xAxis: {
                    categories: data.categories,
                    title: {
                        text: 'Tanggal'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Penjualan'
                    }
                },
                tooltip: {
                    pointFormat: 'Jumlah Penjualan: <b>{point.y}</b>'
                },
                series: [{
                    name: 'Penjualan',
                    data: data.data,
                    color: '#007bff' // Warna custom
                }]
            });
        })
        .catch(error => console.error('Error fetching chart data:', error));
</script>