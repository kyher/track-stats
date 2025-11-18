<script setup lang="ts">
import TrackList from '@/components/TrackList.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { TrackType } from '@/types';
import { Head } from '@inertiajs/vue3';
withDefaults(
    defineProps<{
        canRegister: boolean;
        tracks: TrackType[];
    }>(),
    {
        canRegister: true,
    },
);
</script>

<template>
    <Head title="Home" />

    <AppLayout>
        <TrackList :tracks="tracks" />
    </AppLayout>
</template>
