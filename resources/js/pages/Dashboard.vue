<script setup lang="ts">
import DashboardTrackList from '@/components/DashboardTrackList.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { TrackType, VoteType } from '@/types';
import { Head } from '@inertiajs/vue3';
withDefaults(
    defineProps<{
        canRegister: boolean;
        tracks: TrackType[];
        userVote: VoteType;
    }>(),
    {
        canRegister: true,
    },
);
</script>

<template>
    <Head title="Home" />

    <AppLayout>
        <DashboardTrackList
            :tracks="tracks"
            :userVote="userVote"
            :readOnly="false"
        />
    </AppLayout>
</template>
