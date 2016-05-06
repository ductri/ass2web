<body>
<!-- Header -->
<nav class="navbar navbar-inverse nonedis visible-xs" id="navadd1">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bellow1">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
      </button>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ss">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
      </button>
      <img class="navbar-brand" src="/pub/img/logo.png" alt="logo" style="height: 45px;width: auto;padding: 0px;padding-right: 5px;">
      <a href="../tuanBD/theme.html" class="navbar-brand" style="color: white;font-size: 17px;padding-left: 5px;">T-Share</a>
    </div>
    <div class="collapse navbar-collapse" id="ss">
      <div class="input-group stylish-input-group" id="search1">
        <input type="text" class="form-control"  placeholder="Search" >
        <span class="input-group-addon">
          <button type="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right" style="padding-right: 5%; display: block">
        <li><a href="../keo/Upload/upload.html">Up load</a></li>
        <li><span>Welcome, <?php echo $_SESSION["username"]?></li>
      </ul>
    </div>
  </div>
  <div id="bellow1" class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right" style="padding-left: 2%; display: block">
      <li><a href="/">Home</a></li>
      <li>
        <a href="" class="dropdown-toggle" data-toggle="dropdown">Menu<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/admin/users">Users</a></li>
          <li><a href="/admin/topics">Topics</a></li>
          <li><a href="/admin/slides">Slides</a></li>
      </li>
    </ul>
  </div>
</nav>
<nav class="navbar navbar-inverse nonedis hidden-xs" id="navadd">
  <div class="container-fluid" id="header">
    <div class="navbar-header" id="headerIcon">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="glyphicon glyphicon-flash" aria-hidden="true"></span>
      </button>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bellow2">
        <span class="glyphicon glyphicon-flash" aria-hidden="true"></span>
      </button>
      <img class="navbar-brand" src="/pub/img/logo.png" alt="logo"  style="height: 45px;width: auto;padding: 0px;padding-right: 10px;">
      <a href="/" class="navbar-brand" style="color: white;font-size: 22px;"> T-Share | </a>
    </div>
    <div class="collapse navbar-collapse">
      <div class="input-group stylish-input-group" id="search">
        <input type="text" class="form-control"  placeholder="Search" >
        <span class="input-group-addon">
          <button type="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
      <ul class="nav navbar-nav navbar-right" style="padding-right: 10%; display: block">
        <li><button type="button" class="btn btn-danger" style="margin-top: 10%" onclick="location.href='/upload';">Upload</button></li>
        <li><a style="color: white;"><strong><?php echo $_SESSION["username"]?></strong></a></li>
        <li><a href="/logout">Logout</a> </li>
      </ul>
    </div>
  </div>

  <div id="bellow2" class="hidden-xs">
    <div class="collapse navbar-collapse">
     <ul class="nav navbar-nav navbar-left" style="padding-right: 5%; display: block">
        <li><a href="/">Home</a></li>
        <li><a href="/admin/users">Users</a></li>
        <li><a href="/admin/topics">Topics</a></li>
        <li><a href="/admin/slides">Slides</a></li>
      </ul>
    </div>
  </div>
</nav>
