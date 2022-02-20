<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    @include('layouts.css')

</head>

<body>

@include('layouts.header')
   
    @include('layouts.sidebar')
               

                    @yield('content')

            <!-- Footer -->
            @include('layouts.footer')

        <!-- End of Content Wrapper -->

    <!-- End of Page Wrapper -->

   

    <!-- Bootstrap core JavaScript-->
    @include('layouts.js')


</body>

</html>