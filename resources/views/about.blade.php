@extends('layouts.app')

@section('title', 'About WELC | Learn, Earn & Make Your Future')
@section('description', 'Learn more about WebExcels Learning Centre and the values behind our practical education model.')

@section('content')
<section class="bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-900 py-20 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-300">About us</p>
            <h1 class="mt-4 text-4xl font-bold sm:text-5xl">Driven by practical learning and real-world impact</h1>
            <p class="mt-6 text-lg text-slate-300">WebExcels Learning Centre is dedicated to helping students gain confidence, build portfolios, and create income-generating skills through industry-aligned training.</p>
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="grid gap-10 lg:grid-cols-2">
        <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-lg">
            <h2 class="text-2xl font-semibold text-slate-900">Our mission</h2>
            <p class="mt-4 text-lg leading-8 text-slate-600">We believe education should be practical, transparent, and career-focused. Our programs are designed to help students move from curiosity to competence quickly.</p>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-8 shadow-lg">
            <h2 class="text-2xl font-semibold text-slate-900">What we offer</h2>
            <ul class="mt-4 list-disc space-y-3 pl-6 text-lg text-slate-600">
                <li>Project-centered courses for practical growth</li>
                <li>Mentorship from professionals with experience</li>
                <li>Flexible training paths for freelancing and employment</li>
            </ul>
        </div>
    </div>
</section>
@endsection
