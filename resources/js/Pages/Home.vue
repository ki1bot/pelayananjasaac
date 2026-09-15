<script setup lang="ts">
import { Head } from "@inertiajs/vue3";

const technologies: string[] = [
    "Docker",
    "Laravel 12",
    "Inertia 2",
    "Vue 3",
    "TypeScript",
    "Tailwind CSS 4",
    "MySQL 8.4",
];
</script>

<template>
    <Head title="Home" />

    <main
        class="flex min-h-screen items-center justify-center bg-zinc-950 px-6 text-white"
    >
        <div class="w-full max-w-3xl">
            <p class="mb-3 text-sm font-medium text-blue-400">
                Laravel Docker Stack
            </p>

            <h1 class="text-4xl font-bold tracking-tight sm:text-6xl">
                Laravel 12 + Vue TypeScript
            </h1>

            <p class="mt-6 text-lg leading-8 text-zinc-400">
                Project berhasil menggunakan Laravel, Inertia, Vue, TypeScript,
                Tailwind CSS, MySQL, dan Docker.
            </p>

            <div class="mt-8 flex flex-wrap gap-3">
                <span
                    v-for="technology in technologies"
                    :key="technology"
                    class="rounded-lg border border-zinc-800 bg-zinc-900 px-4 py-2 text-sm text-zinc-300"
                >
                    {{ technology }}
                </span>
            </div>
        </div>
    </main>
</template>
