<script setup lang="ts">
import { TrackType } from '@/types';
import { defineProps } from 'vue';
import Track from './Track.vue';
const props = defineProps<{
    tracks: TrackType[];
}>();
const { tracks } = props;
</script>
<template>
    <div class="mt-4 grid gap-4 md:grid-cols-2 lg:grid-cols-5">
        <Track v-for="track in tracks" :track="track" />
    </div>
</template>
