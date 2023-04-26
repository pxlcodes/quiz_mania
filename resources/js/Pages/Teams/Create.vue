<script setup>
import {ref} from 'vue';
import {useForm} from '@inertiajs/inertia-vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardSideBar from "@/Components/SideMenuBar/DashboardSideBar.vue";
import InputError from '@/Components/InputError.vue';


const form = useForm({
    _method: 'POST',
    name: '',
    description: '',
    file: null,
});

const excelInput = ref(null);

const createNewTeam = () => {
    if (excelInput.value) {
        form.file = excelInput.value.files[0];
    }

    form.post(route('teams.store'), {
        errorBag: 'storeTeam',
        preserveScroll: true,
        onSuccess: () => console.log('success'),
    });
};

const selectNewFile = () => {
    // validate file type
    if (excelInput.value.files[0].type !== 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
        form.errors.file = 'The file must be a file of type: xlsx';
        return;
    }

    // validate file size
    if (excelInput.value.files[0].size > 1000) {
        form.errors.file = 'The file may not be greater than 1000 kilobytes.';
        return;
    }


    excelInput.value.click();
};


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
                <div class="ml-2 text-lg text-slate-300">Add New Team</div>
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
                <a :href="route('teams.index')" class="dark:text-slate-300 text-slate-50 ml-3">Teams</a>
                <svg class="ml-3 w-4 h-4 text-slate-200 dark:text-slate-600" fill="none" stroke="currentColor"
                     stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.25 4.5l7.5 7.5-7.5 7.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="ml-3 text-slate-200 dark:text-slate-400">Add Team</span>
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
                            <span
                                class="flex bg-sky-600 px-3 py-2.5 font-semibold text-slate-50 dark:bg-sky-800"
                            >Create New Team</span>
                            <form class="px-3 py-2.5 accent-sky-600" @submit.prevent="createNewTeam">
                                <div class="px-5 py-4 flex space-x-8">
                                    <div class="flex flex-col w-full">
                                        <div class="flex flex-col">
                                            <label class="text-sm font-semibold text-gray-600 py-2">Team Name</label>
                                            <input
                                                v-model="form.name"
                                                class="px-4 py-2 border rounded text-gray-700 focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                placeholder="Team Name"
                                                type="text"/>
                                        </div>
                                        <InputError :message="form.errors.name" class="mt-2"/>

                                        <div class="flex flex-col mt-4">
                                            <label class="text-sm font-semibold text-gray-600 py-2">Team
                                                Description</label>
                                            <input
                                                v-model="form.description"
                                                class="px-4 py-2 border rounded text-gray-700 focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                placeholder="Team Description"
                                                type="text"/>
                                            <InputError :message="form.errors.description" class="mt-2"/>
                                        </div>
                                        <div class="flex flex-col mt-4">
                                            <label class="text-sm font-semibold text-gray-600 py-2">Import Teams
                                            </label>
                                            <input
                                                ref="excelInput"
                                                class="px-4 py-2 border border-gray-500 rounded file:rounded file:bg-sky-200 file:border-sky-600 file:font-semibold file:text-sky-600 file:border-none file:px-6 file:py-1 file:mr-6 text-gray-700 focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                type="file"
                                                @change="selectNewFile"
                                            >
                                            <InputError :message="form.errors.file" class="mt-2"/>

                                        </div>
                                    </div>
                                </div>
                                <div class="flex mt-6 mb-4 items-end justify-end">
                                    <button
                                        class="px-4 py-2 text-white font-light tracking-wider bg-sky-600 rounded hover:bg-sky-700"
                                    >Create Team
                                    </button>

                                    <button
                                        class="px-4 py-2 ml-3 text-white font-light tracking-wider bg-gray-600 rounded hover:bg-gray-700"
                                    >Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </AppLayout>
</template>
