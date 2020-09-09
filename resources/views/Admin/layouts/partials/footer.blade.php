<!-- Bootstrap core JavaScript-->
  <script src="{{asset('public/backend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('public/backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('public/backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{asset('public/backend/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('public/backend/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('public/backend/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('public/backend/js/sb-admin.min.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{asset('public/backend/js/demo/datatables-demo.js')}}"></script>
  <script src="{{asset('public/backend/js/demo/chart-area-demo.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{asset('public/backend/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('public/backend/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{asset('public/backend/js/demo/datatables-demo.js')}}"></script>

<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js')}}"></script>



<script type="text/javascript">
    @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"
    @switch(type)
        @case('info')
            toastr.info("{{Session::get('message')}}");
            @break;
            @case('success')
            toastr.success("{{Session::get('message')}}");
            @break;

             @case('warning')
            toastr.warning("{{Session::get('message')}}");
            @break;
            @case('error')
            toastr.error("{{Session::get('message')}}");
            @break;
    
        
    @endswitch
    @endif   
</script>

<script type="text/javascript">
    $(document).on("click","#delete",function(e){
        e.preventDefault();
        var link =$(this).alert("href");

        swal({
  title: "Are you Want to Delete?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  buttons:"true",
  dangerMode:"true",
})
        .then((willDelete)=>{
            if(willDelete){
                window.location.href =link;
            }else{
                swal("save Data!!");
            }


        });
      });  


</script>
