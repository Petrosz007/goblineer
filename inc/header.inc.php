
<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/"> 
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">

      <!-- Chrome, Firefox OS and Opera -->
      <meta name="theme-color" content="#3a8df4">
      <!-- Windows Phone -->
      <meta name="msapplication-navbutton-color" content="#3a8df4">
      <!-- iOS Safari -->
      <meta name="apple-mobile-web-app-status-bar-style" content="#3a8df4">

      <link rel="manifest" href="./manifest.json" />
      <script defer src="./site.js"></script>

      <link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>
      <title>Goblineer</title>
      <meta name="description" content="In-depth data analizer tool for the World of Warcraft Auction House">
      <meta name="keywords" content="wow,ah,goblineer,money,gold">
      <meta name="author" content="Peter Andi">

      <link rel="stylesheet" href="./css/master.css">

      <script async type="text/javascript" src="//wow.zamimg.com/widgets/power.js"></script>
      <script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>

      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      

      <script async>
         //Google Analytics
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-102757928-1', 'auto');
        ga('send', 'pageview');

      </script>
   </head>
   <body>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Goblineer</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="/custom">Custom Tables</a></li>
              <li><a href="/seller">Look up a Seller</a></li>
              <li><a href="/addon">Addon</a></li>
            </ul>
            <div class="navbar-form navbar-left" id="search-from">
               <div class="input-group" id="nav-input-group">
                    <input type="text" list="items" placeholder="Type item name or id here..." name="item" id="item" class="search form-control" autocomplete="off">
                    <div id="search-dropdown" class="list-group suggestions"></div>
                  <span class="input-group-btn">
                    <button id="searchSubmit" class="btn btn-default">Search</button>
                  </span>
              </div>
            </div>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      <div class="container-fluid" id="bootstrap-overrides">
         <div class="col-md-3 col-sm-1 col-xs-0">
         </div>

         <div class="col-md-6 col-sm-8 col-xs-12">
