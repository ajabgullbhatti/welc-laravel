<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WELC | Learn, Earn & Make Your Future')</title>
    <meta name="description" content="@yield('description', 'Practical digital skills training for modern learners and professionals.')">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-700 antialiased">
    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    <!-- Airag Chatbot Widget -->
    <script src="https://airagchatbot.com/widget.js" data-org="cms6cz09j00009kvj4y6z3frq"></script>
</body>
</html>
