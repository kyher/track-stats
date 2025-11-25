<script setup lang="ts">
import Nav from '@/components/Nav.vue';
</script>
<template>
    <div
        class="flex min-h-screen flex-col items-center bg-[#27272a] p-6 text-white lg:justify-center lg:p-8"
    >
        <Nav />
        <main>
            <slot />
        </main>
    </div>
</template>
