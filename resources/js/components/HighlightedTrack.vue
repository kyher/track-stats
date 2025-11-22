<script setup lang="ts">
import { TrackType } from '@/types';
import { defineProps } from 'vue';

const props = defineProps<{
    track: TrackType;
}>();
const { track } = props;
</script>
<template>
    <div
        class="my-8 mb-4 rounded border-2 border-cyan-800 bg-cyan-500 p-4 text-black"
    >
        <p>{{ track.name }}</p>
        <p class="font-bold">{{ track.voteCount }} votes</p>
    </div>
</template>
