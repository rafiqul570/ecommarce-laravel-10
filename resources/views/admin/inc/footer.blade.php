
    <script src="{{asset('backend/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('backend/lib/popperjs/popper.js')}}"></script>
    <script src="{{asset('backend/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('backend/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('backend/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('backend/lib/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('backend/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{asset('backend/lib/medium-editor/medium-editor.js')}}"></script>
    <script src="{{asset('backend/lib/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('backend/js/starlight.js')}}"></script>
    <script src="{{asset('backend/js/ResizeSensor.js')}}"></script>
    <script src="{{asset('backend/js/dashboard.js')}}"></script>
    <script src="{{asset('backend/js/main.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <!-- Alert settimeout(Javascript) -->
    <script>
      function alertclose(){
        document.getElementById("alert").remove('alert');
      }
      setTimeout(alertclose, 2000, );
    </script>

    <!-- Datatable -->
    <script>
      $('#datatable1').DataTable({
         responsive: true,
         language: {
         searchPlaceholder: 'Search...',
         sSearch: '',
         lengthMenu: '_MENU_',
      }
      });
    </script>


  <script>
    $(function(){
      'use strict';

      // Inline editor
      var editor = new MediumEditor('.editable');

      // Summernote editor
      $('#summernote').summernote({
        height: 150,
        tooltip: false
      })
    });
  </script>

  </body>
</html>


