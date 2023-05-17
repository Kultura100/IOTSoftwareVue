
<template>
    <AppLayout :title="__('dashboard.camerapanel.info2.routename')">
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('dashboard.camerapanel.info2.routename') }}
            </h2>
        </template>

        <div class="py-2">
            <div class="flex flex-col gap-1 ml-2 mr-2 lg:flex-row">
                <div class="w-full">
                    <div class="mb-1 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto"
                        style="background: rgba(0, 0, 0, 0.2);">
                        <i class="fa-solid fa-microchip fa-3x"></i>
                        <div class="w-full lg:ml-4 ml-1 self-center overflow-x-hidden">
                            <div v-if="odczyt" class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                {{ odczyt.name }}
                            </div>
                            <div v-if="odczyt" class="text-sm  text-white font-bold">{{__('dashboard.camerapanel.info2.refresh')}} {{ odczyt.now }}
                            </div>
                        </div>
                        <div>
                            <i @click="odswiez()" class="fa-solid fa-arrows-rotate fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-1 ml-2 mr-2 lg:flex-row justify-between">
                <div class="lg:w-1/3 w-full">
                    <div class="w-full truncate text-white text-lg font-bold leading-6 tracking-tight">
                        {{__('dashboard.camerapanel.info2.status')}}
                    </div>
                    <div class="mb-1 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto"
                        style="background: rgba(0, 0, 0, 0.2);">
                        <div class="w-full lg:ml-4 ml-1 self-center overflow-x-hidden">
                            <div class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                <p v-if="cameradetails" v-for="camera in cameradetails" :key="camera.id">
                                    {{ camera }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/3 w-full">
                    <div class="w-full truncate text-white text-lg font-bold leading-6 tracking-tight">
                        {{__('dashboard.camerapanel.info2.params')}}
                    </div>
                    <div class="mb-1 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto"
                        style="background: rgba(0, 0, 0, 0.2);">
                        <div class="w-full lg:ml-4 ml-1 self-center overflow-x-hidden">
                            <div class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                <p v-if="cameradetails2" v-for="camera in cameradetails2" :key="camera.id">
                                    {{ camera }}
                                </p>
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
    name: "CameraInfo",
    components: {
        AppLayout,
    },
    props: ["odczyt", "cameradetails","cameradetails2"],
    data() {
        return {
            form: {
            },
        };
    },
    methods: {
        odswiez() {
            Inertia.reload();
        }
    },
};
</script>