<script setup>
import { computed, ref } from 'vue';

const props = defineProps({
    active: {
        type: Boolean,
        default: false
    }
});
const classes = computed(() => props.active ? 'bg-orange-300' : '');
</script>

<template>
    <button :active=active type="button" class="border border-gray-500 rounded-md h-12 w-32" :class="classes">
        <slot />
    </button>
</template>
