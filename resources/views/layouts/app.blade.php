<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        display: flex;
        min-height: 100vh;
    }

    .sidebar {
        width: 250px;
        background: #343a40;
        color: white;
        height: 100vh;
        padding-top: 20px;
        position: fixed;
    }

    .sidebar a {
        color: white;
        text-decoration: none;
        padding: 10px 20px;
        display: block;
    }

    .sidebar a:hover {
        background: #495057;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
        width: 100%;
    }

    .footer {
        position: fixed;
        bottom: 0;
        left: 250px;
        width: calc(100% - 250px);
        background: #343a40;
        color: white;
        text-align: center;
        padding: 10px;
    }
    </style>
</head>

<body>

    @include('inc.sidebar')
    <div class="content">
        @yield('content')
    </div>
    @include('inc.footer')



    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>

</html>