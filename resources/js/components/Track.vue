<script setup lang="ts">
import { Form } from '@inertiajs/vue3';
import { defineProps } from 'vue';
interface Track {
    id: number;
    name: string;
    voteCount: number;
}
const props = defineProps<{
    track: Track;
    currentUserVote: boolean;
    readOnly: boolean;
}>();
const { track } = props;
</script>
<template>
    <Form
        method="post"
        action="/vote"
        class="mb-2 rounded border p-4 text-white hover:bg-gray-800"
        :class="{ 'bg-gray-700': currentUserVote }"
    >
        <input type="hidden" name="track_id" :value="track.id" />
        <p>{{ track.name }}</p>
        <p v-if="readOnly">Votes: {{ track.voteCount }}</p>
        <span v-if="currentUserVote">✅</span>
        <button
            v-else-if="!readOnly"
            type="submit"
            class="my-4 cursor-pointer rounded bg-blue-700 p-2 hover:bg-blue-800"
        >
            Vote
        </button>
    </Form>
</template>
