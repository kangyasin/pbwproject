<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" >
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/menugue.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylegue.css') }}" rel="stylesheet">


  </head>
  <body>
      <div class="side-menu">

         <nav class="navbar navbar-default" role="navigation">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
             <div class="brand-wrapper">
                 <!-- Hamburger -->
                 <button type="button" class="navbar-toggle">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>

                 <!-- Brand -->
                 <div class="brand-name-wrapper">
                     <a class="navbar-brand" href="#">
                         Brand
                     </a>
                 </div>

                 <!-- Search -->
                 <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
                     <span class="glyphicon glyphicon-search"></span>
                 </a>

                 <!-- Search body -->
                 <div id="search" class="panel-collapse collapse">
                     <div class="panel-body">
                         <form class="navbar-form" role="search">
                             <div class="form-group">
                                 <input type="text" class="form-control" placeholder="Search">
                             </div>
                             <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
                         </form>
                     </div>
                 </div>
             </div>

         </div>

         <!-- Main Menu -->
         <div class="side-menu-container">
             <ul class="nav navbar-nav">

                 <li><a href="#"><span class="glyphicon glyphicon-send"></span> Link</a></li>
                 <li class="active"><a href="#"><span class="glyphicon glyphicon-plane"></span> Active Link</a></li>
                 <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Link</a></li>

                 <!-- Dropdown-->
                 <li class="panel panel-default" id="dropdown">
                     <a data-toggle="collapse" href="#dropdown-lvl1">
                         <span class="glyphicon glyphicon-user"></span> Sub Level <span class="caret"></span>
                     </a>

                     <!-- Dropdown level 1 -->
                     <div id="dropdown-lvl1" class="panel-collapse collapse">
                         <div class="panel-body">
                             <ul class="nav navbar-nav">
                                 <li><a href="#">Link</a></li>
                                 <li><a href="#">Link</a></li>
                                 <li><a href="#">Link</a></li>

                                 <!-- Dropdown level 2 -->
                                 <li class="panel panel-default" id="dropdown">
                                     <a data-toggle="collapse" href="#dropdown-lvl2">
                                         <span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>
                                     </a>
                                     <div id="dropdown-lvl2" class="panel-collapse collapse">
                                         <div class="panel-body">
                                             <ul class="nav navbar-nav">
                                                 <li><a href="#">Link</a></li>
                                                 <li><a href="#">Link</a></li>
                                                 <li><a href="#">Link</a></li>
                                             </ul>
                                         </div>
                                     </div>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </li>

                 <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>

                 @if(auth('customer')->user() !== null)
                 <li><a href="/customer/logout"><span class="glyphicon glyphicon-send"></span> Logout</a></li>
                 @else
                 <li><a href="/front/register"><span class="glyphicon glyphicon-send"></span> Register</a></li>
                 <li><a href="/front/login"><span class="glyphicon glyphicon-send"></span> Login</a></li>
                 @endif

             </ul>
         </div><!-- /.navbar-collapse -->
     </nav>

         </div>
    @show

    <div class="container">
      @yield('content')
    </div>
  </body>

  <script src="{{ asset('js/scriptgue.js') }}" defer></script>



</html>
