<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-[#1e98d7] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#b6ddf2] active:bg-[#043c54] focus:outline-none focus:border-[#043c54] focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
        <slot />
    </button>
</template>
