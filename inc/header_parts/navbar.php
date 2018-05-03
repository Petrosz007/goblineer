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
            <li><a href="/blog">Blog</a></li>
            <li><a href="/addon">Addon</a></li>
            <li><a href="/uc">Undercut Checker</a></li>
            <li><a href="/seller">Look up a Seller</a></li>
            <li><a href="/custom">Custom Tables</a></li>
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