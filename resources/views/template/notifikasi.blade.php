<script>
        // untuk membuat notifikasi
      @if (Session::has('success'))
      window.onload=function()
          {
          toastr.success("{{Session::get('success')}}");
          }    
      @endif
      @if (Session::has('info'))
          window.onload=function()
          {
          toastr.info("{{Session::get('info')}}");
          }
      @endif
      @if (Session::has('error'))
          window.onload=function()
          {
            toastr.error("{{Session::get('error')}}");
          }
      @endif
      </script>
      