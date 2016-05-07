<script src="/pub/js/keo/signup/signup.js"></script>
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
      <a href="/" class="navbar-brand" style="color: white;font-size: 17px;padding-left: 5px;">T-Share</a>
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
        <li><a href="#" role="button" data-toggle="modal" data-target="#login-modal">Sign in</a></li>
        <li><a href="/signup">Sign up</a></li>
      </ul>
    </div>
  </div>
  <div id="bellow1" class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right" style="padding-left: 2%; display: block">
      <li><a href="/">Home</a></li>
      <li>
        <a href="" class="dropdown-toggle" data-toggle="dropdown">More Topics <b class="caret"></b></a>
        <ul class="dropdown-menu" id="nav_mobile">
          <li><a href="/catalog/1">Top Rate</a></li>
          <li><a href="/catalog/2">Top Download</a></li>
        </ul>
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
        <li><a href="#" role="button" data-toggle="modal" data-target="#login-modal">Sign in</a></li>
        <li><a href="/signup">Sign up</a></li>
      </ul>
    </div>
  </div>

  <div id="bellow2" class="hidden-xs">
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-left" style="padding-right: 5%; display: block" id="nav">
        <li><a href="/">Home</a></li>
        <li><a href="/catalog/1">Top Rate</a></li>
        <li><a href="/catalog/2">Top Download</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <img class="img-circle" id="img_logo" src="/pub/img/quang/user.png" alt="img"> <!-- http://bootsnipp.com/img/logo.jpg -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
      </div>

      <!-- Begin # DIV Form -->
      <div id="div-forms">

        <!-- Begin # Login Form -->
        <form id="login-form">
          <div class="modal-body">
            <div id="div-login-msg">
              <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
              <span id="text-login-msg">Type your username and password.</span>
            </div>
            <input id="login_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
            <input id="login_password" class="form-control" type="password" placeholder="Password" required>
            <div class="checkbox">
              <label>
                <input type="checkbox"> Remember me
              </label>
            </div>
          </div>
          <div class="modal-footer">
            <div>
              <button type="submit" class="btn btn-primary btn-lg btn-block" id="btnLogin">Login</button>
            </div>
            <div>
              <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
            </div>
          </div>
        </form>
        <!-- End # Login Form -->

        <!-- Begin | Lost Password Form -->
        <form id="lost-form" style="display:none;">
          <div class="modal-body">
            <div id="div-lost-msg">
              <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
              <span id="text-lost-msg">Send the password to your email !</span>
            </div>
            <input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
          </div>
          <div class="modal-footer">
            <div>
              <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
            </div>
            <div>
              <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
            </div>
          </div>
        </form>
        <!-- End | Lost Password Form -->
      </div>
      <!-- End # DIV Form -->

    </div>
  </div>
</div>

<script>
  var $id_web = "nav";
  var $id_mobile = "nav_mobile";
  function appendTopic($topic_id,$topic_name,$id){
            var li = document.createElement("LI");

            var a = document.createElement("A");
            
            a.href = "/catalog/" + $topic_id; 

            var ul = document.getElementById($id);  

            var data = document.createTextNode($topic_name);

            a.appendChild(data);

            li.appendChild(a);

            ul.appendChild(li);
        }

  var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://localhost/topic/get",
  "method": "GET",
  "dataType": "json"
}

$.ajax(settings).done(function (response) {


  for (var i = 0; i < response.length; ++i) {
          appendTopic(response[i].topicid,response[i].name,$id_web);
          appendTopic(response[i].topicid,response[i].name,$id_mobile);
      }
});

</script>

</body>
<!-- END # MODAL LOGIN -->