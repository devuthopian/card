<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- header -->
        @include('admin.includes.header')
    </head>
    <body onload="sizing()" onresize="sizing()">
        <div class="wrapper">
            <div class="admin_panel">
                <div class="top_bar"><div class="col-sm-12"><p>www.misbits</p></div></div>
                <!-- navigation -->
                @include('admin.includes.navigation')

                <!-- content -->
                @yield('content')
                
                <!-- footer -->
                @include('admin.includes.footer')
                <!--end footer-->
            </div>
        </div>
        <!--end wrapper-->
        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
             <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>