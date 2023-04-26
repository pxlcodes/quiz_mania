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

        <main class="min-h-[75vh] px-4 py-4 sm:py-4 sm:px-4 md:py-6 md:px-2 lg:py-8 lg:px-container">
            <div
                class="px-3 py-2 flex items-center  font-normal rounded-sm bg-slate-400  dark:bg-slate-800 "
            >
                <a class="dark:text-slate-300 text-slate-50" href="/dashboard">Dashboard</a>
                <svg class="ml-3 w-4 h-4 text-slate-200 dark:text-slate-600" fill="none" stroke="currentColor"
                     stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.25 4.5l7.5 7.5-7.5 7.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <a :href="route('categories.index')"
                   class="dark:text-slate-300 text-slate-50 ml-3">Category</a>
                <svg class="ml-3 w-4 h-4 text-slate-200 dark:text-slate-600" fill="none" stroke="currentColor"
                     stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.25 4.5l7.5 7.5-7.5 7.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <a :href="route('categories.show',question.category.name.toLowerCase() )"
                   class="dark:text-slate-300 text-slate-50 ml-3">{{ question.category.name }}</a>
                <svg class="ml-3 w-4 h-4 text-slate-200 dark:text-slate-600" fill="none" stroke="currentColor"
                     stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.25 4.5l7.5 7.5-7.5 7.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="ml-3 text-slate-200 dark:text-slate-400">{{ question.order }}</span>
            </div>
            <section
                class="grid grid-cols-1 gap-4 mt-4 sm:mt-4 sm:grid-cols-1 md:mt-8 md:grid-cols-7 md:gap-4 lg:gap-10"
            >
                <div class="flex flex-col col-auto md:col-span-2">
                    <div
                        class="flex flex-col overflow-hidden bg-white rounded-sm shadow-md drop-shadow-md dark:bg-slate-800 dark:text-white"
                    >
                        <div v-for="team in teams" :key="team.id"
                             class="flex hidden justify-between px-3 py-2.5 bg-sky-600 text-slate-50 hover:bg-sky-700 dark:bg-sky-800 dark:hover:bg-sky-600"
                        >
                            <span class="ml-2 font-semibold" v-html="team.description"/>
                            <span class="ml-2 font-semibold" v-html="team.points"/>
                        </div>
                    </div>
                    <TeamSideBar :current_selected_team="current_selected_team" :teams="teams"/>
                </div>

                <div class="flex flex-col col-auto md:col-span-5">
                    <div class="flex flex-col md:col-span-2">
                        <div
                            class="flex flex-col overflow-hidden bg-white rounded-sm shadow-md drop-shadow-md dark:bg-slate-800"
                        >
                            <div
                                class="flex justify-between bg-sky-600 px-4 py-2.5  text-slate-50 dark:bg-sky-800 items-center"
                            >
                                <div class="font-semibold">
                                    <span @click="lowTimer">Question No {{ question.order }}</span>
                                    <span class="ml-5">({{ question.category.name }})</span>
                                </div>
                                <div>
                                    <h2> Current Playing <strong class="ml-2"> {{ currentPlayingTeam }}</strong></h2>
                                </div>
                            </div>
                            <div class="flex flex-col justify-center items-center px-6 pb-10 font-semibold ">
                                <span class="text-4xl text-center mt-6" v-html="question.question"/>
                                <span v-if="reveal" class="text-2xl font-semibold text-center mt-12 text-sky-600"
                                      v-html="answer"/>
                                <span v-else class="text-2xl font-semibold text-center mt-12 text-sky-600"
                                      v-html="'---'"/>

                                <div class="mt-24">
                                    <div class="text-6xl font-bold">
                                        {{ timer }}
                                    </div>
                                </div>
                                <div class="w-full relative mt-10">
                                    <div class="absolute h-2 rounded-full w-full bg-pink-500"></div>
                                    <div :style="{width: progress + '%'}"
                                         class="absolute h-2 rounded-full w-full bg-green-500"></div>
                                    <!--                        <div class="absolute h-2 rounded-full bg-green-400"></div>-->
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 mt-[15vh] gap-4">
                                    <button
                                        :class="timer===0 ? 'cursor-not-allowed bg-stone-100/75 border-stone-600 text-stone-600' : 'bg-green-100/75 border-green-600 text-green-600'"
                                        class="flex px-6 py-2 rounded border border-0.5 shadow-md font-bold"
                                        @click="correct">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.5 12.75l6 6 9-13.5" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                        </svg>
                                        <span class="ml-6">Correct</span>
                                    </button>
                                    <button
                                        :class="lock ? 'cursor-not-allowed bg-stone-100/75 border-stone-600 text-stone-600' : 'bg-amber-100/75 border-amber-600 text-amber-600'"
                                        class="flex px-6 py-2 rounded border border-0.5 shadow-md font-bold"
                                        @click="lockAnswer">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>
                                        <span class="ml-6">Lock</span>
                                    </button>
                                    <button
                                        :class="lock ? 'bg-green-100/75 border-green-600 text-green-600' : 'cursor-not-allowed bg-stone-100/75 border-stone-600 text-stone-600'"
                                        class="flex px-6 py-2 rounded border border-0.5 shadow-md font-bold"
                                        @click="setReveal">

                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                        </svg>
                                        <span class="ml-6">Reveal</span>
                                    </button>
                                    <button
                                        :class="timer===0 ? 'cursor-not-allowed bg-stone-100/75 border-stone-600 text-stone-600' : 'bg-red-100/75 border-red-600 text-red-600'"
                                        class="flex px-6 py-2 rounded border border-0.5 shadow-md font-bold"
                                        @click="incorrect">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                        </svg>
                                        <span class="ml-6">Incorrect</span>
                                    </button>
                                    <button
                                        v-if="canPassToNextTeam"
                                        class="flex px-6 py-2 rounded border border-0.5 shadow-md font-bold bg-sky-100/75 border-sky-600 text-sky-600"
                                        @click="passToNext()">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"/>
                                        </svg>
                                        <span class="ml-6">Pass</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import {computed, onMounted, ref} from "vue";
