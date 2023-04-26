<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";</script>

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
                <a class="dark:text-slate-300 text-slate-50 ml-3" href="/dashboard">Category</a>
                <svg class="ml-3 w-4 h-4 text-slate-200 dark:text-slate-600" fill="none" stroke="currentColor"
                     stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.25 4.5l7.5 7.5-7.5 7.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="ml-3 text-slate-200 dark:text-slate-400">General</span>
            </div>

            <section class=" mt-4 sm:mt-4  md:mt-8">

                <div>
                    <h2 v-html="currentTeam"></h2>
                </div>

                <div class="flex flex-col justify-center items-center">

                    <h1 class=" text-6xl font-semibold text-center mt-6" v-html="question"></h1>
                    <h1 v-if="reveal" class="text-4xl font-semibold text-center mt-12" v-html="answer"/>
                    <h1 v-else class="text-4xl font-semibold text-center mt-12" v-html="'???'"/>

                    <div class="mt-24">
                        <div class="text-6xl font-bold">
                            {{ timer }}
                        </div>
                        <audio ref="audio" :src="audioSrc"></audio>
                    </div>
                    <div class="w-full relative mt-10">
                        <div class="absolute h-2 rounded-full w-full bg-red-300"></div>
                        <div :style="{width: progress + '%'}"
                             class="absolute h-2 rounded-full w-full bg-green-400"></div>
                        <!--                        <div class="absolute h-2 rounded-full bg-green-400"></div>-->
                    </div>

                    <div class="flex mt-[15vh] space-x-8">
                        <button
                            :class="timer===0 ? 'cursor-not-allowed bg-stone-100/75 border-stone-600 text-stone-600' : 'bg-green-100/75 border-green-600 text-green-600'"
                            class="flex px-6 py-2 rounded border border-0.5 shadow-md font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.5 12.75l6 6 9-13.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="ml-6">Correct</span>
                        </button>
                        <button
                            :class="lock ? 'cursor-not-allowed bg-stone-100/75 border-stone-600 text-stone-600' : 'bg-amber-100/75 border-amber-600 text-amber-600'"
                            class="flex px-6 py-2 rounded border border-0.5 shadow-md font-bold"
                            @click="lock=true">
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
                            @click="reveal=true">

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
                            class="flex px-6 py-2 rounded border border-0.5 shadow-md font-bold">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="ml-6">Incorrect</span>
                        </button>
                        <button
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
            </section>
        </main>
    </AppLayout>
</template>

<script>

export default {

    data() {
        return {
            question: 'लाफिङ ग्यास भनेर कुन ग्यासलाई चिनिन्छ ?',
            options: ['Karnali', 'Babai', 'Sunkoshi', 'Koshi'],
            answer: 'नाइट्रस अक्साइड',
            teams: ['Team 1', 'Team 2', 'Team 3', 'Team 4'],
            current_team: 0,
            timer: 5,
            lock: false,
            reveal: false,
            audioSrc: 'http://127.0.0.1:8000/storage/audio/wrong-answer-948.wav',

        }
    },
    computed: {
        progress() {
            return (this.timer / 60) * 100
        },
        currentTeam() {
            return this.teams[this.current_team]
        }
    },

    methods: {
        setReveal() {
            this.reveal = true
        },
        passToNext() {
            this.timer = 60
            if (this.current_team === this.teams.length - 1) {
                this.current_team = 0
            } else {
                this.current_team++
            }
        }

    },


    mounted() {
        setInterval(() => {
            if (this.timer === 0 || this.lock) {
                this.lock = true
                this.$refs.audio.play();
                return;
            }
            this.timer--
        }, 1000)
    }
}
</script>

