<script setup>
defineProps({
    href: {
        type: String,
        default: '#',
    },
});
</script>

<template>
    <a :href=href class="block text-center border border-gray-500 rounded-md p-3 w-40">
        <slot />
    </a>
</template>
