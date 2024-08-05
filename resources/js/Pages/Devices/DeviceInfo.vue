
<template>
    <AppLayout :title="__('dashboard.transmitterpanel.info.routename')">
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('dashboard.transmitterpanel.info.routename') }}
            </h2>
        </template>

        <div v-if="device" class="py-2">
            <div class="flex flex-col gap-2 ml-2 mr-2 lg:flex-row">
                <div class="w-full">
                    <div class="mb-3 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto" style="background: rgba(0, 0, 0, 0.2);">
                        <i class="fa-solid fa-microchip fa-3x"></i>
                        <div class="w-full lg:ml-4 ml-1 self-center overflow-x-hidden">
                            <div class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                {{ device.name }}
                            </div>
                            <div v-if="odczyt" class="text-sm  text-white font-bold">{{ __('dashboard.transmitterpanel.info.refresh') }} {{ odczyt.Date }}</div>
                        </div>
                        <div>
                            <i @click="odswiez()" class="fa-solid fa-arrows-rotate fa-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-2 ml-2 mr-2 lg:flex-row">
                <div class="w-full lg:w-1/2">
                    <div class="mb-3 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto" style="background: rgba(0, 0, 0, 0.2);">
                        <div class="flex w-full flex-row lg:w-full">
                            <div class="relative flex flex-col">
                                <div class="flex h-10 w-10 flex-shrink-0 flex-col justify-center items-center">
                                    <i class="fa-solid fa-droplet fa-3x"></i>
                                </div>
                            </div>
                            <div class="w-full lg:ml-4 ml-1 self-center overflow-x-hidden">
                                <div class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                    {{ __('dashboard.transmitterpanel.info.raining') }}
                                </div>
                                <div v-if="odczyt">
                                    <div v-if="odczyt.israining == null" class="text-sm uppercase text-slate-500 font-bold">
                                        {{ __('dashboard.transmitterpanel.info.optionuna') }}
                                    </div>
                                    <div v-else-if="odczyt.israining == true" class="text-sm uppercase text-green-500 font-bold">
                                        {{ __('dashboard.transmitterpanel.info.yes') }}
                                    </div>
                                    <div v-else class="text-sm  uppercase text-red-500 font-bold">{{ __('dashboard.transmitterpanel.info.no') }} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="mb-3 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto" style="background: rgba(0, 0, 0, 0.2);">
                        <div class="flex w-full flex-row lg:w-full">
                            <div class="relative flex flex-col">
                                <div class="flex h-10 w-10 flex-shrink-0 flex-col justify-center items-center">
                                    <i class="fa-regular fa-sun fa-3x"></i>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/2 lg:ml-4 ml-1 self-center overflow-x-hidden">
                                <div class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                    {{ __('dashboard.transmitterpanel.info.sunshine') }}
                                </div>
                                <div v-if="odczyt" class="flex flex-row items-center justify-start gap-6">
                                    <div v-if="odczyt.islight == null" class="text-sm uppercase text-slate-500 font-bold">
                                        {{ __('dashboard.transmitterpanel.info.optionuna') }}
                                    </div>
                                    <div v-else-if="odczyt.islight == true" class="text-sm uppercase text-green-500 font-bold">
                                        {{ __('dashboard.transmitterpanel.info.yes') }}
                                    </div>
                                    <div v-else class="text-sm  uppercase text-red-500 font-bold"> {{ __('dashboard.transmitterpanel.info.no') }} </div>
                                    <span class="text-xs uppercase font-bold">Poziom światła: {{ odczyt.lightlevel }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-2 ml-2 mr-2 lg:flex-row">
                <div class="w-full lg:w-1/3">
                    <div class="mb-3 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto" style="background: rgba(0, 0, 0, 0.2);">
                        <div class="flex w-full flex-row lg:w-full">
                            <div class="relative flex flex-col">
                                <div class="flex h-10 w-10 flex-shrink-0 flex-col justify-center items-center">
                                    <i class="fa-solid fa-temperature-quarter fa-3x"></i>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/2 lg:ml-4 ml-1 self-center overflow-x-hidden">
                                <div class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                    {{ __('dashboard.transmitterpanel.info.temperature') }}
                                </div>
                                <div v-if="odczyt">
                                    <div v-if="odczyt.temperature1 == null" class="text-sm uppercase text-slate-500 font-bold">
                                        {{ __('dashboard.transmitterpanel.info.optionuna') }}
                                    </div>
                                    <div v-else-if="odczyt.temperature1" class="text-sm  uppercase text-white font-bold">{{
                                        odczyt.temperature1
                                    }}º</div>
                                    <div v-else class="text-sm  uppercase text-white font-bold"> N/a º</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/3">
                    <div class="mb-3 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto" style="background: rgba(0, 0, 0, 0.2);">
                        <div class="flex w-full flex-row lg:w-full">
                            <div class="relative flex flex-col">
                                <div class="flex h-10 w-10 flex-shrink-0 flex-col justify-center items-center">
                                    <i class="fa-solid fa-temperature-quarter fa-3x"></i>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/2 lg:ml-4 ml-1 self-center overflow-x-hidden">
                                <div class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                    {{ __('dashboard.transmitterpanel.info.temperature2') }}
                                </div>
                                <div v-if="odczyt">
                                    <div v-if="odczyt.temperature2 == null" class="text-sm uppercase text-slate-500 font-bold">
                                        {{ __('dashboard.transmitterpanel.info.optionuna') }}
                                    </div>
                                    <div v-else-if="odczyt.temperature2" class="text-sm  uppercase text-white font-bold">{{
                                        odczyt.temperature2
                                    }}º</div>
                                    <div v-else class="text-sm  uppercase text-white font-bold"> N/a º</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/3">
                    <div class="mb-3 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto" style="background: rgba(0, 0, 0, 0.2);">
                        <div class="flex w-full flex-row lg:w-full">
                            <div class="relative flex flex-col">
                                <div class="flex h-10 w-10 flex-shrink-0 flex-col justify-center items-center">
                                    <i class="fa-solid fa-droplet fa-3x"></i>
                                    <i class="fa-solid fa-percent"></i>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/2 lg:ml-4 ml-1 self-center overflow-x-hidden">
                                <div class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                    {{ __('dashboard.transmitterpanel.info.humidity') }}
                                </div>
                                <div v-if="odczyt">
                                    <div v-if="odczyt.humidity == null" class="text-sm uppercase text-slate-500 font-bold">
                                        {{ __('dashboard.transmitterpanel.info.optionuna') }}
                                    </div>
                                    <div v-else-if="odczyt.humidity" class="text-sm  uppercase text-white font-bold">{{
                                        odczyt.humidity
                                    }}%</div>
                                    <div v-else class="text-sm  uppercase text-white font-bold"> N/a %</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-2 flex max-w-full flex-col" style="background: rgba(0, 0, 0, 0.2);">
                <div class="flex w-full flex-row">
                    <div class="w-full truncate pl-4 pt-4 text-lg text-white font-bold leading-6 tracking-tight">
                        {{ __('dashboard.transmitterpanel.info.tempchart') }}
                    </div>
                    <div class="w-full truncate pl-4 pt-4 text-lg text-white font-bold leading-6 tracking-tight">
                        {{ __('dashboard.transmitterpanel.info.humichart') }}
                    </div>
                </div>

                <div class="flex w-full transform cursor-pointer flex-col rounded-md bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4">
                    <div class="flex flex-col w-full lg:flex-row lg:h-[400] h-96 lg:w-1/2">
                        <canvas class="flex max-w-full" ref="wtemp" width="400" height="400"></canvas>
                        <canvas class="flex max-w-full" ref="whumi" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import Chart from 'chart.js/auto';
export default {
    name: "DeviceInfo",
    components: {
        AppLayout,
    },
    props: ["today", "device", "odczyt", "wtemp", "whumi"],
    mounted() {
        var ctx = this.$refs.wtemp.getContext("2d");
        var ctx2 = this.$refs.whumi.getContext("2d");

        var gradientChartOptionsConfiguration = {
            //animation,
            scales: {
                x: {
                    ticks: {
                        autoSkip: true,
                        maxTicksLimit: 30,
                        color: 'white',
                    },
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: "Point",
                    }
                },
                y: {
                    ticks: {
                        color: 'white',
                    },
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: "Value"
                    }
                }
            },
            maintainAspectRatio: false,
            legend: {
                display: true,

            },
            responsive: true,
        };

        this.wykres = new Chart(ctx, {
            type: 'line',
            data: this.wtemp,
            options: gradientChartOptionsConfiguration
        });

        this.wykres2 = new Chart(ctx2, {
            type: 'line',
            data: this.whumi,
            options: gradientChartOptionsConfiguration
        });
    },
    unmounted() {
        this.wykres.destroy();
    },
    watch: {
        // wtemp(){
        //     this.wykres.data = this.wtemp;
        //     this.wykres.update();
        //     this.wykres2.data = this.whumi;
        //     this.wykres2.update();
        // },

    },
    created() {
        //this.timer = setInterval(this.pobierzdane, 5000);

    },
    methods: {
        //pobierzdane() {
        //Inertia.reload();
        //}
        odswiez() {
            Inertia.reload();
            this.wykres.data = this.wtemp;
            this.wykres.update();
            this.wykres2.data = this.whumi;
            this.wykres2.update();
        },
    },
};
</script>