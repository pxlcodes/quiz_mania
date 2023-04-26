<script setup>

defineProps({
    title: String,
    subtitle: String,
    icon: String,
});
</script>

<template>
    <header
        class="flex items-center justify-between px-4 py-6 bg-slate-800 sm:px-4 md:px-container lg:px-container"
    >
        <div class="flex flex-col items-end justify-between md:flex-row">
            <div class="flex items-center justify-center">
                <div class="w-10 h-10 text-white">
                    <slot/>
                </div>
                <span class="ml-4 text-3xl font-semibold text-white" v-html="title"/>
            </div>
            <span class="ml-2 text-lg text-slate-300" v-html="subtitle"/>
        </div>
    </header>
</template>
