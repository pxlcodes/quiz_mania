<template>
    <main
        class="min-h-[75vh] px-4 py-4 sm:py-4 sm:px-4 md:py-6 md:px-container lg:py-8 lg:px-container"
    >
        <slot name="top"></slot>

        <section
            class="grid grid-cols-1 gap-4 mt-4 sm:mt-4 sm:grid-cols-1 md:mt-8 md:grid-cols-7 md:gap-10"
        >
            <div class="flex flex-col col-auto md:col-span-2">
                <slot name="left"></slot>
            </div>

            <div class="flex flex-col col-auto md:col-span-5">
                <slot name="right"></slot>
            </div>

        </section>
    </main>
</template>
