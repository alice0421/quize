<script setup>
import SideBarContent from '@/Components/SideBars/SideBarContent.vue';
import { ref } from 'vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="flex h-screen w-screen bg-gray-100">
            <!-- Page Sidebar -->
            <menu class="w-60 border-r border-gray-500">
                <div class="py-12">
                    <SideBarContent :href="route('home')" class="mx-auto">ホーム</SideBarContent>
                    <SideBarContent :href="route('dashboard')" class="mx-auto mt-4">学習状況</SideBarContent>
                </div>
            </menu>

            <!-- Page Content -->
            <main class="h-full w-full py-12">
                <slot />
            </main>
        </div>
    </div>
</template>
