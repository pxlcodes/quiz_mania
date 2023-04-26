<script setup>
import BreadcrumbLink from "@/Components/Dashboard/Breadcrumbs/Link.vue";
import {Link} from "@inertiajs/inertia-vue3";

defineProps({
    breadcrumb: Object
});

</script>

<template>
    <Link v-if="breadcrumb.url"
          :href="breadcrumb.url" class="dark:text-slate-300 text-slate-50" v-html="breadcrumb.title"/>
    <span v-else class="text-slate-200 dark:text-slate-400" v-html="breadcrumb.title"/>
    <template v-if="breadcrumb.child">
        <svg
            class="w-4 h-4 mx-3 text-slate-200 dark:text-slate-600"
            fill="none"
            stroke="currentColor"
            stroke-width="1.5"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                d="M8.25 4.5l7.5 7.5-7.5 7.5"
                stroke-linecap="round"
                stroke-linejoin="round"
            />
        </svg>
        <BreadcrumbLink :breadcrumb="breadcrumb.child"/>
    </template>
</template>
