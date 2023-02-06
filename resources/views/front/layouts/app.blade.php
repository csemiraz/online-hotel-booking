<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="">
        <title>@yield('title') | Online Hotel Booking</title>        
		
        <link rel="icon" type="image/png" href="uploads/favicon.png">

        <!-- All CSS -->
        @include('front.layouts.styles')
        
        <!-- All Javascripts -->
        @include('front.layouts.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;500&display=swap" rel="stylesheet">
        
        <!-- Google Analytics -->
        <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84213520-6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-84213520-6');
        </script> -->

    </head>
    <body>
        
        @include('front.layouts.header')

        @include('front.layouts.nav')

        
        @yield('main_content')
        

        @include('front.layouts.footer')
		
        @include('front.layouts.scripts_footer')


		@if($errors->any())
            @foreach ($errors->all() as $error)
            <script>
                iziToast.error({
                    title: 'Error',
                    position: 'topRight',
                    message: '{{ $error }}',
                });
            </script>
            @endforeach
        @endif

    @if(session()->get('error'))
    <script>
        iziToast.error({
            title: 'Error',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
        });
    </script>
    @endif

    @if(session()->get('success'))
    <script>
        iziToast.success({
            title: 'Success',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
        });
    </script>
    @endif

   </body>
</html>