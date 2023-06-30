<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

const props = defineProps({
    type: String,
    id: String,
    title: String,
    total_num: Number,
    correct_num: Number
});
</script>

<template>
    <Head title="Quiz" />

    <MainLayout>
        <h1>{{ title }}</h1>

        <p>正解数: {{ correct_num }} / {{ total_num }}</p>
        <p>{{ Math.round((correct_num / total_num) * 100) }}%</p>

        <button @click="router.get(route('quiz.setting', {'type': type, 'id': id}))">もう一度</button>
        <button @click="router.get(route('quiz.result.detail', {'type': type, 'id': id}))">見直し</button>
        <button @click="router.get(route('quiz.select'))">問題選択</button>
    </MainLayout>
</template>
