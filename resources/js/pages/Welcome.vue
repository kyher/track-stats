<script setup lang="ts">
import TrackList from '@/components/TrackList.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { TrackType } from '@/types';
import { Head } from '@inertiajs/vue3';

withDefaults(
    defineProps<{
        canRegister: boolean;
        tracks: TrackType[];
        highestVotedTracks: TrackType[];
    }>(),
    {
        canRegister: true,
    },
);
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <AppLayout>
        <TrackList
            :tracks="tracks"
            :readOnly="true"
            :highestVotedTracks="highestVotedTracks"
        />
    </AppLayout>
</template>
