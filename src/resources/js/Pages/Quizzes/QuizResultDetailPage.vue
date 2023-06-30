<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    type: String,
    id: String,
    title: String,
    results: Object,
    quizzes: Object
});
const is_show_choices = ref(Array(props.quizzes.length).fill(false));
const is_show_explanation = ref(Array(props.quizzes.length).fill(false));
const is_show_memo = ref(Array(props.quizzes.length).fill(false));
</script>

<template>
    <Head title="Quiz" />

    <MainLayout>
        <h1 class="text-6xl">{{ title }}</h1>

        <div v-for="(quiz, quiz_index) in quizzes" :key="quiz.id">
            <!-- 問題表示 -->
            <div class="flex item-center mt-8">
                <p class="text-xl font-bold my-auto mr-10">Q.{{ quiz_index + 1 }}</p>
                <p class="bg-emerald-300 border border-gray-500 rounded-md py-1 px-2">{{ quiz.quiz_category.name }}</p>
            </div>
            <p class="text-lg mt-5">{{ quiz.content }}</p>

            <div class="mt-5">
                <div class="flex justify-between">
                    <!-- 問題の選択肢+正解表示・非表示 -->
                    <div class="w-1/3">
                        <button type="button" @click="is_show_choices[quiz_index] = !is_show_choices[quiz_index]" class="font-semibold mb-2">
                            問題文 & 解答
                        </button>
                        <ul>
                            <li v-for="choice in quiz.choices" :key="choice.id"
                                v-show="is_show_choices[quiz_index]"
                            >
                                <!-- 正解 -->
                                <p v-if="choice.answer == true" class="text-xs border border-gray-500 rounded-md py-1 px-2 bg-blue-300 mb-2">
                                    {{ choice.content }}
                                </p>
                                <!-- それ以外 -->
                                <p v-else class="text-xs border border-gray-500 rounded-md py-1 px-2 mb-2">
                                    {{ choice.content }}
                                </p>
                            </li>
                        </ul>
                    </div>
                    <!-- 解説表示・非表示 -->
                    <div class="w-1/4">
                        <button type="button" @click="is_show_explanation[quiz_index] = !is_show_explanation[quiz_index]" class="font-semibold mb-2">
                            解説
                        </button>
                        <div v-show="is_show_explanation[quiz_index]">
                            <p class="text-xs">Userが書いた解説がここに表示される。explanationsテーブルに書く問題ごとに保存。</p>
                        </div>
                    </div>
                    <!-- メモ表示・非表示 -->
                    <div class="w-1/4">
                        <button type="button" @click="is_show_memo[quiz_index] = !is_show_memo[quiz_index]"  class="font-semibold mb-2">
                            メモ
                        </button>
                        <div v-show="is_show_memo[quiz_index]">
                            <p class="text-xs">Userが書いた解説がここに表示される。explanationsテーブルに書く問題ごとに保存。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <button @click="router.get(route('quiz.setting', {'type': type, 'id': id}))">もう一度</button>
            <button @click="router.get(route('home'))">ホーム</button>
        </div>
    </MainLayout>
</template>
