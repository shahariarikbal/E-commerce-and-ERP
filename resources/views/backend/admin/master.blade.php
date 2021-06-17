<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>Admin | Dashboard </title>
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="">
    <meta name="author" content="#">

    @include('backend.admin.include.style')

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/backend/') }}/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('/backend/') }}/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    {{-- js tree --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css" rel="stylesheet"/>

    <style>
        .custom-btn-color {
            background-color: #37a000; color: white; margin-top: -30px;
        }
    </style>

    @yield('style')
</head>

<body>

            {{-- @dd(Session::get('admin')->users) --}}
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <!---Header--->
        @include('backend.admin.include.header')

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <!---Sidebar--->
                @include('backend.admin.include.sidebar')
                <!---Sidebar--->

                @yield('content')

            </div>
        </div>
    </div>
</div>

@include('backend.admin.include.script')
<!-- Select2 -->
<script src="{{ asset('/backend/') }}/select2/js/select2.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://unpkg.com/file-upload-with-preview@4.0.8/dist/file-upload-with-preview.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<script>
    var upload = new FileUploadWithPreview('myUniqueUploadId', {
        maxFileCount: 4,
        text: {
            chooseFile: 'Maximum 4 Images Allowed',
            browse: 'Add More Images',
            selectedCount: 'Files Added',
        },
    });
</script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })

    // jstree
      $(function () {
        // create an instance when the DOM is ready
        $('#jstree').jstree({            
            "core": {
                "themes":{
                    "icons":false, 
                    "variant" : "large"
                }
            },
        });
        // bind to events triggered on the tree
        $('#jstree').on("changed.jstree", function (e, data) {
          console.log(data.selected);
        });
        // interact with the tree - either way is OK
        $('button').on('click', function () {
          $('#jstree').jstree(true).select_node('child_node_1');
          $('#jstree').jstree('select_node', 'child_node_1');
          $.jstree.reference('#jstree').select_node('child_node_1');
        });
      });

    @if (Session::has('my_success'))        
        $(document).ready(function() {
            toastr.success('{{ Session::get('my_success')}}');
        });
    @endif
</script>

@yield('script')
</body>

</html>