import TeamSideBar from "@/Components/SideMenuBar/TeamSideBar.vue";
import {useAudio} from "@/Composables/useAudio";
import {useTimer} from "@/Composables/useTimer";

const props = defineProps({
    question: {
        type: Object,
        required: true
    },
    teams: {
        type: Object,
        required: true
    },
    game: {
        type: Object,
        required: true,
        clockwise: false
    }
})
const lock = ref(false)
const options = ref(props.question.options)
const reveal = ref(false)
const current_playing_team = ref(props.teams[2])
const current_selected_team = ref(props.teams[2])
const pass_count = ref(0)
const {timer, progress, setTimeout, setWarningTime, setTimer, timedOut, stopTimer, restartTimer} = useTimer()
const {audio, playAudio} = useAudio()
const currentPlayingTeam = computed(() => {
    return current_playing_team.value.description
})
const canPassToNextTeam = computed(() => {
    return props.question.category.can_pass_to_next_team && !lock.value && !(pass_count.value > props.teams.length - 2)
})

const answer = computed(() => {
    return props.question.options[0].answer
})

onMounted(() => {
    setTimer(props.question.category.timeout)
    setTimeout(props.question.category.timeout)
    setWarningTime(Math.floor((props.question.category.timeout / 100) * 50))
    restartTimer()
})

const lockAnswer = () => {
    if (lock.value) {
        return
    }
    lock.value = true
    stopTimer()
    playAudio(audio.lock, 60000)
}

const setReveal = () => {
    if (!lock.value) {
        return
    }
    reveal.value = true
    playAudio(audio.reveal, 5000)
}

const correct = () => {
    stopTimer()
    lock.value = true
    reveal.value = true
    playAudio(audio.correct, 5000)

    // post to api
    axios.post('/ajax/team-score/store', {
        team_id: current_selected_team.value.id,
        question_id: props.question.id,
        game_id: props.game.id,
        category_id: props.question.category.id,
        is_correct: true
    })
        .then(response => {
            console.log(response.data)
        })
        .catch(error => {
            console.log(error)
        })


}

const incorrect = () => {
    stopTimer()
    lock.value = true
    reveal.value = false
    playAudio(audio.incorrect, 5000)
}

const playTimeOut = () => {
    if (timedOut.value) {
        return
    }
    playAudio(audio.timeOut, 5000)
}

const passToNext = () => {
    playAudio(audio.pass, 1000)

    if (pass_count.value > props.teams.length - 2) {
        return;
    }

    pass_count.value++

    if (props.game.clockwise) {
        passToNextClockwise()
    } else {
        passToNextCounterClockwise()
    }
    // const index = props.teams.findIndex(team => team.id === current_selected_team.value.id)
    // rotate the team anticlockwise
    // if (index === props.teams.length - 1) {
    //     current_selected_team.value = props.teams[0]
    // } else {
    //     current_selected_team.value = props.teams[index + 1]
    // }
    reset()
}

const passToNextClockwise = () => {
    playAudio(audio.pass, 1000)
    const index = props.teams.findIndex(team => team.id === current_selected_team.value.id)
    // rotate the team clockwise
    if (index === 0) {
        current_selected_team.value = props.teams[props.teams.length - 1]
    } else {
        current_selected_team.value = props.teams[index - 1]
    }
    reset()
}

const passToNextCounterClockwise = () => {
    playAudio(audio.pass, 1000)
    const index = props.teams.findIndex(team => team.id === current_selected_team.value.id)
    // rotate the team anticlockwise
    if (index === props.teams.length - 1) {
        current_selected_team.value = props.teams[0]
    } else {
        current_selected_team.value = props.teams[index + 1]
    }
    reset()
}

const reset = () => {
    lock.value = false
    reveal.value = false
    restartTimer()
}

</script>

