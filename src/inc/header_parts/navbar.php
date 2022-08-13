<nav id="main-navbar" class="navbar navbar-default navbar-fixed-top">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="./">Goblineer</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav navbar-center">
            <li role="presentation" class="dropdown navbar-hoverable">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="./categories/alchemy.php">Alchemy</a></li>
                    <li><a href="./categories/enchanting.php">Enchanting</a></li>
                    <li><a href="./categories/inscription.php">Inscription</a></li>

                    <li role="separator" class="divider"></li>

                    <li><a href="./categories/herbalism.php">Herbalism</a></li>
                    <li><a href="./categories/mining.php">Mining</a></li>
                    <li><a href="./categories/skinning.php">Skinning</a></li>

                    <li role="separator" class="divider"></li>

                    <li><a href="./categories/blacksmithing.php">Blacksmithing</a></li>
                    <li><a href="./categories/leatherworking.php">Leatherworking</a></li>
                    <li><a href="./categories/tailoring.php">Tailoring</a></li>

                    <li role="separator" class="divider"></li>

                    <li><a href="./categories/jewelcrafting.php">Jewelcrafting</a></li>
                    <li><a href="./categories/engineering.php">Engineering</a></li>
                    <li><a href="./categories/cooking.php">Cooking</a></li>
                </ul>
            </li>
            <li class="navbar-hoverable"><a href="./addon.php">Addon</a></li>
            <li class="navbar-hoverable"><a href="./uc.php">Undercut Checker</a></li>
            <li class="navbar-hoverable"><a href="./seller.php">Seller Search</a></li>
            <li class="navbar-hoverable"><a href="./custom.php">Custom Tables</a></li>
        </ul>

        <div class="navbar-form navbar-right" id="search-from">
            <div class="input-group" id="nav-input-group">
                <input type="text" list="items" placeholder="Type item name or id here..." name="item" id="item" class="search form-control" autocomplete="off">
                <div id="search-dropdown" class="list-group suggestions"></div>
                <span class="input-group-btn">
                    <button id="searchSubmit" class="btn btn-default">Search</button>
                </span>
            </div>
        </div>

    </div><!-- /.navbar-collapse -->

</nav>
