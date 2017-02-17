<!-- jQuery -->
<script src="bower_components/jquery/dist/jquery.min.js">"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js">"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="bower_components/metisMenu/dist/metisMenu.min.js">"></script>

<!-- Morris Charts JavaScript -->
<!-- <script src="bower_components/raphael/raphael-min.js">"></script> -->
<!-- <script src="bower_components/morrisjs/morris.min.js">"></script> -->
<!-- <script src="js/morris-data.js">"></script> data fucking tables will not work with morris.js -->

<!-- DataTables JavaScript -->
<script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!-- Datepicker JavaScript -->
<script src="jsa/bootstrap-datepicker.js"></script>
<script src="jsa/bootstrap-datepicker.min.js"></script>

<!-- jQuery UI CSS -->
<!-- <script src="js/jquery-ui.min.js"></script> -->

<script>
    $(document).ready(function() {
        $('.d-tables').DataTable({
            responsive: true,
            columnDefs: [
                {orderable: false, targets:-1}
            ],
			"aaSorting": [[ 0, "desc" ]]
        });
        
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '-3d'
        });
        
        $( "#tabs" ).tabs();
    });
</script>

</body>

</html>