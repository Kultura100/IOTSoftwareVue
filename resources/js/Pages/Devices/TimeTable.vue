<template>
    <AppLayout :title="__('tasktable.routename')">
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('tasktable.routename')}}
            </h2>
        </template>
        <div class="py-2">
            <div class="flex flex-col gap-2 ml-2 mr-2 lg:flex-row">
                <div class="w-full">
                    <div class="mb-3 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto"
                        style="background: rgba(0, 0, 0, 0.2);">
                        <i class="fa-solid fa-calendar fa-3x"></i>
                        <div class="w-full lg:ml-4 ml-1 self-center overflow-x-hidden">
                            <div class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                {{ __('tasktable.title')}}
                            </div>
                        </div>
                        <JetResponsiveNavLink aria-label="timetable" :customclass="'flex  w-full focus:text-orange-500'"
                            :href="route('timetableadd')">
                            <i class="fa-solid fa-plus fa-3x"></i>
                        </JetResponsiveNavLink>
                    </div>
                </div>
            </div>
            <div v-for="(item, index) in timetables" class="flex flex-col gap-2 ml-2 mr-2 lg:flex-row">
                <div class="w-full">
                    <div class="mb-3 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto"
                        style="background: rgba(0, 0, 0, 0.2);">
                        <div class="flex w-full flex-row lg:w-full">
                            <div class="relative flex flex-col mr-2 lg:mr-0">
                                <div class="flex h-10 w-10 flex-shrink-0 flex-col justify-center items-center">
                                    <h1 class="font-bold text-3xl">{{ index+ 1 }}</h1>
                                </div>
                            </div>
                            <div class="w-full lg:ml-4 ml-1 self-center overflow-x-hidden">
                                <div v-if="item.type == 'alldata'"
                                    class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                    ({{ item.device.name }}) -  {{ __('tasktable.types.full')}}
                                </div>
                                <div v-else-if="item.type == 'temperature'"
                                    class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                    ({{ item.device.name }}) - {{ __('tasktable.types.humidity')}}
                                </div>
                                <div v-else-if="item.type == 'humidity'"
                                    class="w-full truncate text-lg font-bold leading-6 tracking-tight">
                                    ({{ item.device.name }}) - {{ __('tasktable.types.temperature')}}
                                </div>
                                <div v-if="item.frequency_function == 'everyThirtyMinutes'"
                                    class="flex text-sm text-white font-bold break-words">
                                    {{ __('tasktable.types.frequency')}} <span class="mx-2 text-gray-300 leading-5">{{ __('tasktable.types.30min')}}</span>
                                </div>
                                <div v-else-if="item.frequency_function == 'hourly'"
                                    class="flex text-sm text-white font-bold break-words">
                                    {{ __('tasktable.types.frequency')}} <span class="mx-2 text-gray-300 leading-5">{{ __('tasktable.types.hour')}}</span>
                                </div>
                                <div v-else-if="item.frequency_function == 'everySixHours'"
                                    class="flex text-sm text-white font-bold break-words">
                                    {{ __('tasktable.types.frequency')}} <span class="mx-2 text-gray-300 leading-5">{{ __('tasktable.types.6hour')}}</span>
                                </div>
                                <div v-else-if="item.frequency_function == 'daily'"
                                    class="flex text-sm text-white font-bold break-words">
                                    {{ __('tasktable.types.frequency')}} <span class="mx-2 text-gray-300 leading-5">{{ __('tasktable.types.daily')}}</span>
                                </div>
                                <div v-else-if="item.frequency_function == 'weekly'"
                                    class="flex text-sm text-white font-bold break-words">
                                    {{ __('tasktable.types.frequency')}} <span class="mx-2 text-gray-300 leading-5">{{ __('tasktable.types.weekly')}}</span>
                                </div>
                                <div v-else-if="item.frequency_function == 'monthly'"
                                    class="flex text-sm text-white font-bold break-words">
                                    {{ __('tasktable.types.frequency')}} <span class="mx-2 text-gray-300 leading-5">{{ __('tasktable.types.monthly')}}</span>
                                </div>
                                <div v-else-if="item.frequency_function == 'weeklyOn'"
                                    class="flex text-sm text-white font-bold break-words">
                                    {{ __('tasktable.types.frequency')}} <span class="mx-2 text-gray-300 leading-5">{{ __('tasktable.types.custom1.description1')}} {{ item.dzien }} {{ __('tasktable.types.custom1.description2')}} {{ item.czas }}.</span>
                                </div>
                                <div v-else-if="item.frequency_function == 'monthlyOn'"
                                    class="flex text-sm text-white font-bold break-words">
                                    {{ __('tasktable.types.frequency')}} <span class="mx-2 text-gray-300 leading-5">{{ __('tasktable.types.custom2.description1')}} {{ item.dzien }} {{ __('tasktable.types.custom2.description2')}} {{ item.czas }}.</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div @click="usun(item.id)" class="flex w-full focus:text-orange-500">
                                <i class="fa-solid fa-minus fa-3x"></i>
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
import JetButton from "@/Components/Button.vue";
import JetResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Inertia } from "@inertiajs/inertia";
export default {
    name: "Harmonogram",
    components: {
        AppLayout,
        JetButton,
        JetResponsiveNavLink
    },
    props: ["timetables"],
    data() {
        return {
            show: false,
        };
    },
    methods: {
        usun($id) {
            Inertia.post(route('timetabledelete', {
                id: $id,
            }));
        },
    },
};
</script>