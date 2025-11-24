<script setup lang="ts">
import { dashboard, login, logout, register } from '@/routes';
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <nav class="flex items-center justify-between gap-6 px-4 py-6">
        <Link href="/" class="text-4xl font-bold"> TrackStats </Link>
        <div class="flex items-center gap-3">
            <Link v-if="$page.props.auth.user" :href="dashboard()" class="">
                Dashboard
            </Link>
            <Link v-if="$page.props.auth.user" :href="logout()" class=""
                >Log out
            </Link>
            <template v-else>
                <Link :href="login()" class=""> Log in </Link>
                <Link :href="register()" class=""> Register </Link>
            </template>
        </div>
    </nav>
</template>
