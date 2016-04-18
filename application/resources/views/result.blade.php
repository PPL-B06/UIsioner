@extends('layout')

@section('page-title') {{ "| Results" }} @stop

@section('custom-styles')
<link rel="stylesheet" href="{{ url('/resources/assets/css/page.css') }}">
@stop

@section('content')
<div class="container text-center">    
  <div class="row content">
    
    <div class="col-sm-2 sidenav hidden-xs">
    <!--<p><a href="#">Link</a></p>
    <p><a href="#">Link</a></p>
    <p><a href="#">Link</a></p>-->
    </div>
  
    <div class="col-sm-8 text-left" style="margin-bottom:20px;"> 
      <h5 class="text-uppercase">Results</h5>
      <div class="panel panel-default">
        <div class="panel-body">
          <div id="dvData">
            <table class="table table-bordered" border="1" id="myTable">
              <thead>
                <th>NPM</th>
                <th>Nama</th>
                @foreach ($questions as $question)
                <th>
                {{$question->Title}}
                </th>
                @endforeach
              </thead>

              <?php $in=0; ?>
              @for ($j = 0; $j < $unumber ; $j++)

              <tr>
                <td>{{$answers[$in]->npm}}</td>
                <td>{{$answers[$in]->name}}</td>
                @for ($i = 0; $i < $qnumber ; $i++)
                <td>{{$answers[$in]->title}}</td>
                <?php $in++; ?>
                @endfor
              </tr>

              @endfor 

            </table>
          </div>

      <a href="#" id="test" onClick="javascript:fnExcelReport();">download</a>
      
        </div>
      </div>
      
    </div>
    <!--Membuat list form sesuai form yang ada di database-->
    <div class="col-sm-2 sidenav">
    <!--<div class="well">
    <p>ADS</p>
    </div>
    <div class="well">
    <p>ADS</p>
    </div>-->
    </div>

  </div>
</div>
@stop

@section('custom-scripts')
<script>
 function fnExcelReport() {
    var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
    tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

    tab_text = tab_text + '<x:Name>Test Sheet</x:Name>';

    tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
    tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

    tab_text = tab_text + "<table border='1px'>";
    tab_text = tab_text + $('#myTable').html();
    tab_text = tab_text + '</table></body></html>';

    var data_type = 'data:application/vnd.ms-excel';
    
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        if (window.navigator.msSaveBlob) {
            var blob = new Blob([tab_text], {
                type: "application/csv;charset=utf-8;"
            });
            navigator.msSaveBlob(blob, 'Data.xls');
        }
    } else {
        $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
        $('#test').attr('download', 'Test file.xls');
    }

}

</script>
@stop