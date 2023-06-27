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
    <a :href=href class="table rounded-md h-12 w-32" :class=bg_color>
        <p class="table-cell text-center align-middle">
            <slot />
        </p>
    </a>
</template>
