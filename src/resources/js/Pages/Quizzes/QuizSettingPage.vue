<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import QuizNumberSettingInput from '@/Components/QuizSetting/QuizNumberSettingInput.vue';
import QuizSettingButton from '@/Components/QuizSetting/QuizSettingButton.vue';
import QuizSettingConfirmButton from '@/Components/QuizSetting/QuizSettingConfirmButton.vue';
import { Head, router } from '@inertiajs/vue3';
import { PieChart } from 'vue-chart-3';
import { Chart, registerables } from 'chart.js';
import ChartDataLabels from 'chartjs-plugin-datalabels';
import { ref } from 'vue';

const props = defineProps({
    type: String,
    id: String,
    title: Object,
    total_num: Number,
    setting: Object
});

// axios通信でバックエンドに設定を送る（非同期処理）
const submit = () => {
    axios.post(route('quiz.setting.store', {'type': props.type, 'id': props.id}), {'setting': props.setting})
        .then((res) => {
            router.get(res.data.redirect);
        })
        .catch((err) => {
            console.log(err.response);
        });
}

// 学習割合用の円グラフ設定
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
            <h1 class="text-5xl text-center">{{ title }}</h1>

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

        <form @submit.prevent='submit'>
            <div class="w-2/3 mt-32 mx-auto relative">
                <div class="flex justify-between">
                    <!-- :active="range === 'all'" というように管理すればオブジェクトの汚いやつは消える！-->
                    <QuizSettingButton id='all' @click="setting.range = 'all'" :active="setting.range === 'all'">すべて</QuizSettingButton>
                    <QuizSettingButton id='good' @click="setting.range = 'good'" :active="setting.range === 'good'">完璧</QuizSettingButton>
                    <QuizSettingButton id='weak' @click="setting.range = 'weak'" :active="setting.range === 'weak'">苦手</QuizSettingButton>
                    <QuizSettingButton id='unlearned' @click="setting.range = 'unlearned'" :active="setting.range === 'unlearned'">未学習</QuizSettingButton>
                </div>

                <div class="mt-8">
                    <label for="number" class="text-xl mr-10 align-middle">問題数</label>
                    <QuizNumberSettingInput type="number" id="number" v-model="setting.number" />
                    <span class="ml-5 align-bottom">問 / {{ total_num }}問</span>
                </div>

                <div class="flex justify-between mt-8">
                    <QuizSettingButton id='asc' @click="setting.order = 'asc'" :active="setting.order === 'asc'">昇順</QuizSettingButton>
                    <QuizSettingButton id='desc' @click="setting.order = 'desc'" :active="setting.order === 'desc'">降順</QuizSettingButton>
                    <QuizSettingButton id='rand' @click="setting.order = 'rand'" :active="setting.order === 'rand'">ランダム</QuizSettingButton>
                </div>

                <div class="mt-8">
                    <label for="limit" class="mr-10 text-xl align-middle">時間制限</label>
                    <QuizSettingButton id='off' @click="setting.limit = false" :active="!setting.limit" class="mr-5">なし</QuizSettingButton>
                    <QuizSettingButton id='on' @click="setting.limit = true" :active="setting.limit">あり</QuizSettingButton>
                    <span :class="{ 'text-gray-300': !setting.limit }">
                        <span class="text-4xl font-bold align-middle">→</span>
                        <QuizNumberSettingInput type="number" id="limit" v-model="setting.limit_time" :disabled="!setting.limit" />
                        <span class="ml-5 align-bottom">秒/1問</span>
                    </span>
                </div>
            </div>

            <div class="w-full flex justify-end mt-10">
                <QuizSettingConfirmButton
                    type="button"
                    @click="router.get(route('quiz.select'))"
                    bg_color="bg-gray-300"
                    class="mr-5"
                >
                    戻る
                </QuizSettingConfirmButton>
                <QuizSettingConfirmButton
                    bg_color="bg-orange-300"
                >
                    OK
                </QuizSettingConfirmButton>
            </div>
        </form>
    </MainLayout>
</template>
