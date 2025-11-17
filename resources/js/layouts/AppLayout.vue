<script setup lang="ts">
import Nav from '@/components/Nav.vue';
</script>
<template>
    <div
        class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center lg:p-8 dark:bg-[#0a0a0a]"
    >
        <Nav />
        <main class="text-white">
            <h1 class="text-3xl font-bold">TrackStats</h1>
            <slot />
        </main>
    </div>
</template>
