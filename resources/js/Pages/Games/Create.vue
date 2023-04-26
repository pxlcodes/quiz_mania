<script setup>
import {ref} from 'vue';
import {useForm} from '@inertiajs/inertia-vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardSideBar from "@/Components/SideMenuBar/DashboardSideBar.vue";


const form = useForm({
    _method: 'POST',
    name: '',
    description: '',
    file: null,
});

const excelInput = ref(null);

const createNewGame = () => {
    if (excelInput.value) {
        form.file = excelInput.value.files[0];
    }

    form.post('/games', {
        errorBag: 'storeGame',
        preserveScroll: true,
        onSuccess: () => console.log('success'),
    });
};

const selectNewFile = () => {
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
                         viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>

                    <div class="ml-4 text-3xl font-semibold text-white">
                        Game
                    </div>
                </div>
                <div class="ml-2 text-lg text-slate-300">Create New Game</div>
            </div>
        </header>

        <main
            class="min-h-[75vh] px-4 py-4 sm:py-4 sm:px-4 md:py-6 md:px-container lg:py-8 lg:px-container"
        >

            <section
                class="grid grid-cols-1 gap-4 mt-4 sm:mt-4 sm:grid-cols-1 md:mt-8 md:grid-cols-7 md:gap-10"
            >
                <DashboardSideBar active="games"/>

                <div class="flex flex-col col-auto md:col-span-5">
                    <div class="flex flex-col md:col-span-2">
                        <div
                            class="flex flex-col overflow-hidden bg-white rounded-sm shadow-md drop-shadow-md dark:bg-slate-800"
                        >
                            <span
                                class="flex bg-sky-600 px-3 py-2.5 font-semibold text-slate-50 dark:bg-sky-800"
                            >Create New Game</span>
                            <form class="px-3 py-2.5 accent-sky-600" @submit.prevent="createNewGame">
                                <div class="px-5 py-4 flex space-x-8">
                                    <div class="flex flex-col w-full">
                                        <div class="flex flex-col">
                                            <label class="text-sm font-semibold text-gray-600 py-2">Game Name</label>
                                            <input
                                                v-model="form.name"
                                                class="px-4 py-2 border rounded text-gray-700 focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                placeholder="Game Name"
                                                type="text"/>
                                        </div>
                                        <div class="flex flex-col mt-4">
                                            <label class="text-sm font-semibold text-gray-600 py-2">Game
                                                Description</label>
                                            <input
                                                v-model="form.description"
                                                class="px-4 py-2 border rounded text-gray-700 focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                placeholder="Game Description"
                                                type="text"/>
                                        </div>

                                        <div class="flex flex-col mt-4">
                                            <label class="text-sm font-semibold text-gray-600 py-2">Import Questions
                                            </label>
                                            <input
                                                ref="excelInput"
                                                class="px-4 py-2
                                                border
                                                border-gray-500
                                                rounded
                                                file:rounded
                                                file:bg-sky-200
                                                file:border-sky-600
                                                file:font-semibold
                                                file:text-sky-600
                                                file:border-none
                                                file:px-6
                                                file:py-1
                                                file:mr-6
                                                text-gray-700 focus:outline-none
                                                focus:ring-2 focus:ring-sky-600
                                                focus:border-transparent"
                                                type="file"
                                                @change="selectNewFile"
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="flex mt-6 mb-4 items-end justify-end">
                                    <button
                                        class="px-4 py-2 text-white font-light tracking-wider bg-sky-600 rounded hover:bg-sky-700"
                                    >Create Game
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
