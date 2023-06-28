<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import ContentSelectButton from '@/Components/Home/ContentSelectButton.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Quiz" />

    <MainLayout>
        <h1 class="text-5xl text-center">ホーム</h1>

        <div class="pt-12 h-full flex flex-col items-center">
            <ContentSelectButton bg_color="bg-orange-300">みんなで</ContentSelectButton>
            <ContentSelectButton :href="route('quiz.select')" bg_color="bg-emerald-300" class="mt-20">ひとりで</ContentSelectButton>
            <ContentSelectButton :href="route('dashboard')" bg_color="bg-blue-300" class="mt-20">学習状況</ContentSelectButton>
        </div>
    </MainLayout>
</template>
