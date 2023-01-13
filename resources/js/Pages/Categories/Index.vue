<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardSideBar from "@/Components/SideMenuBar/DashboardSideBar.vue";
import Well from "@/Components/Well.vue";</script>


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
                <span class="ml-3 text-slate-200 dark:text-slate-400">Categories</span>
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
                            >
                                Inter School Quiz Competition 2079
                            </span>
                            <div class="px-3 py-2.5">
                                <div
                                    class="grid grid-cols-1 gap-10 px-5 py-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6"
                                >
                                    <Well href="/categories/general" subtitle="10" title="General">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor"
                                             stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>
                                    </Well>

                                    <Well href="/categories/history" subtitle="10" title="History">
                                        <svg class="w-8 h-8"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="1.5"
                                             viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>
                                    </Well>

                                    <Well href="/categories/geography" subtitle="10" title="Geography">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor"
                                             stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>

                                        <template #title> Geography</template>
                                        <template #subtitle> 10</template>
                                    </Well>


                                    <Well href="/categories/sports" subtitle="10" title="Sports">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor"
                                             stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>
                                    </Well>

                                    <Well href="/categories/politics" subtitle="10" title="Politics">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor"
                                             stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>
                                    </Well>


                                    <Well href="/categories/science" subtitle="10" title="Science">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor"
                                             stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>

                                    </Well>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </AppLayout>
</template>
