<script setup lang="ts">
import { defineProps } from 'vue';
interface Track {
    id: number;
    name: string;
}
const props = defineProps<{
    tracks: Track[];
}>();
const { tracks } = props;
</script>
<template>
    <ul>
        <li v-for="track in tracks" :key="track.id">
            {{ track.name }}
        </li>
    </ul>
</template>
