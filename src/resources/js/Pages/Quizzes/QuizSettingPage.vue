<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import QuizNumberSettingInput from '@/Components/Quizzes/QuizNumberSettingInput.vue';
import QuizSettingButton from '@/Components/Quizzes/QuizSettingButton.vue';
import QuizSettingConfirmButton from '@/Components/Quizzes/QuizSettingConfirmButton.vue';
import { Head } from '@inertiajs/vue3';
import { PieChart } from 'vue-chart-3';
import { Chart, registerables } from 'chart.js';
import ChartDataLabels from 'chartjs-plugin-datalabels';
import { ref } from 'vue';

const props = defineProps({
    type: String,
    id: String,
    name: String
});
const prog = ref({
    'all': true,
    'good': false,
    'weak': false,
    'unlearned': false
});
const order = ref({
    'asc': true,
    'desc': false,
    'rand': false
});
const is_limited = ref(false);
const number = ref(30);
const limit = ref(15);
const quiz_num = ref(100);

function isProgSelected(event){
    Object.keys(prog.value).forEach(key => prog.value[key] = false);
    switch(event.target.id){
        case 'all':
            prog.value.all = true;
            break;
        case 'good':
            prog.value.good = true;
            break;
        case 'weak':
            prog.value.weak = true;
            break;
        case 'unlearned':
            prog.value.unlearned = true;
            break;
        default:
            break;
    }
}

function isOrderSelected(event){
    Object.keys(order.value).forEach(key => order.value[key] = false);
    switch(event.target.id){
        case 'asc':
            order.value.asc = true;
            break;
        case 'desc':
            order.value.desc = true;
            break;
        case 'rand':
            order.value.rand = true;
            break;
        default:
            break;
    }
}

Chart.register(...registerables);
const chartData = ref({
    labels: ['完璧', '苦手', '未学習'],
    datasets: [{
        data: [40, 30, 60],
        backgroundColor: ['rgb(110, 231, 183)', 'rgb(252, 165, 165)', 'rgb(209, 213, 219)'] //bg-emerald-300, bg-red-300, bg-gray-300
    }],
});
const plugins = ref([ChartDataLabels]);
const options = ref({
    responsive: true,
    maintainAspectRatio: false,
    events: [], // 全てのイベントを無効化する
    plugins: {
        title: {
            display: true,
            position: 'bottom',
            font: {
                size: 14, //text-sm
            },
            text: '学習割合'
        },
        legend: {
            display: false
        },
        tooltip: {
            enabled: false
        },
        datalabels: {
            formatter: function(value, context) {
                return context.chart.data.labels[context.dataIndex];
            },
            font: {
                weight: 'bold',
                size: 14, // text-sm
            }
        }
    }
});
</script>

<template>
    <Head title="Quiz" />

    <MainLayout>
        <div class="relative">
            <h1 class="text-5xl text-center">{{ name }}</h1>

            <div class="absolute top-[-20px] right-[-80px] w-full flex justify-end items-center">
                <div class="w-44 h-44 mr-2">
                    <PieChart :chartData="chartData" :plugins="plugins" :options="options" />
                </div>
                <ul class="list-inside list-disc text-sm mt-10">
                    <li>完璧（正答率80%以上）</li>
                    <li>苦手（正答率80%未満）</li>
                    <li>未学習</li>
                </ul>
            </div>
        </div>

        <div class="w-2/3 mt-32 mx-auto relative">
            <div class="flex justify-between">
                <QuizSettingButton id='all' @click="isProgSelected($event)" :active="prog.all">すべて</QuizSettingButton>
                <QuizSettingButton id='good' @click="isProgSelected($event)" :active="prog.good">完璧</QuizSettingButton>
                <QuizSettingButton id='weak' @click="isProgSelected($event)" :active="prog.weak">苦手</QuizSettingButton>
                <QuizSettingButton id='unlearned' @click="isProgSelected($event)" :active="prog.unlearned">未学習</QuizSettingButton>
            </div>

            <div class="mt-8">
                <label for="number" class="text-xl mr-10 align-middle">問題数</label>
                <QuizNumberSettingInput type="number" id="number" v-model="number"/>
                <span class="ml-5 align-bottom">問/{{ quiz_num }}問</span>
            </div>

            <div class="flex justify-between mt-8">
                <QuizSettingButton id='asc' @click="isOrderSelected($event)" :active="order.asc">昇順</QuizSettingButton>
                <QuizSettingButton id='desc' @click="isOrderSelected($event)" :active="order.desc">降順</QuizSettingButton>
                <QuizSettingButton id='rand' @click="isOrderSelected($event)" :active="order.rand">ランダム</QuizSettingButton>
            </div>

            <div class="mt-8">
                <label for="limit" class="mr-10 text-xl align-middle">時間制限</label>
                <QuizSettingButton @click="is_limited = !is_limited" :active="!is_limited" class="mr-5">なし</QuizSettingButton>
                <QuizSettingButton @click="is_limited = !is_limited" :active="is_limited">あり</QuizSettingButton>
                <span :class="{ 'text-gray-300': !is_limited }">
                    <span class="text-4xl font-bold align-middle">→</span>
                    <QuizNumberSettingInput type="number" id="limit" v-model="limit" :disabled="!is_limited" />
                    <span class="ml-5 align-bottom">秒/1問</span>
                </span>
            </div>
        </div>

        <div class="w-full flex justify-end mt-10">
            <QuizSettingConfirmButton
                :href="route('quiz.select')"
                bg_color="bg-gray-300"
                class="mr-5"
            >
                戻る
            </QuizSettingConfirmButton>
            <QuizSettingConfirmButton
                :href="route('quiz', {type: type, id: id})"
                bg_color="bg-orange-300"
            >
                OK
            </QuizSettingConfirmButton>
        </div>
    </MainLayout>
</template>
