<!DOCTYPE html>
<html lang={{ app()->getLocale() }}>

<head>
    <title>Laravel App</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com?css?family=Raleway:100,600"
    rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrapcdn/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>