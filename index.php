<!DOCTYPE HTML>

<html>

<head>
    <meta charset="utf-8">
    <title>REK-POL</title>


    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

    <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>

</head>

<body style="margin-top:100px">

    <header>
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">

              <a href="index.html" class="navbar-brand"><!--<img src="img/logo-rekpol.png" alt="REK-POL"/>--></a>

              <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
              </button>

              <div class="collapse navbar-collapse navHeaderCollapse">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" class ="active">Główna</a></li>
                    <li><a href="#">Lombard</a></li>
                    <li><a href="#">Kantor</a></li>
                    <li><a href="#">Biuro Nieruchomości</a></li>
                </ul>

              </div>
          </div>
        </nav>
    </header>
    <div class="container">
    <?php
        require('RssReader.php');
        $rss = new RssReader;
        $rss->setUrl("http://allegro.pl/rss.php/user?uid=9194770");
        $rss->getBootstrap();
    ?>
    </div>
    <footer>
            <div>
                <span>Copyright Cebula &copy;</span>
            </div>
    </footer>
</body>

</html>