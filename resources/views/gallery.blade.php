@extends('layouts.app')

@section('title', 'Gallery | WELC')
@section('description', 'View highlights from WELC events, training sessions, and campus life.')

@section('content')
<section class="bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-900 py-20 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="text-sm font-semibold uppercase tracking-[0.3em] text-cyan-300">Gallery</p>
        <h1 class="mt-4 text-4xl font-bold sm:text-5xl">Moments from our learning community</h1>
        <p class="mt-6 max-w-2xl text-lg text-slate-300">A snapshot of the creativity, events, and collaboration that make WELC special.</p>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
    <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
        @for($i = 0; $i < 6; $i++)
        <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-lg">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80" alt="WELC learning experience" class="h-56 w-full object-cover" />
        </div>
        @endfor
    </div>
</section>
@endsection
