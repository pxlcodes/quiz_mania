<script setup>

import {Link} from "@inertiajs/inertia-vue3";
import {computed} from "vue";

const props = defineProps({
    href: String,
    title: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'bg-sky-600 text-slate-50 hover:bg-sky-700 dark:bg-sky-800 dark:hover:bg-sky-600'
        : "text-slate-800 hover:bg-slate-200/50 dark:text-slate-50"
});
</script>

<template>
    <Link
        :class="classes"
        :href="href"
        class="flex px-3 py-2.5 "
    >
        <slot name="icon"></slot>
        <span class="ml-2 font-semibold" v-html="title"> </span>
    </Link>
</template>
