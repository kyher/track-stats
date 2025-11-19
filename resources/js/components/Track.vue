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
    <div
        class="mb-2 cursor-pointer rounded border p-4 text-white hover:bg-gray-800"
    >
        {{ track.name }} - Votes: {{ track.voteCount }}
    </div>
</template>
