<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!--<link href="{{ URL::to('/') }}/packages/bunbo/css/app.css" rel="stylesheet">-->
    <link href="{{ URL::to('/') }}/packages/theme/assets/css/bootstrap.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/packages/theme/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/packages/theme/assets/css/zabuto_calendar.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/packages/theme/assets/js/gritter/css/jquery.gritter.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/packages/theme/assets/lineicons/style.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/packages/theme/assets/css/style.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/packages/theme/assets/css/style-responsive.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/packages/theme/assets/css/table-responsive.css" rel="stylesheet">
    <script src="{{ URL::to('/') }}/packages/theme/assets/js/chart-master/Chart.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <nav class="navbar navbar-inverse no-border-radius">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" data-target="#header-nav" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Admin Panel</a>
                </div>
                <div id="header-nav" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li {!! (Request::is('admin'))?'class="active"':'' !!}>
                            <a href="{{route('admin.home')}}">Home</a>
                        </li>
                        <li {!! (Request::is('admin/users'))?'class="active"':'' !!}>
                            <a href="{{route('admin.users')}}">Users</a>
                        </li>
                        @if (Entrust::can('show_roles_menu')||Entrust::hasRole('admin'))
                            <li {!! (Request::is('admin/roles'))?'class="active"':'' !!}>
                                <a href="{{route('admin.roles')}}">Roles</a>
                            </li>
                        @endif
                        @if (Entrust::can('show_permissions_menu')||Entrust::hasRole('admin'))
                            <li {!! (Request::is('admin/permissions'))?'class="active"':'' !!}>
                                <a href="{{route('admin.permissions')}}">Permissions</a>
                            </li>
                        @endif
                        @yield('menu_items')
                    </ul>
                    @yield('content_actions')
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::getUser()->email }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('admin.logout')}}">Logout</a></li>
                                <li><a href="{{ route('admin.users.password') }}">Change Password</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="wrapper">
        @yield('content')
    </div>

    <footer>
        <nav class="navbar navbar-default no-border-radius site-footer">
            <div class="container">
                ...
            </div>
        </nav>
    </footer>

    <!--<script type="text/javascript" src="{{ URL::to('/') }}/packages//bunbo/js/app.js"></script>-->
        
        
        
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ URL::to('/') }}/packages/theme/assets/js/jquery.js"></script>
    <script src="{{ URL::to('/') }}/packages/theme/assets/js/jquery-1.8.3.min.js"></script>
    <script src="{{ URL::to('/') }}/packages/theme/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="{{ URL::to('/') }}/packages/theme/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="{{ URL::to('/') }}/packages/theme/assets/js/jquery.scrollTo.min.js"></script>
    <script src="{{ URL::to('/') }}/packages/theme/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="{{ URL::to('/') }}/packages/theme/assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="{{ URL::to('/') }}/packages/theme/assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="{{ URL::to('/') }}/packages/theme/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="{{ URL::to('/') }}/packages/theme/assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="{{ URL::to('/') }}/packages/theme/assets/js/sparkline-chart.js"></script>    
    <script src="{{ URL::to('/') }}/packages/theme/assets/js/zabuto_calendar.js"></script>
        
    <!--custom switch-->
    <script src="{{ URL::to('/') }}/packages/theme/assets/js/bootstrap-switch.js"></script>
    <!--	
    <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to Dashgum!',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
            // (string | optional) the image to display on the left
            image: '{{ URL::to('/') }}/packages/theme/assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
    </script>
    -->
	
    <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
</body>
</html>
