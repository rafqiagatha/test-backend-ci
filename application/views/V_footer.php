      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Click Logout if you're ready to leave.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('C_login/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js')?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/vendor/js/demo/chart-area-demo.js')?>"></script>
  <script src="<?php echo base_url('assets/vendor/js/demo/chart-pie-demo.js')?>"></script>

  <!-- Data tables -->
  <script src="<?= base_url('assets/vendor/dataTables/jquery.dataTables.min.js')?>"></script>
  <script src="<?= base_url('assets/vendor/dataTables/dataTables.bootstrap4.min.js')?>"></script>
  <script src="<?= base_url('assets/vendor/dataTables/jquery.dataTables.js')?>"></script>
  <script src="<?= base_url('assets/vendor/dataTables/dataTables.bootstrap4.js')?>"></script>
  <script type="text/javascript">
   $(document).ready(function() {
    var table=$('#dataTable').DataTable({
                initComplete: function () {
                }
        });
        $(".filterhead").each(function (i) {
                    if (i != 15  && i != 16 ) {
                        var select = $('<select class="form-control" style="margin:15px"><option value="">All Data</option></select>')
                            .appendTo($(this).empty())
                            .on('change', function () {
                                var term = $(this).val();
                                table.column(i).search(term, false, false).draw();
                            });
                        table.column(i).data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>')
                        });
                    } else {
                        $(this).empty();
                    }
                });
  });
  </script>  
</body>

</html>
