@extends('layouts.app')

@section('title', 'WELC | Learn, Earn & Make Your Future')
@section('description', 'Explore practical digital skills courses, batches, and student success stories at WELC.')

@section('content')
<section class="bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-900 text-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-20 sm:px-6 lg:grid-cols-[1.1fr_0.9fr] lg:px-8 lg:py-28">
        <div class="max-w-2xl">
            <p class="mb-4 inline-flex rounded-full border border-cyan-400/40 bg-cyan-500/10 px-3 py-1 text-sm font-medium text-cyan-200">Pakistan's trusted digital skills institute</p>
            <h1 class="text-4xl font-bold leading-tight sm:text-5xl lg:text-6xl">Learn, Earn &amp; Make Your Future</h1>
            <p class="mt-6 text-lg text-slate-300">Master practical skills like AI, design, development, marketing, and freelancing through industry-led training built for real-world success.</p>
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('courses') }}" class="rounded-full bg-cyan-500 px-6 py-3 font-semibold text-white transition hover:bg-cyan-400">Explore Courses</a>
                <a href="{{ route('contact') }}" class="rounded-full border border-white/20 px-6 py-3 font-semibold text-white transition hover:bg-white/10">Upcoming Batches</a>
            </div>
            <div class="mt-10 flex flex-wrap gap-8 text-sm text-slate-300">
                <div><div class="text-2xl font-semibold text-white">50+</div><div>Batches Delivered</div></div>
                <div><div class="text-2xl font-semibold text-white">10k+</div><div>Students Trained</div></div>
                <div><div class="text-2xl font-semibold text-white">100%</div><div>Practical Learning</div></div>
            </div>
        </div>
        <div class="rounded-3xl border border-white/10 bg-white/10 p-4 shadow-2xl backdrop-blur">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=900&q=80" alt="Students learning together" class="h-[420px] w-full rounded-2xl object-cover" />
        </div>
    </div>
</section>

<section id="courses" class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-600">Popular programs</p>
            <h2 class="text-3xl font-bold text-slate-900">Featured courses</h2>
        </div>
        <a href="{{ route('courses') }}" class="text-sm font-semibold text-cyan-700">View all programs →</a>
    </div>
    <div class="mt-10 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
        <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-lg">
            <div class="flex items-center justify-between text-sm text-slate-500"><span>Graphic Design</span><span>3 Months</span></div>
            <h3 class="mt-4 text-xl font-semibold text-slate-900">Graphic Design with AI</h3>
            <p class="mt-3 text-sm leading-6 text-slate-600">Learn modern design principles, AI-enhanced workflows, and portfolio-ready visuals.</p>
            <div class="mt-6 flex items-center justify-between">
                <p class="text-lg font-semibold text-slate-900">Rs 70,000</p>
                <a href="{{ route('contact') }}" class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white">Enroll</a>
            </div>
        </article>
        <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-lg">
            <div class="flex items-center justify-between text-sm text-slate-500"><span>Video Editing</span><span>2.5 Months</span></div>
            <h3 class="mt-4 text-xl font-semibold text-slate-900">Video Editing</h3>
            <p class="mt-3 text-sm leading-6 text-slate-600">Create compelling edits for reels, ads, podcasts, and social media campaigns.</p>
            <div class="mt-6 flex items-center justify-between">
                <p class="text-lg font-semibold text-slate-900">Rs 60,000</p>
                <a href="{{ route('contact') }}" class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white">Enroll</a>
            </div>
        </article>
        <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-lg">
            <div class="flex items-center justify-between text-sm text-slate-500"><span>Development</span><span>11 Months</span></div>
            <h3 class="mt-4 text-xl font-semibold text-slate-900">Full Stack MERN Developer</h3>
            <p class="mt-3 text-sm leading-6 text-slate-600">Build complete web applications with React, Node, Express, and MongoDB.</p>
            <div class="mt-6 flex items-center justify-between">
                <p class="text-lg font-semibold text-slate-900">Rs 75,000</p>
                <a href="{{ route('contact') }}" class="rounded-full bg-slate-900 px-4 py-2 text-sm font-semibold text-white">Enroll</a>
            </div>
        </article>
    </div>
