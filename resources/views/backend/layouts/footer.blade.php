<footer class="main-footer">
    <strong>Copyright &copy; Joymania.</strong>

    <div class="float-right d-none d-sm-inline-block">
      <b>Designed & Developed by</b> JOy
    </div>
  </footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('backend')}}/dist/js/adminlte.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('backend')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
{{-- <script src="{{asset('backend')}}/dist/js//handlebars.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script> 







<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script type="text/javascript">
    $(function(){
        $(document).on('click','#delete',function(e){
            e.preventDefault();
            var link =$(this).attr('href');
            Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            window.location.href=link;
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
})
        });
    });
  </script>
 <script type="text/javascript">
    $(function(){
        $(document).on('click','#approveBtn',function(e){
            e.preventDefault();
            var link =$(this).attr('href');
            Swal.fire({
        title: 'Approve it?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Approve it!'
        }).then((result) => {
        if (result.value) {
            window.location.href=link;
            Swal.fire(
            'Approved'
            )
        }
})
        });
    });
  </script>
  {{-- <script type="text/javascript">
  $(function(){
    $(document).on('click','#approveBtn',function(e){
            e.preventDefault();
            var link =$(this).attr('href');
            Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Approved',
      showConfirmButton: false,
      timer: 1500
    })
  })
  });
  </script> --}}

<script type"text/javascript">
    function preview_image(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('showImage');
        output.src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>

  @stack('script')

  



</body>
</html>
