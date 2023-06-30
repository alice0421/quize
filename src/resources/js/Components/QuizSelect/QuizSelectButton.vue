<script setup>
defineProps({
    href: {
        type: String,
        default: '#',
    }
});
</script>

<template>
    <a :href=href class="table whitespace-pre-wrap rounded-md h-24 w-48">
        <p class="table-cell text-xl text-center align-middle py-2">
            <slot />
        </p>
    </a>
</template>
