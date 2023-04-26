<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";

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
                    <div
                        class="flex flex-col overflow-hidden bg-white rounded-sm shadow-md drop-shadow-md dark:bg-slate-800 dark:text-white"
                    >
                        <a
                            class="flex bg-sky-600 px-3 py-2.5 text-slate-50 hover:bg-sky-700 dark:bg-sky-800 dark:hover:bg-sky-600"
                            href="#dashboard"
                        >
                            <svg
                                class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                            <span class="ml-2 font-semibold"> Dashboard </span>
                        </a>
                        <a
                            class="flex px-3 py-2.5 text-slate-800 hover:bg-slate-200/50 dark:text-slate-50"
                            href="#orders"
                        >
                            <svg
                                class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                            <span class="ml-2 font-semibold"> Orders </span>
                        </a>
                        <a
                            class="flex px-3 py-2.5 text-slate-800 hover:bg-slate-200/50 dark:text-slate-50"
                            href="#menus"
                        >
                            <svg
                                class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                            <span class="ml-2 font-semibold"> Menus </span>
                        </a>
                        <a
                            class="flex px-3 py-2.5 text-slate-800 hover:bg-slate-200/50 dark:text-slate-50"
                            href="#accounts"
                        >
                            <svg
                                class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                            <span class="ml-2 font-semibold"> Accounts </span>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col col-auto md:col-span-5">
                    <div class="flex flex-col md:col-span-2">
                        <div
                            class="flex flex-col overflow-hidden bg-white rounded-sm shadow-md drop-shadow-md dark:bg-slate-800"
                        >
                            <span
                                class="flex bg-sky-600 px-3 py-2.5 font-semibold text-slate-50 dark:bg-sky-800"
                            >General Round 12/35</span>
                            <div class="px-3 py-2.5">
                                <div class="px-5 py-4 flex space-x-8">
                                    <a
                                        v-for="question in questions"
                                        :key="question.id"
                                        :class="question.answered ? 'bg-red-200 border-red-700 text-red-700' : 'bg-green-200 border-green-700 text-green-700'"
                                        :href="question.url"
                                        class="flex items-center justify-between p-1.5 w-10 h-10 rounded-full border">
                                        <div class="mx-auto font-semibold"> {{ question.order }}</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </AppLayout>
</template>
