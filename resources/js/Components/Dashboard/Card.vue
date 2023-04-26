<script setup>
defineProps({
    title: String,
});


</script>

<template>
    <div class="flex flex-col md:col-span-2">
        <div
            class="flex flex-col overflow-hidden bg-white rounded-sm shadow-md drop-shadow-md dark:bg-slate-800"
        >
                            <span
                                class="flex bg-sky-600 px-3 py-2.5 font-semibold text-slate-50 dark:bg-sky-800"
                            >
                                {{ title }}
                            </span>
            <div class="px-3 py-2.5">
                <slot></slot>

            </div>
        </div>
    </div>

</template>
