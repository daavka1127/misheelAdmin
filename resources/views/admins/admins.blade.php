@extends('layouts.layout_master')

@section('content')
  <div class="row clearfix">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="card">
              <div class="header">
                  <div class="row clearfix">
                      <div class="col-xs-12 col-sm-6">
                          <h2>Хэрэглэгчийн эрхүүд</h2>
                      </div>
                  </div>
              </div>
              <div class="body">
                <table id="datatable" class="table table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Дугаар</th>
                            <th>ID</th>
                            <th>Нэр</th>
                            <th>Цахим хаяг</th>
                            <th>Төрөл</th>
                        </tr>
                    </thead>
                </table>
              </div>
          </div>
      </div>
  </div>
@endsection


@section('css')
  <link href="{{url("public/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css")}}" rel="stylesheet">
@endsection

@section('js')
  <!-- Jquery DataTable Plugin Js -->
  <script src="{{url("public/plugins/jquery-datatable/jquery.dataTables.js")}}"></script>
  <script src="{{url("public/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js")}}"></script>
  <script src="{{url("public/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js")}}"></script>
  <script src="{{url("public/plugins/jquery-datatable/extensions/export/buttons.flash.min.js")}}"></script>
  <script src="{{url("public/plugins/jquery-datatable/extensions/export/jszip.min.js")}}"></script>
  <script src="{{url("public/plugins/jquery-datatable/extensions/export/pdfmake.min.js")}}"></script>
  <script src="{{url("public/plugins/jquery-datatable/extensions/export/vfs_fonts.js")}}"></script>
  <script src="{{url("public/plugins/jquery-datatable/extensions/export/buttons.html5.min.js")}}"></script>
  <script src="{{url("public/plugins/jquery-datatable/extensions/export/buttons.print.min.js")}}"></script>


  <script type="text/javascript">
  $(document).ready(function(){
    $('#datatable').DataTable( {
        "language": {
            "lengthMenu": "_MENU_ мөрөөр харах",
            "zeroRecords": "Хайлт илэрцгүй байна",
            "info": "Нийт _PAGES_ -аас _PAGE_-р хуудас харж байна ",
            "infoEmpty": "Хайлт илэрцгүй",
            "infoFiltered": "(_MAX_ мөрөөс хайлт хийлээ)",
            "sSearch": "Хайх: ",
            "paginate": {
              "previous": "Өмнөх",
              "next": "Дараахи"
            }
        },
        "processing": true,
        "serverSide": true,
        "ajax":{
                 "url": "{{url("api/show/admins")}}",
                 "dataType": "json",
                 "type": "POST",
                 "data":{
                      _token: "{{ csrf_token() }}"
                    }
               },
        "columns": [
            { data: "order", name: "order",  render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
      } },
            { data: "id", name: "id"},
            { data: "name", name: "name"},
            { data: "email", name: "email"},
            { data: "userTypeID", name: "userTypeID"}
          ]
    });
});
$(document).ready(function(){
  $('#datatable tbody').on( 'click', 'tr', function () {
      var currow = $(this).closest('tr');
      $('#datatable tbody tr').css("background-color", "white");
      $(this).closest('tr').css("background-color", "yellow");
      dataRow = $('#datatable').DataTable().row(currow).data();
    });
});
  </script>
@endsection
