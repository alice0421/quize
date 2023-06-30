<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    bg_color: {
        type: String,
        default: ''
    }
});
</script>

<template>
    <button
        :type="type"
        class="rounded-md h-12 w-32 text-center align-middle"
        :class=bg_color
    >
        <slot />
    </button>
</template>
