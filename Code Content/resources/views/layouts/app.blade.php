<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') </title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/home.css" rel="stylesheet" type="text/css">
    
     <!-- Angular Material style sheet -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
    
    <!-- AngularJS library -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>

     <!-- Angular Material Library -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
    
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    @yield('extra_links')
    
</head>
<body>
    <div id="app" ng-app="preQuiz-module"  ng-controller="sidenav-controller" ng-cloak>
        <nav class="navbar navbar-default navbar-fixed-top" style="border-width: 0 0 1px;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                       <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav" >
                        <li><a href="" class="navbar-brand" ng-click="toggleLeft()"> 
                        <div class ="bar"></div>
                        <div class ="bar"></div>
                        <div class ="bar"></div>
                        </a></li>
                    </ul>
                    
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src = "/img/LogoMakr.png" >
                    </a>
                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse" >
                 
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}"><img src = "/img/login.png" style = "height:15px;"></a></li>
                            <li><a href="{{ route('register') }}"><img src = "/img/register.png" style = "height:15px;"></a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            
        </nav>
        <!-- side nav content -->
        <md-sidenav md-component-id="left" md-is-open="isSidenavOpen" class="md-sidenav-left affix" >
            
            <md-toolbar>
                <h1 class="md-toolbar-tools"> Menu options </h1>
            </md-toolbar>
          
            <md-content layout-margin >
              
                @if (Auth::check())
                    <img src = "/img/profile_pic.jpg">
                    <p>{{ Auth::user()->name }}</p>
                    <a class="list-group-item" href="" ng-click="toggleLeft()"> Notifications <span class="badge badge-default badge-pill"> 3 </span> </a> 
                    <a class="list-group-item" href="" ng-click="toggleLeft()"> Create a quiz </a> 
                    <a class="list-group-item" href="" ng-click="toggleLeft()"> My Quizzes </a> 
                    <a class="list-group-item" href="{{ url('/profile') }}" ng-click="toggleLeft()"> My Profile </a>
                @else
                    <a class="list-group-item" href="" ng-click="dispErrMsg($event)"> Notifications <span class="badge badge-default badge-pill"> 3 </span> </a> 
                    <a class="list-group-item" href="" ng-click="dispErrMsg($event)"> Create a quiz </a> 
                    <a class="list-group-item" href="" ng-click="dispErrMsg($event)"> Edit a quiz </a> 
                    <a class="list-group-item" href="" ng-click="dispErrMsg($event)"> My profile </a> 
                @endif
                    <a class="list-group-item" href="" ng-click="toggleLeft()"> About us </a> 
                    <a class="list-group-item" href="" ng-click="toggleLeft()"> Contact us </a> 
                    <a class="list-group-item md-accent" href="" ng-click="toggleLeft()"> Close menu </a> 
            </md-content>
        </md-sidenav>
        
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src='/js/preQuiz-module.js'> </script>
    
</body>
</html>
