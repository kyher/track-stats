<script setup lang="ts">
import { dashboard, login, logout, register } from '@/routes';
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <nav class="flex w-full justify-between gap-6 px-4 py-6">
        <Link href="/" class="text-4xl font-bold"> TrackStats </Link>
        <div class="flex items-center gap-3">
            <Link
                v-if="$page.props.auth.user"
                :href="dashboard()"
                class="cursor-pointer rounded-md bg-blue-600 px-4 py-2 hover:bg-blue-700"
            >
                Dashboard
            </Link>
            <Link
                v-if="$page.props.auth.user"
                :href="logout()"
                class="cursor-pointer rounded-md bg-blue-600 px-4 py-2 hover:bg-blue-700"
                >Log out
            </Link>
            <template v-else>
                <Link
                    :href="login()"
                    class="cursor-pointer rounded-md bg-blue-600 px-4 py-2 hover:bg-blue-700"
                >
                    Log in
                </Link>
                <Link
                    :href="register()"
                    class="cursor-pointer rounded-md bg-blue-600 px-4 py-2 hover:bg-blue-700"
                >
                    Register
                </Link>
            </template>
        </div>
    </nav>
</template>
