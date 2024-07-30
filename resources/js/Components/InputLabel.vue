<script setup>
defineProps({
    value: {
        type: String,
    },
    required: {
        type: Boolean,
        default: false,
        required: false
    }
});
</script>

<template>
    <label class="block font-medium text-sm text-gray-700 after:content-['*']" :class="{'after:ml-0.5 after:text-red-500': required, 'after:text-transparent': !required}">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
