<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title')</title>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/additional.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    @yield('content')

    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/jquery-migrate-3.3.0.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/additional.js"></script>

    @yield('page_scripts')
    
  </body>
</html>