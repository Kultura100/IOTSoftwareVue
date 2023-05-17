
<template>

    <div class="py-4 lg:py-16">
        <div v-if="active" class="container m-auto px-6 text-gray-500 md:px-12 xl:px-0">
            <div class="mx-auto grid gap-6 md:w-3/4 lg:w-full lg:grid-cols-2">
                <div v-if='isReceiver == null ' @click="showreceiver()" class="select-none bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8 cursor-pointer transition duration-500 ease-in-out hover:-translate-y-1 hover:animate-0"
                    style="background-image: url('/storage/images/tlo.jpg')">
                    <div class="mb-12 space-y-4">
                        <h3 class="text-2xl font-semibold text-purple-900">{{ __('dashboard.receiverpanel.title')}}</h3>
                        <p class="mb-6">
                            {{ __('dashboard.receiverpanel.description')}}
                        </p>
                    </div>
                    <img :src="'/storage/images/czujniktlo.png'" class="object-cover w-2/3 ml-auto -mb-15"
                        alt="Ilustracja autorstwa vectorjuice na Freepik">
                </div>
                <div v-else @click="showsensor()"
                    class="select-none bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8 cursor-pointer transition duration-500 ease-in-out hover:-translate-y-1 hover:animate-0"
                    style="background-image: url('/storage/images/tlo.jpg')">
                    <div class="mb-12 space-y-4">
                        <h3 class="text-2xl font-semibold text-purple-900">{{ __('dashboard.transmitterpanel.title')}}</h3>
                        <p class="mb-6">{{ __('dashboard.transmitterpanel.description')}}</p>
                    </div>
                    <img :src="'/storage/images/czujniktlo.png'" class="object-cover w-2/3 ml-auto -mb-15"
                        alt="Ilustracja autorstwa vectorjuice na Freepik">
                </div>

                <div @click="showcamera()"
                    class="select-none bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8 cursor-pointer  transition duration-500 ease-in-out hover:-translate-y-1"
                    style="background-image: url('/storage/images/tlo.jpg')">
                    <div class="mb-12 space-y-4">
                        <h3 class="text-2xl font-semibold text-purple-900">{{ __('dashboard.camerapanel.title')}}</h3>
                        <p class="mb-6">{{ __('dashboard.transmitterpanel.description')}}
                        </p>
                        <div class="w-full mx-auto">
                            <div class="flex p-5 rounded-lg shadow bg-white">
                                <div>
                                    <svg class="w-6 h-6 fill-current text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path
                                            d="M12 5.99L19.53 19H4.47L12 5.99M12 2L1 21h22L12 2zm1 14h-2v2h2v-2zm0-6h-2v4h2v-4z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h2 class="font-semibold text-gray-800">{{ __('dashboard.camerapanel.info.title')}}</h2>
                                    <p class="mt-2 text-sm text-gray-600 leading-relaxed">{{ __('dashboard.camerapanel.info.description1')}}<span class="font-bold">{{ __('dashboard.camerapanel.info.description2')}}</span>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img :src="'/storage/images/kameratlo.png'" class="pt-10 w-2/3 ml-auto" alt="kameratlo">
                </div>
            </div>
        </div>
        <div v-else>
            <ReceiverAddVue @receiver-add="hidereceiver()" v-if="receiver"></ReceiverAddVue>
            <DeviceManualConfig @transmitter-add="hidesensor()" v-else-if="transmitter" :receivers="receivers"></DeviceManualConfig>
            <CameraAdd @camera-add="hidecamera()" v-else-if="camera" :protocols="protocols"></CameraAdd>
        </div>
    </div>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Components/Button.vue";
import Devices from '@/Pages/Devices/Devices.vue';
import DeviceManualConfig from "./DeviceManualConfig.vue";
import ReceiverAddVue from "../Receiver/ReceiverAdd.vue";
import CameraAdd from "../Camera/CameraAdd.vue";
export default {
    name: "DeviceAdd",
    components: {
        AppLayout,
        JetButton,
        Devices,
        DeviceManualConfig,
        ReceiverAddVue,
        CameraAdd
    },
    props: ["data", "types", "protocols","isReceiver","receivers"],
    mounted() {
    },
    data() {
        return {
            form: {
                state: true,
            },
            active: true,
            receiver: false,
            camera: false,
            transmitter: false,
        };
    },
    methods: {
        showreceiver(){
            this.active = false;
            this.receiver = true;
        },
        hidereceiver(){
            this.active = true;
            this.receiver = false;
        },
        showsensor() {
            this.active = false;
            this.transmitter = true;
        },
        hidesensor() {
            this.active = true;
            this.transmitter = false;
        },
        showcamera() {
            this.active = false;
            this.camera = true;
        },
        hidecamera(){
            this.active = true;
            this.camera = false;
        },
        show() {
            this.form.state = !this.form.state;
        },
    },
};
</script>