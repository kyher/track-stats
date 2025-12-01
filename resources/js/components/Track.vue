<script setup lang="ts">
import { defineProps } from 'vue';
interface Track {
    id: number;
    name: string;
    voteCount: number;
}
const props = defineProps<{
    track: Track;
}>();
const { track } = props;
</script>
<template>
    <div class="mb-2 rounded bg-gray-800 p-4">
        <input type="hidden" name="track_id" :value="track.id" />
        <p>{{ track.name }}</p>
        <p class="font-bold">{{ track.voteCount }} votes</p>
    </div>
</template>
