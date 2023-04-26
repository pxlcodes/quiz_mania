import {onMounted} from "vue";

export function useAudio() {

    const audio = {
        correct: new Audio('http://127.0.0.1:8000/storage/audio/correct.wav'),
        incorrect: new Audio('http://127.0.0.1:8000/storage/audio/incorrect.wav'),
        pass: new Audio('http://127.0.0.1:8000/storage/audio/pass.wav'),
        timeOut: new Audio('http://127.0.0.1:8000/storage/audio/timeout.mp3'),
        lock: new Audio('http://127.0.0.1:8000/storage/audio/lock.wav'),
        lowTime: new Audio('http://127.0.0.1:8000/storage/audio/bell-tick-tock-timer.wav'),
        reveal: new Audio('http://127.0.0.1:8000/storage/audio/reveal.mp3'),
    }

    onMounted(async () => {
        for (const [key, value] of Object.entries(audio)) {
            await value.pause()
            value.currentTime = 0
            value.preload = 'metadata'
        }
    })

    const playAudio = async (media, timeout) => {
        for (const [key, value] of Object.entries(audio)) {
            await value.pause()
            value.currentTime = 0
        }
        await media.play()
        setTimeout(async () => {
            await media.pause()
            media.currentTime = 0
        }, timeout)
    }

    return {
        audio,
        playAudio
    }
}
