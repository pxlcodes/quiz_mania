<script setup>
import TeamList from "@/Components/SideMenuBar/TeamList.vue";

defineProps({
    teams: {
        type: Object,
        required: true
    },
    current_selected_team: {
        type: Object,
        required: true
    },

});


</script>
<template>
    <div class="flex flex-col col-auto md:col-span-2">
        <div
            class="flex flex-col overflow-hidden bg-white rounded-sm shadow-md drop-shadow-md dark:bg-slate-800 dark:text-white"
        >
            <div v-for="team in teams" :key="team.id">
                <TeamList :active="team===current_selected_team" :description="team.name"
                          :name="team.description"
                          :points="team.points"/>
            </div>
        </div>

    </div>
</template>
