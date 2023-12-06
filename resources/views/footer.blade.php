
    <script src="{{asset('backend/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('backend/lib/popperjs/popper.js')}}"></script>
    <script src="{{asset('backend/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('backend/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('backend/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('backend/lib/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('backend/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{asset('backend/js/starlight.js')}}"></script>
    <script src="{{asset('backend/js/ResizeSensor.js')}}"></script>
    <script src="{{asset('backend/js/dashboard.js')}}"></script>
    <script src="{{asset('backend/js/main.js')}}"></script>


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


    <!--  Alert settimeout(Javascript) -->
    <script>
      function alertclose(){
        document.getElementById("alert").remove('alert');
      }
      setTimeout(alertclose, 2000, );
    </script>

  <!-- Add option in table (Javascript) -->
    <script>
    function insertValue1(){
      var select = document.getElementById("select1"),
      txtVal = document.getElementById("val1").value,
      newOption = document.createElement("OPTION"),
      newOptionVal = document.createTextNode(txtVal);

      newOption.appendChild(newOptionVal);
      select.insertBefore(newOption,select.firstChild);

    }

     function insertValue2(){
      var select = document.getElementById("select2"),
      txtVal = document.getElementById("val2").value,
      newOption = document.createElement("OPTION"),
      newOptionVal = document.createTextNode(txtVal);

      newOption.appendChild(newOptionVal);
      select.insertBefore(newOption,select.firstChild);

    }
  </script>
  </body>
</html>