</section>

<section id="about" class="bg-white py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.95fr_1.05fr] lg:px-8">
        <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&w=900&q=80" alt="Instructor guiding students" class="h-[430px] w-full rounded-3xl object-cover" />
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-600">Why WELC</p>
            <h2 class="mt-3 text-3xl font-bold text-slate-900">About WebExcels Learning Centre</h2>
            <p class="mt-6 text-lg leading-8 text-slate-600">WELC helps learners grow into confident creators through practical training, career guidance, and project-based learning designed for the modern digital economy.</p>
            <div class="mt-8 grid gap-4 sm:grid-cols-2">
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5"><h3 class="font-semibold text-slate-900">Expert instructors</h3><p class="mt-2 text-sm text-slate-600">Learn from professionals with real industry experience.</p></div>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5"><h3 class="font-semibold text-slate-900">Hands-on projects</h3><p class="mt-2 text-sm text-slate-600">Build a portfolio while learning every step of the way.</p></div>
            </div>
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-3xl border border-slate-200 bg-gradient-to-br from-cyan-500 to-cyan-700 p-6 text-white shadow-lg">
            <h3 class="text-xl font-semibold">Expert Instructors</h3>
            <p class="mt-3 text-sm leading-6 text-cyan-50">Learn from mentors with real-world expertise and practical guidance.</p>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-lg">
            <h3 class="text-xl font-semibold text-slate-900">100% Hands-on</h3>
            <p class="mt-3 text-sm leading-6 text-slate-600">Every course is built around live projects and portfolio-ready work.</p>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-lg">
            <h3 class="text-xl font-semibold text-slate-900">Verified Certificate</h3>
            <p class="mt-3 text-sm leading-6 text-slate-600">Gain recognized credentials to support freelancing and professional growth.</p>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-lg">
            <h3 class="text-xl font-semibold text-slate-900">Learn to Earn</h3>
            <p class="mt-3 text-sm leading-6 text-slate-600">Develop job-ready and freelance-ready skills that create momentum fast.</p>
        </div>
    </div>
</section>

<section id="batches" class="bg-slate-900 py-20 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-400">Upcoming Learning</p>
                <h2 class="mt-3 text-3xl font-bold">Upcoming batches</h2>
            </div>
            <a href="{{ route('contact') }}" class="text-sm font-semibold text-cyan-300">Reserve your seat →</a>
        </div>
        <div class="mt-10 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
            <div class="rounded-3xl border border-white/10 bg-white/10 p-6 backdrop-blur">
                <h3 class="text-xl font-semibold">Amazon VA Class</h3>
                <p class="mt-3 text-sm text-slate-300">Mon / Wed / Fri • 11:00 am – 12:30 pm</p>
                <p class="mt-4 text-2xl font-semibold">Rs 30,000</p>
            </div>
            <div class="rounded-3xl border border-white/10 bg-white/10 p-6 backdrop-blur">
                <h3 class="text-xl font-semibold">SEO Mastery</h3>
                <p class="mt-3 text-sm text-slate-300">Tue / Thu / Sat • 3:30 pm – 5:00 pm</p>
                <p class="mt-4 text-2xl font-semibold">Rs 40,000</p>
            </div>
            <div class="rounded-3xl border border-white/10 bg-white/10 p-6 backdrop-blur">
                <h3 class="text-xl font-semibold">Graphic Designing</h3>
                <p class="mt-3 text-sm text-slate-300">Mon / Wed / Fri • 11:00 am – 12:30 am</p>
                <p class="mt-4 text-2xl font-semibold">Rs 35,000</p>
            </div>
        </div>
    </div>
