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
        class="my-8 mb-4 rounded border-2 border-yellow-500 bg-yellow-500/10 p-4 font-bold shadow-lg transition-shadow duration-300 hover:shadow-2xl"
    >
        <div class="flex items-center justify-between">
            <div>
                <p>{{ track.name }}</p>
                <p class="font-bold">{{ track.voteCount }} votes</p>
            </div>
            <span class="text-3xl">👑</span>
        </div>
    </div>
</template>
