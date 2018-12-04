<html lang="en">
<head>
    <title>Quản lý CNC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
</head>
<body>
    <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">
          <h1>Import vật tự </h1>
          </div>
          <div class="panel-body">
 
            <a href="{{ url('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
            <a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>

 
            <a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
 
            <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{!! route('admin.vattu.importExcel') !!}" class="form-horizontal" method="POST" files="true"  enctype="multipart/form-data" >
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                
 
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
 
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
 
                <input type="file" name="import_file" />
                <br>
                <button class="btn btn-primary">Import File</button>
            </form>
 
          </div>
        </div>
    </div>
</body>
</html>