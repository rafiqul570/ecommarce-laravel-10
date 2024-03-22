
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

 
<!--AJAX -->

 <script>

  $(document).ready(function () {

      

      $('#category').on('change', function () {

          var idCountry = this.value;

          $("#state-dropdown").html('');

          $.ajax({

              url: "{{url('api/fetch-states')}}",

              type: "POST",

              data: {

                  country_id: idCountry,

                  _token: '{{csrf_token()}}'

              },

              dataType: 'json',

              success: function (result) {

                  $('#state-dropdown').html('<option value="">-- Select State --</option>');

                  $.each(result.states, function (key, value) {

                      $("#state-dropdown").append('<option value="' + value

                          .id + '">' + value.name + '</option>');

                  });

                  $('#city-dropdown').html('<option value="">-- Select City --</option>');

              }

          });

      });


    // subcategory

      $('#state-dropdown').on('change', function () {

          var idState = this.value;

          $("#city-dropdown").html('');

          $.ajax({

              url: "{{url('api/fetch-cities')}}",

              type: "POST",

              data: {

                  state_id: idState,

                  _token: '{{csrf_token()}}'

              },

              dataType: 'json',

              success: function (res) {

                  $('#city-dropdown').html('<option value="">-- Select City --</option>');

                  $.each(res.cities, function (key, value) {

                      $("#city-dropdown").append('<option value="' + value

                          .id + '">' + value.name + '</option>');

                  });

              }

          });

      });



  });

</script>
  </body>
</html>


