<script setup>
import SideBarContent from '@/Components/SideBars/SideBarContent.vue';
import { ref } from 'vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="flex h-screen w-screen bg-white">
            <!-- Page Sidebar -->
            <menu class="flex-none w-60 h-full py-12 border-r border-gray-500">
                <SideBarContent :href="route('home')" class="mx-auto">ホーム</SideBarContent>
                <SideBarContent :href="route('dashboard')" class="mx-auto mt-4">学習状況</SideBarContent>
            </menu>

            <!-- Page Content -->
            <div class="flex-1 h-full px-8 py-12">
                <main class="w-[1000px] h-full mx-auto">
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
