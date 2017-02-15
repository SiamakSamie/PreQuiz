<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    
    <!-- Angular Material style sheet -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">

    <link href="css/app.css" rel="stylesheet">
    <link href="css/welcome.css" rel="stylesheet" type="text/css" >


    
    <!-- Angular Scripts -->

    <!-- Angular Material requires Angular.js Libraries -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
    
    

    <!-- Angular Material Library -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>
    
  
    <div ng-app="myapp">
        
        <div layout="row" ng-controller="MyController" >
            <md-sidenav md-component-id="left" md-is-open="isSidenavOpen" class="md-sidenav-left" >
                <md-toolbar class="md-theme-indigo">
                    <h1 class="md-toolbar-tools">YASS QUEEN</h1>
                </md-toolbar>
              
                <md-content layout-margin="">
                  
                    @if (Auth::check())
                    <p>something</p>
                    <p>something</p>
                    <p>something</p>
    
                    @else
                    <p>For These amazing features... please</p>
                    <md-button ng-click="toggleLeft()" class="md-accent">LOGIN</md-button>
                    <p>or</p>
                    <md-button ng-click="toggleLeft()" class="md-accent">Register</md-button>
                    @endif
                    <md-button ng-click="toggleLeft()" class="md-accent">Close this Sidenav</md-button>
              </md-content>
          
            </md-sidenav>
            <md-content >
                <md-button ng-click="openLeftMenu()">MENU</md-button>
            </md-content>
        </div>
    </div>
        

    <div id="app">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
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
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="js/app.js"></script>

    <script>
        var app = angular.module('myapp', ['ngMaterial']);
        app.controller('MyController', function($scope, $mdSidenav) {
          $scope.isSidenavOpen = false;
          $scope.openLeftMenu = function() {
            $mdSidenav('left').toggle();
          };
          $scope.toggleLeft = function() {
            $mdSidenav('left').toggle();
          };
        }); 
    </script>   


</body>
</html>
