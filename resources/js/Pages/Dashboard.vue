<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardSideBar from "@/Components/SideMenuBar/DashboardSideBar.vue";</script>

<template>
    <AppLayout title="Dashboard">
        <header
            class="flex items-center justify-between py-6  bg-slate-800 px-4 sm:px-4 md:px-container lg:px-container"
        >
            <div class="flex md:flex-row flex-col items-end justify-between">
                <div class="flex items-center justify-center">
                    <svg
                        class="w-10 h-10 text-white"
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
                    <div class="ml-4 text-3xl font-semibold text-white">
                        Dashboard
                    </div>
                </div>
                <div class="ml-2 text-lg text-slate-300">Test Your Knowledge</div>
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
                <span class="ml-3 text-slate-200 dark:text-slate-400">Overview</span>
            </div>

            <section
                class="grid grid-cols-1 gap-4 mt-4 sm:mt-4 sm:grid-cols-1 md:mt-8 md:grid-cols-7 md:gap-10"
            >
                <DashboardSideBar/>
                <div class="flex flex-col col-auto md:col-span-5">
                    <div class="flex flex-col md:col-span-2">
                        <div
                            class="flex flex-col overflow-hidden bg-white rounded-sm shadow-md drop-shadow-md dark:bg-slate-800"
                        >
                            <span
                                class="flex bg-sky-600 px-3 py-2.5 font-semibold text-slate-50 dark:bg-sky-800"
                            >Quiz Competition</span>
                            <div class="px-3 py-2.5">
                                <h1 class="mt-8 text-pink-600 text-3xl font-bold text-center">Sport Meet 2079</h1>
                                <h1 class="mt-6 text-rose-500 text-2xl font-bold text-center">Inter School Quiz
                                    Competition </h1>

                                <h1 class="mt-6 text-stone-700 text-2xl font-bold text-center mb-16">2079 Poush 29 </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </AppLayout>
</template>
