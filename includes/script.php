
<!-- bootstrap datepicker -->
<script src="admin/datepicker/js/bootstrap-datepicker.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="dist/js/bootstrap.bundle.min.js"></script>
<script>
  $('#datepicker-year').datepicker({
		format: "yyyy",
		orientation: "top auto",
    viewMode: "years", 
    minViewMode: "years",
    autoclose: true
  });
</script>