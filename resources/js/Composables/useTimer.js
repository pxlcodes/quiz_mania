import {computed, ref} from "vue";
import {useAudio} from "@/Composables/useAudio";

export function useTimer() {

    const {audio, playAudio} = useAudio()
    const timeout = ref(0)
    const timer = ref(0)
    const interval = ref(0)
    const timedOut = ref(false)
    const lowTime = ref(false)
    const warningTime = ref(10)

    const progress = computed(() => (timer.value / timeout.value) * 100)

    const setTimeout = (value) => timeout.value = value
    const setTimer = (value) => timer.value = value
    const setWarningTime = (value) => warningTime.value = value
    const resetTimer = () => timer.value = timeout.value

    const restartTimer = async () => {
        resetTimer()
        stopTimer()
        await startTimer()
    }
    const stopTimer = () => {
        timedOut.value = true
        clearInterval(interval.value)
    }

    const startTimer = async () => {
        timedOut.value = false
        interval.value = setInterval(async () => {
            timer.value--

            (progress.value <= warningTime.value) ? await timeUp() : ''

            if (timer.value === 0) {
                await playAudio(audio.timeOut, 1000)
                stopTimer()
            }
        }, 1000)
    }

    const timeUp = async () => {
        lowTime.value = true
        if (lowTime.value) {
            await playAudio(audio.lowTime, 420)
        }
    }

    return {
        timer,
        interval,
        progress,
        lowTime,
        setTimeout,
        resetTimer,
        setWarningTime,
        restartTimer,
        stopTimer,
        setTimer
    }
}
