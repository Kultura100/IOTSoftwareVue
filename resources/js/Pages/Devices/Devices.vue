
<template>
    <AppLayout :title="__('devices.routename')">
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight self-start">
                {{__('devices.routename')}}
            </h2>
        </template>

        <div class="py-2">
            <div class="flex flex-col gap-2 ml-2 mr-2 lg:flex-row">
                <div class="w-full lg:w-1/2">
                    <!-- left block -->
                    <div v-for="receiver in receivers" :key="receiver.id"
                        class="mb-3 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 text-slate-800 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg dark:bg-slate-700 dark:bg-opacity-25 dark:text-slate-300 lg:flex-row lg:p-4 mx-auto"
                        style="background: rgba(0, 0, 0, 0.2);">
                        <div class="flex w-full flex-col">
                            <div>
                                <div class="flex w-full flex-col lg:flex-row lg:w-full">
                                    <div class="relative flex flex-row w-12">
                                        <div
                                            class="flex h-12 w-12 flex-shrink-0 flex-col justify-center rounded-full bg-slate-200 bg-opacity-50 dark:bg-slate-600">
                                            <img src="storage/images/odbiornik.png"
                                                class="z-10 h-12 w-12 rounded-full object-cover" alt="camera">

                                            <span v-if="receiver.status_id == 1"
                                                class="absolute right-0 top-0 z-20 flex h-3 w-3">
                                                <span
                                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-400 opacity-75"></span>
                                                <span
                                                    class="relative inline-flex h-3 w-3 rounded-full bg-green-400"></span>
                                            </span>

                                            <span v-else-if="receiver.status_id == 2"
                                                class="absolute right-0 top-0 z-20 flex h-3 w-3">
                                                <span
                                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-400 opacity-75"></span>
                                                <span
                                                    class="relative inline-flex h-3 w-3 rounded-full bg-red-400"></span>
                                            </span>

                                            <span v-else-if="receiver.status_id == 3"
                                                class="absolute right-0 top-0 z-20 flex h-3 w-3">
                                                <span
                                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-yellow-400 opacity-75"></span>
                                                <span
                                                    class="relative inline-flex h-3 w-3 rounded-full bg-yellow-400"></span>
                                            </span>

                                            <span v-else-if="receiver.status_id == 4"
                                                class="absolute right-0 top-0 z-20 flex h-3 w-3">
                                                <span
                                                    class="absolute inline-flex h-full w-full rounded-full bg-gray-400 opacity-75"></span>
                                                <span
                                                    class="relative inline-flex h-3 w-3 rounded-full bg-gray-400"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="relative flex flex-row">
                                        <div class="lg:ml-4 mt-1 self-center overflow-x-hidden">
                                            <div
                                                class="w-full truncate text-xl font-extrabold leading-5 tracking-tight">
                                                {{ receiver.name }}
                                            </div>
                                            <div class="text-sm text-slate-500">{{__('devices.panel.types.receiver')}}</div>
                                        </div>
                                        <div class="relative flex flex-col">
                                            <div class="h-10 overflow-y-hidden"
                                                :class="[receiver.wifistrength != null ? 'waveStrength-' + receiver.parsedstrength : 'waveStrength-0']">
                                                <div class="wv4 wave">
                                                    <div class="wv3 wave">
                                                        <div class="wv2 wave">
                                                            <div class="wv1 wave"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full self-center lg:w-1/3 lg:pt-0 mt-2 lg:mt-0">
                                        <div class="ml-0 lg:ml-1">
                                            <div class="text-xl font-extrabold leading-5 tracking-tight">{{__('devices.panel.address')}}</div>
                                            <div class="text-sm text-slate-500">{{ receiver.localip != null ?
                                                    receiver.localip : __('devices.panel.localiperror')
                                            }}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- For only one receiver -->
                                    <div class="w-full flex self-center lg:w-full lg:pt-0 gap-2 mt-2 lg:mt-0" v-show="receivers[0].status_id == 1">
                                        <img src="storage/images/gate.png" class="z-10 h-12 w-16 object-cover mr-2" alt="Gate">
                                        <SecondaryButton @click="otworzbrame"><img src="storage/images/opengate.png" class="z-10 h-12 w-16 object-cover" alt="Open"></SecondaryButton>
                                        <SecondaryButton @click="zatrzymajbrame"><img src="storage/images/stop.png" class="z-10 h-12 w-16 object-cover" alt="Stop"></SecondaryButton>
                                        <SecondaryButton @click="zamknijbrame"><img src="storage/images/closegate.png" class="z-10 h-12 w-16 object-cover" alt="Close"></SecondaryButton>
                                        <div v-show="Animacja == true" class="self-center relative">
                                            <div class="absolute left-3 top-2.5">{{ tekstanimacji }}</div>
                                            <div class="w-10 h-10 rounded-full border-4 border-dashed border-purple-500 border-t-transparent animate-spin"></div>
                                        </div>
                                    </div>
                                    <div class="w-full self-center text-end lg:w-1/3 lg:pt-0 relative lg:static">
                                        <i title="Edytuj odbiornik" @click="edytujodbiornik(receiver.id)" class="fa-regular fa-pen-to-square fa-2x cursor-pointer absolute lg:static flex lg:block right-1 top-[-200px] "></i>
                                    </div>
                                </div>
                            </div>
                            <div v-for="transmitter in receiver.get_transmitters"
                                :key="transmitter.id">
                                <div class=" mb-3 mt-2 flex max-w-screen-xl transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 text-slate-800 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg dark:bg-slate-700 dark:bg-opacity-25 dark:text-slate-300 lg:flex-row lg:p-4 mx-auto"
                                    style="background: rgba(0, 0, 0, 0.2);">
                                    <div class="flex w-full flex-row lg:w-full items-center justify-center">
                                        <div class="relative flex flex-col">
                                            <div
                                                class="flex h-12 w-12 flex-shrink-0 flex-col justify-center rounded-full bg-slate-200 bg-opacity-50 dark:bg-slate-600">
                                                <img src="storage/images/czujnik.png"
                                                    class="z-10 h-12 w-12 rounded-full object-cover" alt="camera">

                                                <span v-if="transmitter.status_id == 1"
                                                    class="absolute right-0 top-0 z-20 flex h-3 w-3">
                                                    <span
                                                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-400 opacity-75"></span>
                                                    <span
                                                        class="relative inline-flex h-3 w-3 rounded-full bg-green-400"></span>
                                                </span>

                                                <span v-else-if="transmitter.status_id == 2"
                                                    class="absolute right-0 top-0 z-20 flex h-3 w-3">
                                                    <span
                                                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-400 opacity-75"></span>
                                                    <span
                                                        class="relative inline-flex h-3 w-3 rounded-full bg-red-400"></span>
                                                </span>

                                                <span v-else-if="transmitter.status_id == 3"
                                                    class="absolute right-0 top-0 z-20 flex h-3 w-3">
                                                    <span
                                                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-yellow-400 opacity-75"></span>
                                                    <span
                                                        class="relative inline-flex h-3 w-3 rounded-full bg-yellow-400"></span>
                                                </span>

                                                <span v-else-if="transmitter.status_id == 4"
                                                    class="absolute right-0 top-0 z-20 flex h-3 w-3">
                                                    <span
                                                        class="absolute inline-flex h-full w-full rounded-full bg-gray-400 opacity-75"></span>
                                                    <span
                                                        class="relative inline-flex h-3 w-3 rounded-full bg-gray-400"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-1/2 lg:ml-4 ml-1 self-center overflow-x-hidden">
                                            <div
                                                class="w-full truncate text-xl font-extrabold leading-5 tracking-tight">
                                                {{ transmitter.name }}
                                            </div>
                                            <div class="text-sm text-slate-500">{{__('devices.panel.types.transmitter')}} - {{transmitter.Date}}</div>
                                        </div>
                                        <div class="w-1/2 lg:ml-4 ml-1 overflow-x-hidden hidden lg:block">
                                            <div
                                                class="w-full truncate text-xl font-extrabold leading-5 tracking-tight">
                                                <div class="w-24">
                                                    <div
                                                        class="shadow w-1/2 rounded border-2 border-white flex my-1 relative">
                                                        <div
                                                            class="border-r-4 h-4 rounded-r absolute flex border-white ml-12 mt-1 z-10">
                                                        </div>
                                                        <div class="cursor-default text-xs font-bold leading-none flex items-center justify-center m-1 py-2 text-center text-white"
                                                        :class="[transmitter.batterypercentage >= 50 ? 'bg-green-600' : 'bg-red-500']" :style="{ width: transmitter.batterypercentage + '%'}">
                                                            <div v-if="transmitter.batterypercentage" class="absolute left-0 mx-2 text-white text-xs">{{ transmitter.batterypercentage }}%</div>
                                                            <div v-else class="absolute left-0 mx-2 text-white text-xs">n/a %</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="w-24">
                                                    <div
                                                        class="shadow w-1/2 rounded border-2 border-white flex my-1 relative">
                                                        <div
                                                            class="border-r-4 h-4 rounded-r absolute flex border-white ml-12 mt-1 z-10">
                                                        </div>
                                                        <div class="cursor-default bg-red-600 text-xs font-bold leading-none flex items-center justify-center m-1 py-2 text-center text-white"
                                                            style="width:10%;">
                                                            <div class="absolute left-0 mx-4 text-white text-sm"><svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path></svg></div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="w-full self-center align-center text-end lg:w-1/3 lg:pt-0">
                                        <i title="Pokaz szczegóły" @click="pokazczujnik(transmitter.id)" class="fa-regular fa-eye fa-2x cursor-pointer mr-2"></i>
                                        <i title="Edytuj nadajnik" @click="edytujczujnik(transmitter.id)" class="fa-regular fa-pen-to-square fa-2x cursor-pointer"></i>
                                        <i title="Dodaj do harmonogramu" @click="dodajdotable(transmitter.id)" class="ml-2 fa-solid fa-clipboard-list fa-2x cursor-pointer"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-if="receivers.length"
                        class="mb-1 flex w-full lg:w-1/2 max-w-screen-xl transform flex-col rounded-md bg-white bg-opacity-75 p-6 text-slate-800 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg dark:bg-slate-700 dark:bg-opacity-25 dark:text-slate-300 lg:p-4"
                        style="background: rgba(0,0,0,0.2);">
                        <div class="flex mb-2 mr-4 text-white">{{__('devices.legend.title')}}</div>
                        <div class="flex flex-row items-center">
                            <span class="relative inline-flex h-3 w-3 rounded-full bg-green-400 mr-2"></span>
                            <span class="text-white dark:text-white">{{__('devices.legend.green')}}</span>
                        </div>
                        <div class="flex flex-row items-center">
                            <span class="relative inline-flex h-3 w-3 rounded-full bg-yellow-400 mr-2"></span>
                            <span class="text-white dark:text-white">{{__('devices.legend.yellow')}}</span>
                        </div>
                        <div class="flex flex-row items-center">
                            <span class="relative inline-flex h-3 w-3 rounded-full bg-red-400 mr-2"></span>
                            <span class="text-white dark:text-white">{{__('devices.legend.red')}}</span>
                        </div>
                        <div class="flex flex-row items-center">
                            <span class="relative inline-flex h-3 w-3 rounded-full bg-gray-400 mr-2"></span>
                            <span class="text-white dark:text-white">{{__('devices.legend.gray')}}</span>
                        </div>
                    </div>

                </div>
                <div v-if="cameras.length"  class="w-full lg:w-1/2 mb-12">
                    <div v-for="camera in cameras" :key="camera.id"
                        class="mb-3 flex max-w-screen-xl transform cursor-pointer  flex-col rounded-md bg-white bg-opacity-75 p-6 text-slate-800 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg dark:bg-slate-700 dark:bg-opacity-25 dark:text-slate-300 lg:flex-row lg:p-4 mx-auto"
                        style="background: rgba(0,0,0,0.2);">
                        <div class="flex w-full flex-row lg:w-full">
                            <div class="relative flex flex-col">
                                <div
                                    class="flex h-12 w-12 flex-shrink-0 flex-col justify-center rounded-full bg-slate-200 bg-opacity-50 dark:bg-slate-600">
                                    <img src="storage/images/camera.png"
                                        class="z-10 h-12 w-12 rounded-full object-cover" alt="camera">

                                    <span v-if="camera.status_id == 1" class="absolute right-0 top-0 z-20 flex h-3 w-3">
                                        <span
                                            class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-400 opacity-75"></span>
                                        <span class="relative inline-flex h-3 w-3 rounded-full bg-green-400"></span>
                                    </span>

                                    <span v-else-if="camera.status_id == 2"
                                        class="absolute right-0 top-0 z-20 flex h-3 w-3">
                                        <span
                                            class="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-400 opacity-75"></span>
                                        <span class="relative inline-flex h-3 w-3 rounded-full bg-red-400"></span>
                                    </span>

                                    <span v-else-if="camera.status_id == 3"
                                        class="absolute right-0 top-0 z-20 flex h-3 w-3">
                                        <span
                                            class="absolute inline-flex h-full w-full animate-ping rounded-full bg-yellow-400 opacity-75"></span>
                                        <span class="relative inline-flex h-3 w-3 rounded-full bg-yellow-400"></span>
                                    </span>

                                    <span v-else-if="camera.status_id == 4"
                                        class="absolute right-0 top-0 z-20 flex h-3 w-3">
                                        <span
                                            class="absolute inline-flex h-full w-full rounded-full bg-gray-400 opacity-75"></span>
                                        <span class="relative inline-flex h-3 w-3 rounded-full bg-gray-400"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/2 lg:ml-4 ml-2 self-center overflow-x-hidden">
                                <div class="w-full truncate text-xl font-extrabold leading-5 tracking-tight">
                                    {{ camera.name }}
                                </div>
                                <div class="text-sm text-slate-500">{{__('devices.panel.types.camera')}}</div>
                            </div>
                            <div class="w-full self-center lg:w-1/3 lg:pt-0">
                                <div class="ml-1">
                                    <div class="text-xl font-extrabold leading-5 tracking-tight">{{__('devices.panel.addressport')}}</div>
                                    <div class="text-sm text-slate-500">{{ camera.source }}:{{ camera.port }}
                                    </div>
                                </div>
                            </div>
                            <div class="w-full self-center lg:w-1/3 lg:pt-0 hidden lg:block">
                                <div class="ml-1">
                                    <div class="text-xl font-extrabold leading-5 tracking-tight">{{__('devices.panel.protocol')}}</div>
                                    <div class="text-sm text-slate-500">{{ camera.get_protocol_name.name }}
                                    </div>
                                </div>
                            </div>
                            <div class="w-full self-center text-end lg:w-1/3 lg:pt-0">
                            <i @click="pokazkamere(camera.id)" class="fa-regular fa-eye fa-2x cursor-pointer mr-2"></i>
                            <i @click="edytujkamere(camera.id)" class="fa-regular fa-pen-to-square fa-2x cursor-pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="!receivers.length && !cameras.length"
                class="mb-3 flex w-full max-w-screen-xl transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 text-slate-800 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg dark:bg-slate-700 dark:bg-opacity-25 dark:text-slate-300 lg:flex-row lg:p-4 mx-auto"
                style="background: rgba(0,0,0,0.2);">
                <div class="flex w-full flex-row lg:w-3/12">
                    <div class="ml-4 self-center overflow-x-hidden">
                        <div class="w-full truncate text-xl font-extrabold leading-5 tracking-tight">{{__('devices.empty')}}</div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Components/Button.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { Inertia } from '@inertiajs/inertia'
