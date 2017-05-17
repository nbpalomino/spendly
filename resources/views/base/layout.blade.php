<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Spendly</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Loading Material -->
    <link rel="stylesheet" href="/assets/css/reset.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/assets/css/material.min.css" />
    <link rel="stylesheet" href="/assets/css/mdl-selectfield.min.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="shortcut icon" href="/favicon.ico">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <style>
      .background {
        background-color: #EEEEEE;
      }
      .page-content {
        max-width: 920px;
        padding-left: 10px;
        padding-right: 10px;
        margin: 1rem auto;
      }
    </style>
  </head>
  <body>
    @yield('main')
    <!-- /.container -->
    <!-- Load JS here for greater good =============================-->
    <script async src="/assets/js/material.min.js"></script>
    <script async src="/assets/js/mdl-selectfield.min.js"></script>
    @yield("scripts")
  </body>
</html>
