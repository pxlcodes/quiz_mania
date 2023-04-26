<script setup>

import {computed} from "vue";

const props = defineProps({
    name: String,
    points: Number,
    description: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'bg-sky-600 text-slate-50 hover:bg-sky-700 dark:bg-sky-800 dark:hover:bg-sky-600'
        : "text-slate-800 hover:bg-slate-200/50 dark:text-slate-50"
});
</script>

<template>
    <div
        :class="classes"
        class="flex justify-between px-3 py-2.5 "
    >
        <div>
            <span class="font-semibold" v-html="description"/>
            <span class="font-semibold ml-2" v-html="name"/>
        </div>

        <span class="rounded-full px-1.5 bg-sky-800 text-white font-semibold
        dark:bg-sky-600 dark:text-slate-50"> {{ points }}</span>
    </div>
</template>
