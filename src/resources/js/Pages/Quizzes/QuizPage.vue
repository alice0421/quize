<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

const props = defineProps({
    title: String,
    limit: Boolean,
    limit_time: Number,
    quizzes: Object
});
const is_selected = ref(-1);
const time = ref(props.limit_time);
const setTimer = ref();
const this_quiz = ref(0);
const is_quiz = ref(true);
const results = ref([]);

onMounted(() => {
    if(props.limit) setTimer.value = setInterval(countDown, 1000);
});

const countDown = () => {
    // タイムアップの挙動
    if(time.value - 1 === 0){ // 0秒になった瞬間に発火
        clearInterval(setTimer.value);
        showAnswer();
    }
    time.value--;
}

function showAnswer(){
    if(props.limit) clearInterval(setTimer.value);
    is_quiz.value = !is_quiz.value;
    storeResult(props.quizzes[this_quiz.value]);
}

function nextQuiz(){
    // 最終問題（returnは下の挙動を動かさないためのもの）
    if(this_quiz.value + 1 >= props.quizzes.length) return router.get(route('quiz.select'));

    this_quiz.value++;
    is_quiz.value = !is_quiz.value;
    is_selected.value = -1;

    if(props.limit){
        time.value = props.limit_time;
        setTimer.value = setInterval(countDown, 1000);
    }
}

// 正誤結果を保存
function storeResult(quiz){
    let is_correct = true;
    if(is_selected.value === -1) is_correct = false;
    else if(!quiz.choices[is_selected.value].answer) is_correct = false;
    const new_result = {
        'quiz_id': quiz.id,
        'is_correct': is_correct
    };
    results.value.push(new_result);
    console.log(results.value);
}
</script>

<template>
    <Head title="Quiz" />

    <MainLayout>
        <div v-for="(quiz, index) in quizzes" :key="quiz.id">
            <div v-show="this_quiz === index">
                <div class="flex ml-10">
                    <h1 class="text-6xl">{{ title }}</h1>
                    <p class="text-4xl my-auto mx-40">{{ index + 1 }} / {{ quizzes.length }}</p>
                </div>

                <!-- カウントダウンバー -->
                <div v-if="limit" class="w-full h-10 mt-5">
                    <p v-show="is_quiz">{{ time }}</p>
                </div>
                
                <!-- 問題 -->
                <div class="flex item-center mt-8">
                    <p class="text-xl font-bold my-auto mr-10">Q.{{ index + 1 }}</p>
                    <p class="bg-emerald-300 border border-gray-500 rounded-md py-1 px-2">{{ quiz.quiz_category.name }}</p>
                </div>
                <p class="text-lg mt-5">{{ quiz.content }}</p>

                <!-- 問題の選択肢 / 解答 -->
                <div class="mt-5">
                    <ul>
                        <li v-for="(choice, index) in quiz.choices" :key="choice.id">
                            <!-- 問題の選択肢 -->
                            <button
                                v-show="is_quiz"
                                type="button"
                                @click="is_selected = index"
                                class="w-full text-left border border-gray-500 rounded-md py-1 px-2 mb-2"
                                :class="{ 'bg-orange-300': is_selected === index }"
                            >
                                {{ choice.content }}
                            </button>

                            <!-- 解答 -->
                            <div v-show="!is_quiz">
                                <!-- 正解 -->
                                <div v-if="choice.answer == true" class="relative mb-2">
                                    <p v-if="is_selected === -1" class="absolute font-bold text-red-500 text-xl left-[-24px] top-1">X</p>
                                    <p v-else class="absolute font-bold text-blue-500 text-xl left-[-24px] top-1">O</p>
                                    <p class="w-full border border-gray-500 rounded-md py-1 px-2 bg-blue-300">
                                        {{ choice.content }}
                                    </p>
                                </div>
                                <!-- 誤答 -->
                                <div v-else-if="choice.answer == false && is_selected === index" class="relative mb-2">
                                    <p class="absolute font-bold text-red-500 text-xl left-[-24px] top-1">X</p>
                                    <p class="w-full border border-gray-500 rounded-md py-1 px-2 bg-red-300">
                                        {{ choice.content }}
                                    </p>
                                </div>
                                <!-- それ以外 -->
                                <p
                                    v-else
                                    class="w-full border border-gray-500 rounded-md py-1 px-2 mb-2"
                                >
                                    {{ choice.content }}
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <button type="button" v-show="is_quiz" @click="showAnswer()">確定</button>
        <button type="button" v-show="!is_quiz" @click="nextQuiz()">次へ</button>
    </MainLayout>
</template>
