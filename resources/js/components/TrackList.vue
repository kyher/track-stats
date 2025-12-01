<script setup lang="ts">
import { TrackType } from '@/types';
import { defineProps } from 'vue';
import HighlightedTrack from './HighlightedTrack.vue';
import Track from './Track.vue';
const props = defineProps<{
    tracks: TrackType[];
    highestVotedTracks: TrackType[];
}>();
const { tracks } = props;
</script>
<template>
    <div
        v-if="highestVotedTracks && highestVotedTracks.length > 0"
        class="mb-8"
    >
        <HighlightedTrack
            v-for="highestVotedTrack in highestVotedTracks"
            :key="highestVotedTrack.id"
            :track="highestVotedTrack"
        />
    </div>

    <div class="mt-4 grid gap-4 md:grid-cols-2 lg:grid-cols-5">
        <Track v-for="track in tracks" :track="track" :key="track.id" />
    </div>
</template>
