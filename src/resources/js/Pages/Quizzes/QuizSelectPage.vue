<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import QuizSelectButton from '@/Components/QuizSelect/QuizSelectButton.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    categories: Object,
    years: Object
});
const is_year = ref(true);
</script>

<template>
    <Head title="Quiz" />

    <MainLayout>
        <div class="border border-gray-500 rounded-md text-3xl text-center w-64 mx-auto p-3">
            <h1 v-show="is_year">年度別</h1>
            <h1 v-show="!is_year">分野別</h1>
        </div>

        <div class="text-right mr-20">
            <button @click="is_year = true" class="text-6xl text-orange-300">◀</button>
            <button @click="is_year = false" class="text-6xl text-emerald-300">▶</button>
        </div>

        <div class="pt-5">
            <div class="grid grid-cols-3 gap-4 justify-items-center w-2/3 mx-auto">
                <div v-show="is_year" v-for="(year, index) in years" :key="year.id">
                    <QuizSelectButton :href="route('quiz.setting', { type: 'year', id: index+1 })" class="bg-orange-300">{{ year.name }}</QuizSelectButton>
                </div>
                <div v-show="!is_year" v-for="(category, index) in categories" :key="category.id">
                    <QuizSelectButton :href="route('quiz.setting', { type: 'category', id: index+1 })" class="bg-emerald-300">{{ category.name }}</QuizSelectButton>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
