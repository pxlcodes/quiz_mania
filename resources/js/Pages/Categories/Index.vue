<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardSideBar from "@/Components/SideMenuBar/DashboardSideBar.vue";
import DashboardContainer from "@/Components/Dashboard/Container.vue";
import Breadcrumb from "@/Components/Dashboard/Breadcrumb.vue";
import DashboardCard from "@/Components/Dashboard/Card.vue";
import DashboardHeader from "@/Components/Dashboard/Header.vue";
import {SwatchIcon} from '@heroicons/vue/24/outline'
import Well from "@/Components/Well.vue";
import {ref} from "vue";

defineProps({
    categories: Object,
});

const breadcrumb = ref({
    title: "Dashboard",
    url: route("dashboard"),
    child: {
        title: "Category",
    },
});
</script>

<template>
    <AppLayout title="Categories">

        <DashboardHeader subtitle="Manage categories" title="Categories">
            <SwatchIcon/>
        </DashboardHeader>

        <DashboardContainer>
            <template #top>
                <Breadcrumb :breadcrumb="breadcrumb"/>
            </template>

            <template #left>
                <DashboardSideBar active="categories"/>
            </template>

            <template #right>
                <DashboardCard title="Category Tiles">
                    <div
                        class="grid grid-cols-1 gap-10 px-5 py-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6"
                    >
                        <Well
                            v-for="category in categories"
                            :key="category.id"
                            :href="category.link"
                            :subtitle="category.questions_count"
                            :title="category.name"
                        >
                            <div v-html="category.icon"/>
                        </Well>
                    </div>
                </DashboardCard>
            </template>
        </DashboardContainer>
    </AppLayout>

</template>
