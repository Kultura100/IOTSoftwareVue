<template>
    <AppLayout :title="__('raports.routename')">
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('raports.routename') }}
            </h2>
        </template>

        <div class="py-2">
            <div class="flex flex-col gap-2 ml-2 mr-2 lg:flex-row">
                <div class="w-full">
                    <div class="mb-3 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto" style="background: rgba(0, 0, 0, 0.2);">
                        <i class="fa-solid fa-list fa-3x"></i>
                        <div class="w-full lg:ml-4 ml-1 self-center overflow-x-hidden">
                            <div class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                {{ __('raports.panel.title') }}
                            </div>
                            <div v-if="raports" class="text-sm  text-white font-bold">{{ __('raports.panel.description') }} {{ time }}</div>
                        </div>
                        <div>
                            <i @click="odswiez()" class="fa-solid fa-arrows-rotate fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div v-for="raport in raports" class="flex flex-col gap-2 ml-2 mr-2 lg:flex-row">
                <div class="w-full">
                    <div class="mb-3 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto" style="background: rgba(0, 0, 0, 0.2);">
                        <div class="flex w-full flex-row lg:w-full">
                            <div class="relative flex flex-col mr-2 lg:mr-0">
                                <div class="flex h-10 w-10 flex-shrink-0 flex-col justify-center items-center">
                                    <i class="fa-solid fa-flag fa-2x"></i>
                                </div>
                            </div>
                            <div class="w-full lg:ml-4 ml-1 self-center overflow-x-hidden">
                                <div class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                    {{ raport.title }}
                                </div>
                                <div v-if="raport" class="flex text-sm text-white font-bold break-words">
                                    {{ raport.description }}
                                </div>
                            </div>
                            <div class="my-auto lg:block hidden">
                                <i class="fa-solid fa-clock fa-lg">
                                    <span class="leading-3 font-bold whitespace-nowrap ml-2 text-lg font-sans">{{ raport.Date }}</span></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Inertia } from "@inertiajs/inertia";
export default {
    name: "Raports",
    components: {
        AppLayout,
    },
    props: ["raports", "time"],
    methods: {
        odswiez() {
            Inertia.reload();
        }
    },
};
</script>