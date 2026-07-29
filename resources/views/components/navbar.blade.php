<header class="bg-slate-950 text-white">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="text-xl font-semibold tracking-wide">WELC</a>
        <nav class="hidden gap-6 text-sm md:flex">
            <a href="{{ route('home') }}" class="hover:text-cyan-300">Home</a>
            <a href="{{ route('about') }}" class="hover:text-cyan-300">About</a>
            <a href="{{ route('courses') }}" class="hover:text-cyan-300">Courses</a>
            <a href="{{ route('gallery') }}" class="hover:text-cyan-300">Gallery</a>
            <a href="{{ route('contact') }}" class="hover:text-cyan-300">Contact</a>
        </nav>
        <a href="{{ route('contact') }}" class="rounded-full bg-cyan-500 px-4 py-2 text-sm font-semibold text-white transition hover:bg-cyan-400">Create Account</a>
    </div>
</header>
