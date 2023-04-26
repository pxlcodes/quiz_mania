<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardSideBar from "@/Components/SideMenuBar/DashboardSideBar.vue";

const form = useForm({
    _method: "POST",
    name: "",
    icon: "",
    order: "",
    timeout: "",
    multiplier: "",
    multiplier_to_next_team: "",
    negative_marking_multiplier: "",
    negative_marking_multiplier_to_next_team: "",
    can_pass_to_next_team: "",
    auto_next_team: "",
    auto_next_question: "",
    has_media: "",
    has_multi_choice: "",
    multi_choice_count: "",
    file: null,
});

const excelInput = ref(null);

const createNewCategory = () => {
    if (excelInput.value) {
        form.file = excelInput.value.files[0];
    }

    form.post("/categories", {
        errorBag: "storeCategory",
        preserveScroll: true,
        onSuccess: () => console.log("success"),
    });
};

const selectNewFile = () => {
    excelInput.value.click();
};
</script>

<template>
    <AppLayout title="Dashboard">
        <header
            class="flex items-center justify-between px-4 py-6 bg-slate-800 sm:px-4 md:px-container lg:px-container"
        >
            <div class="flex flex-col items-end justify-between md:flex-row">
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
                            d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>

                    <div class="ml-4 text-3xl font-semibold text-white">
                        Category
                    </div>
                </div>
                <div class="ml-2 text-lg text-slate-300">
                    Create New Category
                </div>
            </div>
        </header>

        <main
            class="min-h-[75vh] px-4 py-4 sm:py-4 sm:px-4 md:py-6 md:px-container lg:py-8 lg:px-container"
        >
            <section
                class="grid grid-cols-1 gap-4 mt-4 sm:mt-4 sm:grid-cols-1 md:mt-8 md:grid-cols-7 md:gap-10"
            >
                <DashboardSideBar active="categories" />

                <div class="flex flex-col col-auto md:col-span-5">
                    <div class="flex flex-col md:col-span-2">
                        <div
                            class="flex flex-col overflow-hidden bg-white rounded-sm shadow-md drop-shadow-md dark:bg-slate-800"
                        >
                            <span
                                class="flex bg-sky-600 px-3 py-2.5 font-semibold text-slate-50 dark:bg-sky-800"
                                >Create New Category</span
                            >
                            <form
                                class="px-3 py-2.5 accent-sky-600"
                                @submit.prevent="createNewCategory"
                            >
                                <div class="flex px-5 py-4 space-x-8">
                                    <div class="flex flex-col w-full">
                                        <div class="flex flex-col">
                                            <label
                                                class="py-2 text-sm font-semibold text-gray-600"
                                                >Category Name</label
                                            >
                                            <input
                                                v-model="form.name"
                                                class="px-4 py-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                placeholder="Category Name"
                                                type="text"
                                            />
                                        </div>
                                        <div class="flex flex-col mt-4">
                                            <label
                                                class="py-2 text-sm font-semibold text-gray-600"
                                                >Category Icon</label
                                            >
                                            <input
                                                v-model="form.icon"
                                                class="px-4 py-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                placeholder="Paste SVG icon here"
                                                type="text"
                                            />
                                            <span
                                                class="pt-2 text-sm font-semibold text-gray-600"
                                            >
                                                <a
                                                    class="text-sky-600"
                                                    href="https://heroicons.com/"
                                                    target="_blank"
                                                    >Click here</a
                                                >
                                                to get icon from Heroicons and
                                                paste it here.
                                            </span>
                                        </div>
                                        <div class="grid grid-cols-4 gap-4">
                                            <div class="flex flex-col mt-4">
                                                <label
                                                    class="py-2 text-sm font-semibold text-gray-600"
                                                    >Category Order</label
                                                >
                                                <input
                                                    v-model="form.order"
                                                    class="px-4 py-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                    placeholder="Category Order"
                                                    type="number"
                                                />
                                            </div>

                                            <div class="flex flex-col mt-4">
                                                <label
                                                    class="py-2 text-sm font-semibold text-gray-600"
                                                    >Category Timeout</label
                                                >
                                                <input
                                                    v-model="form.timeout"
                                                    class="px-4 py-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                    placeholder="Category Timeout"
                                                    type="number"
                                                />
                                            </div>

                                            <div class="flex flex-col mt-4">
                                                <label
                                                    class="py-2 text-sm font-semibold text-gray-600"
                                                    >Point Multiplier</label
                                                >
                                                <input
                                                    v-model="form.multiplier"
                                                    class="px-4 py-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                    placeholder="Point Multiplier"
                                                    type="number"
                                                />
                                            </div>

                                            <div class="flex flex-col mt-4">
                                                <label
                                                    class="py-2 text-sm font-semibold text-gray-600"
                                                    >Point Multiplier to next
                                                    team</label
                                                >
                                                <input
                                                    v-model="
                                                        form.multiplier_to_next_team
                                                    "
                                                    class="px-4 py-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                    placeholder="Point Multiplier to next team"
                                                    type="number"
                                                />
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-4 gap-4">
                                            <div class="flex flex-col mt-4">
                                                <label
                                                    class="py-2 text-sm font-semibold text-gray-600"
                                                    >Can Pass To Next
                                                    Team</label
                                                >
                                                <input
                                                    v-model="
                                                        form.can_pass_to_next_team
                                                    "
                                                    class="px-2 py-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                    type="checkbox"
                                                />
                                            </div>

                                            <div class="flex flex-col mt-4">
                                                <label
                                                    class="py-2 text-sm font-semibold text-gray-600"
                                                    >Auto Pass To Next
                                                    Team</label
                                                >
                                                <input
                                                    v-model="
                                                        form.auto_next_team
                                                    "
                                                    class="px-2 py-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                    type="checkbox"
                                                />
                                            </div>

                                            <div class="flex flex-col mt-4">
                                                <label
                                                    class="py-2 text-sm font-semibold text-gray-600"
                                                    >Auto Next Question</label
                                                >
                                                <input
                                                    v-model="
                                                        form.auto_next_question
                                                    "
                                                    class="px-2 py-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                    type="checkbox"
                                                />
                                            </div>

                                            <div class="flex flex-col mt-4">
                                                <label
                                                    class="py-2 text-sm font-semibold text-gray-600"
                                                    >Has Media</label
                                                >
                                                <input
                                                    v-model="form.has_media"
                                                    class="px-2 py-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                    type="checkbox"
                                                />
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-4 gap-4">
                                            <div class="flex flex-col mt-4">
                                                <label
                                                    class="py-2 text-sm font-semibold text-gray-600"
                                                    >Has Multi Choice</label
                                                >
                                                <input
                                                    v-model="
                                                        form.has_multi_choice
                                                    "
                                                    class="px-2 py-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                    type="checkbox"
                                                />
                                            </div>
                                            <div
                                                v-if="form.has_multi_choice"
                                                class="flex flex-col mt-4"
                                            >
                                                <label
                                                    class="py-2 text-sm font-semibold text-gray-600"
                                                    >Multi Choice Count</label
                                                >
                                                <input
                                                    v-model="
                                                        form.multi_choice_count
                                                    "
                                                    class="px-4 py-2 text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                    placeholder="Multi Choice Count"
                                                    type="number"
                                                />
                                            </div>

                                            <div
                                                class="flex flex-col col-span-2 mt-4"
                                            >
                                                <label
                                                    class="py-2 text-sm font-semibold text-gray-600"
                                                    >Import Categories from
                                                    Excel
                                                </label>
                                                <input
                                                    ref="excelInput"
                                                    class="text-gray-700 border border-gray-500 rounded file:rounded file:bg-gray-200 file:border-gray-600 file:font-semibold file:text-gray-600 file:border-none file:px-6 file:py-2 file:mr-6 focus:outline-none focus:ring-2 focus:ring-sky-600 focus:border-transparent"
                                                    type="file"
                                                    @change="selectNewFile"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex items-end justify-end mt-6 mb-4"
                                >
                                    <button
                                        class="px-4 py-2 font-light tracking-wider text-white rounded bg-sky-600 hover:bg-sky-700"
                                    >
                                        Create Category
                                    </button>

                                    <button
                                        class="px-4 py-2 ml-3 font-light tracking-wider text-white bg-gray-600 rounded hover:bg-gray-700"
                                    >
                                        Cancel
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
