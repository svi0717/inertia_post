<template>
    <Head title="Inertia Post"></Head>
    <Navbar/>
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <section class="h-screen">
            <slot></slot>
        </section>
    </div>
</template>

<script setup>
import Navbar from "@/components/Navbar.vue";
import { Head } from '@inertiajs/vue3'
</script>
