<script setup>

import {Link} from "@inertiajs/inertia-vue3";

const props = defineProps({
    href: String,
    title: String,
    subtitle: String,
});


</script>
<template>
    <Link :href="href"
          class="flex flex-col items-center justify-center py-6 rounded-sm shadow-inner cursor-pointer bg-sky-100 text-sky-600 hover:bg-sky-200 dark:bg-sky-800 dark:text-sky-100 dark:hover:bg-sky-700"
    >
        <div
            class="flex items-center justify-center text-2xl font-bold"
        >
            <slot></slot>
            <span class="ml-2">{{ subtitle }}</span>
        </div>
        <span class="text-lg font-semibold">{{ title }}</span>
    </Link>
</template>
