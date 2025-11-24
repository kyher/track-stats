<script setup lang="ts">
import { Form } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import Button from './ui/button/Button.vue';
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
        class="mb-2 rounded bg-gray-800 p-4 transition-colors"
        :class="{
            'bg-green-900': currentUserVote,
            'hover:bg-gray-700': !currentUserVote,
        }"
    >
        <input type="hidden" name="track_id" :value="track.id" />
        <p>{{ track.name }}</p>
        <p v-if="readOnly" class="font-bold">{{ track.voteCount }} votes</p>
        <span v-if="currentUserVote">✅</span>
        <Button v-else-if="!readOnly" type="submit" class="mt-4 cursor-pointer">
            Vote
        </Button>
    </Form>
</template>
