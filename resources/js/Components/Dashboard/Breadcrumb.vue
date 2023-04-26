<script setup>
import BreadcrumbLink from "@/Components/Dashboard/Breadcrumbs/Link.vue";

defineProps({
    breadcrumb: Object,
});


</script>

<template>
    <div
        class="flex items-center px-3 py-2 font-normal rounded-sm bg-slate-400 dark:bg-slate-800"
    >
        <BreadcrumbLink :breadcrumb="breadcrumb"/>
        <!--        <a :href="breadcrumb.url" class="dark:text-slate-300 text-slate-50"-->
        <!--        >{{ breadcrumb.title }}</a-->
        <!--        >-->

        <br>

        <div class="hidden">
            <a class="dark:text-slate-300 text-slate-50" href="/dashboard"
            >Dashboard</a
            >
            <svg
                class="w-4 h-4 ml-3 text-slate-200 dark:text-slate-600"
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
            <a class="ml-3 dark:text-slate-300 text-slate-50"
               href="#"
            >Sub</a
            >
            <svg
                class="w-4 h-4 ml-3 text-slate-200 dark:text-slate-600"
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
            <a
                class="ml-3 dark:text-slate-300 text-slate-50"
                href="#"
            >Dummy</a
            >
            <svg
                class="w-4 h-4 ml-3 text-slate-200 dark:text-slate-600"
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
            <span class="ml-3 text-slate-200 dark:text-slate-400">1</span></div>
    </div>
</template>
