<script setup lang="ts">
import { TrackType, VoteType } from '@/types';
import { defineProps } from 'vue';
import TrackForm from './TrackForm.vue';
const props = defineProps<{
    tracks: TrackType[];
    userVote?: VoteType;
}>();
const { tracks } = props;
</script>
<template>
    <div class="mt-4 grid gap-4 md:grid-cols-2 lg:grid-cols-5">
        <TrackForm
            v-for="track in tracks"
            :track="track"
            :key="track.id"
            :currentUserVote="userVote?.track_id === track.id"
        />
    </div>
</template>
