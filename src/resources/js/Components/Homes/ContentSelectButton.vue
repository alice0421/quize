<script setup>
defineProps({
    href: {
        type: String,
        default: '#',
    },
    bg_color: {
        type: String,
        default: ''
    }
});
</script>

<template>
    <a :href=href class="table whitespace-pre-wrap rounded-md h-24 w-80" :class=bg_color>
        <p class="table-cell text-center text-2xl align-middle py-2">
            <slot />
        </p>
    </a>
</template>
