<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardSideBar from "@/Components/SideMenuBar/DashboardSideBar.vue";
import DashboardContainer from "@/Components/Dashboard/Container.vue";
import Breadcrumb from "@/Components/Dashboard/Breadcrumb.vue";
import DashboardCard from "@/Components/Dashboard/Card.vue";
import DashboardHeader from "@/Components/Dashboard/Header.vue";
import {
    ClockIcon,
    CubeIcon,
    PencilSquareIcon,
    PlayIcon,
    SwatchIcon,
    TrashIcon,
    UserGroupIcon
} from '@heroicons/vue/24/outline'

const breadcrumb = {
    title: "Dashboard",
    url: route("dashboard"),
    child: {
        title: "Games",
    },
}
defineProps(["games"])

</script>

<template>
    <AppLayout title="Dashboard">

        <DashboardHeader subtitle="Manage games" title="Games">
            <CubeIcon/>
        </DashboardHeader>

        <DashboardContainer>
            <template #top>
                <Breadcrumb :breadcrumb="breadcrumb"/>
            </template>

            <template #left>
                <DashboardSideBar active="games"/>
            </template>

            <template #right>
                <DashboardCard title="Inter School Quiz Competition 2079">
                    <div
                        class="grid grid-cols-1 gap-10 px-5 py-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4">
                        <div v-for="game in games" :key="game.id"
                             class="flex flex-col items-center justify-center py-3 px-3 rounded-sm shadow-inner bg-sky-100 text-sky-600 dark:bg-sky-800 dark:text-sky-100"
                        >
                            <div class="flex items-center justify-center text-2xl font-bold">
                                <span class="text-lg font-semibold">{{ game.name }}</span>
                            </div>
                            <div class="mt-4 flex space-x-4">
                                <div class="flex text-rose-600">
                                    <UserGroupIcon class="w-6 h-6 mr-1"/>
                                    <span>0</span>
                                </div>


                                <div class="flex text-blue-600">
                                    <SwatchIcon class="w-6 h-6 mr-1"/>
                                    <span>7</span>
                                </div>

                                <div class="flex text-violet-600">
                                    <ClockIcon class="w-6 h-6 mr-1"/>
                                    <span>{{ game.total_time }}</span>
                                </div>
                                
                            </div>
                            <div class="flex mt-4 space-x-3">
                                <button
                                    v-if="game.policies['can_edit']"
                                    class="rounded-full bg-violet-200 p-1.5 text-violet-600 border-violet-400 border border-dashed hover:border-solid">
                                    <span class="font-semibold">
                                                    <PencilSquareIcon class="w-5 h-5 mx-auto"/>
                                    </span>
                                </button>
                                <button
                                    v-if="game.policies['can_delete']"
                                    class="rounded-full bg-red-200 p-1.5 text-red-600 border-red-400 border border-dashed hover:border-solid">
                                    <span class="font-semibold">
                                                    <TrashIcon class="w-5 h-5 mx-auto"/>
                                    </span>
                                </button>
                                <button
                                    v-if="game.policies['can_play']"
                                    class="rounded-full bg-sky-200 p-1.5 text-sky-600 border-sky-400 border border-dashed hover:border-solid">
                                    <span class="font-semibold">
                                                    <PlayIcon class="w-5 h-5 mx-auto"/>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </DashboardCard>
            </template>
        </DashboardContainer>
    </AppLayout>
</template>
