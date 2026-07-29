@extends('layouts.app')

@section('title', 'Contact WELC | Learn, Earn & Make Your Future')
@section('description', 'Get in touch with WELC for course admissions, questions, and enrollment support.')

@section('content')
<section class="bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-900 py-20 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-300">Contact us</p>
        <h1 class="mt-4 text-4xl font-bold sm:text-5xl">Start your next chapter with WELC</h1>
        <p class="mt-6 max-w-2xl text-lg text-slate-300">Reach out for course details, upcoming batches, or enrollment guidance.</p>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="grid gap-10 lg:grid-cols-[1fr_0.8fr]">
        <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-lg">
            <h2 class="text-2xl font-semibold text-slate-900">Get in touch</h2>
            <p class="mt-4 text-lg leading-8 text-slate-600">We’re happy to help you find the right course, schedule, or learning pathway.</p>
            <div class="mt-8 space-y-4 text-slate-600">
                <p><span class="font-semibold text-slate-900">Phone:</span> +92-334-8086611</p>
                <p><span class="font-semibold text-slate-900">Email:</span> edu@welc.pk</p>
                <p><span class="font-semibold text-slate-900">Locations:</span> Sialkot &amp; Lahore</p>
            </div>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-8 shadow-lg">
            <h2 class="text-2xl font-semibold text-slate-900">Quick enrollment</h2>
            <form class="mt-6 space-y-4">
                <input class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3" placeholder="Your name" />
                <input class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3" placeholder="Your email" />
                <textarea class="min-h-[120px] w-full rounded-2xl border border-slate-200 bg-white px-4 py-3" placeholder="Tell us which course you are interested in"></textarea>
                <button class="rounded-full bg-cyan-500 px-5 py-3 font-semibold text-white">Send message</button>
            </form>
        </div>
    </div>
</section>
@endsection
