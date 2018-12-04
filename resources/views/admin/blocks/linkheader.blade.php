<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Admin quản lý vật tư</title>

    <meta name="description" content="Static &amp; Dynamic Tables" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link rel="stylesheet" href="{{url('admin/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin/assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="{{url('admin/assets/css/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin/assets/css/bootstrap-datepicker3.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin/assets/css/ui.jqgrid.min.css')}}" />
    
    <!-- text fonts -->
    <link rel="stylesheet" href="{{url('admin/assets/css/fonts.googleapis.com.css')}}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{url('admin/assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

    <link rel="stylesheet" href="{{url('admin/assets/css/ace-skins.min.css')}}" />
    <link rel="stylesheet" href="{{url('admin/assets/css/ace-rtl.min.css')}}" />
    
    <script src="{{ url('admin/assets/js/ace-extra.min.js')}}"></script>

    <!-- ckeditor -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="/templateEditor/ckeditor/ckeditor.js"></script>
    <!-- my script -->
    <script type="text/javascript" src="{{url('admin/assets/js/myscript.js')}}"></script>

    <script src="{{url('admin/assets/js/jquery-2.1.4.min.js')}}"></script>
     
    <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="{{url('admin/assets/js/bootstrap.min.js')}}"></script>

        <!-- page specific plugin scripts -->
    <script src="{{url('admin/assets/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{url('admin/assets/js/jquery.jqGrid.min.js')}}"></script>
    <script src="{{url('admin/assets/js/grid.locale-en.js')}}"></script>
    
    <!-- page specific styles -->
    @yield('pagespecificstyles')

</head>