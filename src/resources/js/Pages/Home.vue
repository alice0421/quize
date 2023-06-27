<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import SelectContent from '@/Components/Homes/SelectContent.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Quiz" />

    <MainLayout>
        <h1 class="text-4xl text-center">ホーム</h1>

        <div class="pt-10 pb-20 h-full flex flex-col justify-between items-center">
            <selectContent bg_color="bg-orange-300">みんなで</selectContent>
            <selectContent :href="route('quiz.select')" bg_color="bg-emerald-300">ひとりで</selectContent>
            <selectContent :href="route('dashboard')" bg_color="bg-blue-300">学習状況</selectContent>
        </div>
    </MainLayout>
</template>
