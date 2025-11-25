<script setup lang="ts">
import AppLayout from './AppLayout.vue';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <AppLayout :title="title" :description="description">
        <slot />
    </AppLayout>
</template>
