</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>
    <strong>Copyright &copy; 2019 </strong> เว็บโปรแกรมเมอร์
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<script src="https://code.jquery.com/jquery-3.6.0.js" ></script>

<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->

<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>


<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>



<script>
  $(document).ready(function () {
    //$('.sidebar-menu').tree();
    //$('.select2').select2();
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })
  })
</script>




<script>
  $(function () {
    $('#example1').DataTable({
      // "paging": true,
      // "lengthChange": true,
      // "searching": true,
      // "ordering": true,
      // "info": true,
      // "autoWidth": true,
      // "oLanguage": {
      //       "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
      //       "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
      //       "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
      //       "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
      //       "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
      //       "sSearch": "ค้นหา :",
      //       "oPaginate": {
      //           "sFirst": "เริ่มต้น",
      //           "sPrevious": "ก่อนหน้า",
      //           "sNext": "ถัดไป",
      //           "sLast": "สุดท้าย"
      //       }

      //   }
      
    });
  });
</script>


<script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
<script>
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  CKEDITOR.replace('#detail');
  function CKupdate() {
      for (instance in CKEDITOR.instances)
          CKEDITOR.instances[instance].updateElement();
  }
</script>
<script>
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  CKEDITOR.replace('#detail1');
  function CKupdate() {
      for (instance in CKEDITOR.instances)
          CKEDITOR.instances[instance].updateElement();
  }
</script>
