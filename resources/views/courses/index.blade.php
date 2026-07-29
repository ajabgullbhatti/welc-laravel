@extends('layouts.app')

@section('title', 'Courses | WELC')
@section('description', 'Browse WELC courses in design, development, marketing, and more.')

@section('content')
<section class="bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-900 py-20 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-300">Our programs</p>
        <h1 class="mt-4 text-4xl font-bold sm:text-5xl">Choose a skill path that fits your goals</h1>
        <p class="mt-6 max-w-2xl text-lg text-slate-300">Explore practical learning experiences designed to help you build real capabilities and grow your career.</p>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
        @foreach($courses as $course)
        <article class="rounded-3xl border border-slate-200 bg-white p-6 shadow-lg">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-cyan-600">{{ $course['category'] }}</p>
            <h2 class="mt-3 text-2xl font-semibold text-slate-900">{{ $course['title'] }}</h2>
            <p class="mt-3 text-sm leading-6 text-slate-600">A practical course designed for learners who want to gain confidence and build useful skills quickly.</p>
            <div class="mt-6 flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Duration</p>
                    <p class="font-semibold text-slate-900">{{ $course['duration'] }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-slate-500">Price</p>
                    <p class="font-semibold text-slate-900">{{ $course['price'] }}</p>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</section>
@endsection