export default {
    name: "Devices",
    components: {
        AppLayout,
        JetButton,
        SecondaryButton
    },
    props: ["cameras", "receivers"],
    data() {
        return {
            Status: null,
            Animacja: null,
            tekstanimacji: null,
            form: {
            },
        };
    },
    methods: {
        pokazkamere(id) {
            Inertia.get(route('camerainfo', {
                camera: id,
            }));
        },
        pokazczujnik(id) {
            Inertia.get(route('deviceinfo', {
                id: id,
            }));
        },
        edytujczujnik(id){
            Inertia.get(route('updatetransmitter', {
                id: id,
            }));
        },
        edytujodbiornik(id){
            Inertia.get(route('receiverupdate', {
                id: id,
            }));
        },
        edytujkamere(id){
            Inertia.get(route('cameraedit', {
                id: id,
            }));
        },
        dodajdotable(id){
            Inertia.get(route('timetableadd', {
                id: id,
            }));
        },
        otworzbrame(){
            Inertia.visit(route('bramachange', { id: 1 }), {
            preserveState: true,
            });
            this.Animacja = true;
            this.tekstanimacji = 'Otwieranie';
            setTimeout(() => {
                this.Animacja = false;
            }, 15000);
        },
        zatrzymajbrame(){
            Inertia.visit(route('bramachange', { id: 0 }), {
            preserveState: true,
            });
            this.Animacja = true;
            this.tekstanimacji = 'Zatrzymywanie';
            setTimeout(() => {
                this.Animacja = false;
            }, 2000);
        },
        zamknijbrame(){
            Inertia.visit(route('bramachange', { id: -1 }), {
            preserveState: true,
            });
            this.Animacja = true;
            this.tekstanimacji = 'Zamykanie';
            setTimeout(() => {
                this.Animacja = false;
            }, 15000);
        }
    },
    computed: {
        
    }
};
</script>