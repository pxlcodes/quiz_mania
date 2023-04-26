import {computed, ref} from "vue";

export function useTeam() {

    const teams = ref({})
    const team = ref({})

    const current_playing_team = ref(teams[2])
    const current_selected_team = ref(teams[2])

    const currentPlayingTeam = computed(() => {
        return current_playing_team.value.description
    })
  
    return {
        teams,
        team,
        current_playing_team,
        current_selected_team
    }
}
