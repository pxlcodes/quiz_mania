<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardSideBar from "@/Components/SideMenuBar/DashboardSideBar.vue";


defineProps({
    category: Object,
    questions: Object,
    total: Number,
    answered: Number,
});


</script>

<template>
    <AppLayout title="Dashboard">
        <header
            class="flex items-center justify-between py-6  bg-slate-800 px-4 sm:px-4 md:px-container lg:px-container"
        >
            <div class="flex md:flex-row flex-col items-end justify-between">
                <div class="flex items-center justify-center">

                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>

                    <div class="ml-4 text-3xl font-semibold text-white">
                        Quiz
                    </div>
                </div>
                <div class="ml-2 text-lg text-slate-300">Sport Meet 2079</div>
            </div>
        </header>

        <main
            class="min-h-[75vh] px-4 py-4 sm:py-4 sm:px-4 md:py-6 md:px-container lg:py-8 lg:px-container"
        >
            <div
                class="px-3 py-2 flex items-center  font-normal rounded-sm bg-slate-400  dark:bg-slate-800 "
            >
                <a class="dark:text-slate-300 text-slate-50" href="/dashboard">Dashboard</a>
                <svg class="ml-3 w-4 h-4 text-slate-200 dark:text-slate-600" fill="none" stroke="currentColor"
                     stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.25 4.5l7.5 7.5-7.5 7.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <a class="dark:text-slate-300 text-slate-50 ml-3" href="/dashboard">Category</a>
                <svg class="ml-3 w-4 h-4 text-slate-200 dark:text-slate-600" fill="none" stroke="currentColor"
                     stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.25 4.5l7.5 7.5-7.5 7.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="ml-3 text-slate-200 dark:text-slate-400"> {{ category.name }} </span>
            </div>

            <section
                class="grid grid-cols-1 gap-4 mt-4 sm:mt-4 sm:grid-cols-1 md:mt-8 md:grid-cols-7 md:gap-10"
            >
                <div class="flex flex-col col-auto md:col-span-2">
                    <DashboardSideBar active="categories"/>

                </div>
                <div class="flex flex-col col-auto md:col-span-5">
                    <div class="flex flex-col md:col-span-2">
                        <div
                            class="flex flex-col overflow-hidden bg-white rounded-sm shadow-md drop-shadow-md dark:bg-slate-800"
                        >
                            <span class="flex bg-sky-600 px-3 py-2.5 font-semibold text-slate-50 dark:bg-sky-800">
                                {{ category.name }} Round
                                <span class="ml-6 font-normal"> {{ answered }} out of  {{ total }}</span>
                            </span>
                            <div class="flex flex-wrap px-6 py-4">
                                <a
                                    v-for="question in questions"
                                    :key="question.id"
                                    :class="question.answered ? 'bg-red-200 border-red-700 text-red-700' : 'bg-green-200 border-green-700 text-green-700'"
                                    :href="question.url"
                                    class="flex items-center shadow-md drop-shadow-md justify-between p-2 w-10 h-10 rounded-full border m-2.5">
                                    <div class="mx-auto font-semibold"> {{ question.order }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </AppLayout>
</template>
