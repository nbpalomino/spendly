<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>{{ $org or 'Spendly' }}</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Loading Material -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/packages/material-design-lite/material.min.css" />
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
    <script defer src="/packages/material-design-lite/material.min.js"></script>
    <script src="/packages/vue/dist/vue.js"></script>
    @yield("scripts")
  </body>
</html>