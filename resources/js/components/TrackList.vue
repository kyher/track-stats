<script setup lang="ts">
import { TrackType, VoteType } from '@/types';
import { defineProps } from 'vue';
import HighlightedTrack from './HighlightedTrack.vue';
import Track from './Track.vue';
const props = defineProps<{
    tracks: TrackType[];
    highestVotedTracks?: TrackType[];
    userVote?: VoteType;
    readOnly: boolean;
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
            :currentUserVote="userVote?.track_id === highestVotedTrack.id"
            :readOnly="true"
        />
    </div>

    <div class="mt-4 grid gap-4 md:grid-cols-2 lg:grid-cols-5">
        <Track
            v-for="track in tracks"
            :track="track"
            :key="track.id"
            :currentUserVote="userVote?.track_id === track.id"
            :readOnly="readOnly"
        />
    </div>
</template>