</section>

<section id="events" class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="flex items-end justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-600">Campus life</p>
            <h2 class="mt-3 text-3xl font-bold text-slate-900">Recent events</h2>
        </div>
    </div>
    <div class="mt-10 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
        <article class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-lg">
            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=900&q=80" alt="Student event" class="h-44 w-full object-cover" />
            <div class="p-6"><h3 class="text-xl font-semibold text-slate-900">Excel Fest 2025</h3><p class="mt-3 text-sm leading-6 text-slate-600">A vibrant showcase of student creativity and innovation with live projects and networking.</p></div>
        </article>
        <article class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-lg">
            <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=900&q=80" alt="Workshop session" class="h-44 w-full object-cover" />
            <div class="p-6"><h3 class="text-xl font-semibold text-slate-900">AI & Design Workshop</h3><p class="mt-3 text-sm leading-6 text-slate-600">A hands-on session focused on practical AI tools for modern creatives and marketers.</p></div>
        </article>
        <article class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-lg">
            <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=900&q=80" alt="Networking event" class="h-44 w-full object-cover" />
            <div class="p-6"><h3 class="text-xl font-semibold text-slate-900">Career Networking Meet</h3><p class="mt-3 text-sm leading-6 text-slate-600">Connect with industry professionals, mentors, and founders shaping the future workforce.</p></div>
        </article>
    </div>
</section>

<section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-600">Student stories</p>
            <h2 class="mt-3 text-3xl font-bold text-slate-900">What our students say</h2>
        </div>
        <div class="mt-10 grid gap-8 lg:grid-cols-3">
            <blockquote class="rounded-3xl border border-slate-200 bg-slate-50 p-8 shadow-sm">
                <p class="text-lg leading-8 text-slate-700">“The hands-on approach helped me land my first freelance client within a month.”</p>
                <footer class="mt-6 font-semibold text-slate-900">Ayesha K.</footer>
            </blockquote>
            <blockquote class="rounded-3xl border border-slate-200 bg-slate-50 p-8 shadow-sm">
                <p class="text-lg leading-8 text-slate-700">“From zero coding to building live projects, the course was focused and practical.”</p>
                <footer class="mt-6 font-semibold text-slate-900">Hamza R.</footer>
            </blockquote>
            <blockquote class="rounded-3xl border border-slate-200 bg-slate-50 p-8 shadow-sm">
                <p class="text-lg leading-8 text-slate-700">“The curriculum was modern and directly helped me stand out in the market.”</p>
                <footer class="mt-6 font-semibold text-slate-900">Fatima S.</footer>
            </blockquote>
        </div>
    </div>
</section>

<section id="contact" class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="rounded-[2rem] bg-gradient-to-r from-slate-900 to-cyan-800 p-10 text-white shadow-2xl lg:p-14">
        <div class="grid gap-10 lg:grid-cols-[1fr_0.8fr]">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-300">Start your journey</p>
                <h2 class="mt-3 text-3xl font-bold sm:text-4xl">Ready to grow your future?</h2>
                <p class="mt-5 max-w-2xl text-lg text-slate-200">Join a community of learners building practical skills for freelancing, employment, and entrepreneurship.</p>
            </div>
            <div class="rounded-3xl border border-white/10 bg-white/10 p-6 backdrop-blur">
                <h3 class="text-xl font-semibold">Contact us</h3>
                <ul class="mt-4 space-y-3 text-sm text-slate-200">
                    <li>Phone: +92-334-8086611</li>
                    <li>Email: edu@welc.pk</li>
                    <li>Locations: Sialkot &amp; Lahore</li>
                </ul>
                <a href="mailto:edu@welc.pk" class="mt-6 inline-flex rounded-full bg-cyan-500 px-5 py-3 font-semibold text-white transition hover:bg-cyan-400">Get Started</a>
            </div>
        </div>
    </div>
</section>
@endsection
