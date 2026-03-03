<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ __('Pablo Barbershop') }} - @yield('title', 'Home')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('img/pbar.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        });

        const hiddenElements = document.querySelectorAll('.hidden, .hidden-down, .hidden-right, .hidden-left, .hidden-top');
        hiddenElements.forEach((el) => observer.observe(el));
    </script>

    <script>
        function toggleLangMenu() {
            const menu = document.getElementById("langMenu");
            menu.style.display = menu.style.display === "block" ? "none" : "block";
        }

        document.addEventListener("click", function(e) {
            const dropdown = document.querySelector(".language-dropdown");
            if (dropdown && !dropdown.contains(e.target)) {
                document.getElementById("langMenu").style.display = "none";
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
