@extends('layouts.app')

@section('title', 'Home — Organization Archive')

@section('content')

    {{-- HERO --}}
    <section class="mx-auto max-w-6xl px-6 py-24">

        <div class="max-w-3xl">

            <p class="mb-4 text-sm font-medium uppercase tracking-[0.25em] text-zinc-500">
                Organization Archive · {{ $period?->year }}
            </p>

            <h1 class="text-5xl font-semibold tracking-tight sm:text-7xl">
                {{ $period?->cabinet?->name ?? 'Organization Archive' }}
            </h1>

            <p class="mt-6 text-xl leading-8 text-zinc-400">
                {{ $period?->cabinet?->tagline }}
            </p>

            <div class="mt-8 flex gap-4">
                <a
                    href="#organization"
                    class="rounded-full bg-white px-6 py-3 text-sm font-medium text-black transition hover:bg-zinc-200"
                >
                    Explore Organization
                </a>

                <a
                    href="#about"
                    class="rounded-full border border-white/15 px-6 py-3 text-sm font-medium text-white transition hover:bg-white/5"
                >
                    About
                </a>
            </div>

        </div>

    </section>


    {{-- ORGANIZATION --}}
    <section
        id="organization"
        class="border-y border-white/10 bg-white/[0.02]"
    >
        <div class="mx-auto max-w-6xl px-6 py-20">

            <div class="mb-10">
                <p class="text-sm uppercase tracking-[0.2em] text-zinc-500">
                    Structure
                </p>

                <h2 class="mt-2 text-3xl font-semibold">
                    Our Organization
                </h2>
            </div>


            <div class="grid gap-5 md:grid-cols-3">

                @foreach ($period?->cabinet?->organizationalUnits ?? [] as $unit)

                    <article
                        class="group rounded-2xl border border-white/10 bg-zinc-900 p-6 transition duration-300 hover:-translate-y-1 hover:border-white/20"
                    >

                        <div class="mb-8 flex items-center justify-between">

                            <span class="rounded-full bg-white/10 px-3 py-1 text-xs font-medium uppercase tracking-wide text-zinc-300">
                                {{ $unit->short_name ?? $unit->type }}
                            </span>

                            <span class="text-zinc-600 transition group-hover:text-zinc-400">
                                →
                            </span>

                        </div>

                        <h3 class="text-xl font-semibold">
                            {{ $unit->name }}
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-zinc-400">
                            {{ $unit->description }}
                        </p>

                    </article>

                @endforeach

            </div>

        </div>
    </section>


    {{-- ABOUT --}}
    <section id="about" class="mx-auto max-w-6xl px-6 py-20">

        <div class="grid gap-12 md:grid-cols-2">

            <div>
                <p class="text-sm uppercase tracking-[0.2em] text-zinc-500">
                    About
                </p>

                <h2 class="mt-2 text-3xl font-semibold">
                    {{ $period?->cabinet?->name }}
                </h2>
            </div>

            <div>
                <p class="leading-8 text-zinc-400">
                    {{ $period?->cabinet?->description }}
                </p>

                <div class="mt-8 grid grid-cols-2 gap-4">

                    <div class="rounded-2xl border border-white/10 bg-zinc-900 p-5">
                        <p class="text-3xl font-semibold">
                            {{ $period?->cabinet?->organizationalUnits?->count() ?? 0 }}
                        </p>

                        <p class="mt-1 text-sm text-zinc-500">
                            Organizational Units
                        </p>
                    </div>

                    <div class="rounded-2xl border border-white/10 bg-zinc-900 p-5">
                        <p class="text-3xl font-semibold">
                            {{ $period?->year }}
                        </p>

                        <p class="mt-1 text-sm text-zinc-500">
                            Current Period
                        </p>
                    </div>

                </div>
            </div>

        </div>

    </section>

@endsection