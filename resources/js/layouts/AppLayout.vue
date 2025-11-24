<script setup lang="ts">
import Nav from '@/components/Nav.vue';
</script>
<template>
    <div
        class="flex min-h-screen flex-col items-center bg-gradient-to-b from-black via-gray-900 to-black p-6 text-white lg:justify-center lg:p-8"
    >
        <Nav />
        <main>
            <slot />
        </main>
    </div>
</template>
