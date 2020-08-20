<?php 
    mysql_connect("localhost","root","");
    mysql_select_db("db_koperasi");
 
 //Membuat Query
 if(isset($_GET['id'])){
        $id=$_GET['id'];
        $k=mysql_query("select * from simpan where id_anggota='$id'");
        $q=mysql_query("select tgl_simpan as bulan from simpan where id_anggota='$id'");
    }else{
        $k=mysql_query("select * from saldo");
        $q=mysql_query("select tgl_saldo as bulan from saldo");
    }
?>
 
<!-- File yang diperlukan dalam membuat chart -->
<script src="assets/grafik/jquery.min.js"></script>
<script src="assets/grafik/highcharts.js"></script>
<script src="assets/grafik/exporting.js"></script>
     
<script type="text/javascript">
$(function () {
    $('#loadview').highcharts({
        title: {
            text: 'Saldo',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            title: {
                text: 'Tanggal'
            },
            categories: [<?php while($r=mysql_fetch_array($q)){ echo "'".$r["bulan"]."',";}?>]
        },
        yAxis: {
            title: {
                text: 'Nominal'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Saldo ',
            data: [<?php while($t=mysql_fetch_array($k)){ echo $t["saldo_anggota"].",";}?>]
        }]
    });
});
</script>
 
<div id="loadview" style="min-width: 310px; min-height: 400px; margin: 0 auto"></div>