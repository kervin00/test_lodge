<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 42" fill="currentColor" :class="className" v-bind="$attrs">
        <path d="M20 2L2 12v18l18 10 18-10V12L20 2zm0 3.2l15 8.3v2.5L20 25.5 5 16V13.5l15-8.3zm0 9.7l10 5.6v3L20 28.6 10 23.5v-3l10-5.6zM7 17.7l13 7.3v3L7 20.7v-3zm26 0v3l-13 7.3v-3l13-7.3z"/>
    </svg>
</template>
