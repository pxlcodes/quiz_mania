<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardSideBar from "@/Components/SideMenuBar/DashboardSideBar.vue";

defineProps({
    teams: Object,
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
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"
                            stroke-linecap="round"
                            stroke-linejoin="round"/>
                    </svg>

                    <div class="ml-4 text-3xl font-semibold text-white">
                        Team
                    </div>
                </div>
                <div class="ml-2 text-lg text-slate-300">Manage Team</div>
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
                <span class="ml-3 text-slate-200 dark:text-slate-400">Teams</span>
            </div>
            <section
                class="grid grid-cols-1 gap-4 mt-4 sm:mt-4 sm:grid-cols-1 md:mt-8 md:grid-cols-7 md:gap-10"
            >
                <DashboardSideBar active="teams"/>

                <div class="flex flex-col col-auto md:col-span-5">
                    <div class="flex flex-col md:col-span-2">
                        <div
                            class="flex flex-col overflow-hidden bg-white rounded-sm shadow-md drop-shadow-md dark:bg-slate-800"
                        >
                            <div
                                class="flex justify-between bg-sky-600 px-4 py-2.5  text-slate-50 dark:bg-sky-800 items-center"
                            >
                                <span class="font-semibold">Teams</span>
                                <a :href="route('teams.create')"
                                   class="flex items-center hover:bg-sky-700  dark:hover:bg-sky-800 bg-sky-800 px-2 py-1 rounded text-slate-50 dark:bg-sky-700">
                                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor"
                                         stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6v12m6-6H6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    Add Team</a>
                            </div>
                            <div class="px-3 py-2.5">
                                <div class="px-5 py-4">
                                    <table class="w-full">
                                        <thead>
                                        <tr>
                                            <th class="text-left">Name</th>
                                            <th class="text-left">Members</th>
                                            <th class="text-left">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <template v-for="team in teams">
                                            <tr>
                                                <td class="py-2">
                                                    <div class="flex items center">
                                                        <div class="flex-shrink-0 h-10 w-10">
                                                            <img :src="team.logo_url"
                                                                 alt=""
                                                                 class="h-10 w-10 rounded-full"/>
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ team.name }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                {{ team.description }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="py-2">
                                                    <div class="text-sm text-gray-900 dark:text-gray-200">
                                                        {{ team.members_count }} 0
                                                    </div>
                                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                                        Members
                                                    </div>
                                                </td>
                                                <td class="py-2">
                                                    <a :href="route('teams.edit', team.id)"
                                                       class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-500 dark:hover:text-indigo-400">Edit</a>
                                                </td>
                                            </tr>
                                        </template>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </AppLayout>
</template>
