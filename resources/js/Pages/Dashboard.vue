<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import DeviceAdd from './Devices/DeviceAdd.vue'
import InternetCheck from './Services/InternetCheck.vue';
import AntiStorm from './Services/AntiStorm.vue';
export default {
    name: "Dashboard",
    components: {
        AppLayout,
        DeviceAdd,
        InternetCheck,
        AntiStorm
    },
    props: ["data", "types", "protocols", "receiver", "receivers"],
    data() {
        return {
            form: {
                state: true,
            },
        };
    },
    methods: {
    },
};
</script>

<template>
    <AppLayout :title="__('dashboard.routename')">
        <DeviceAdd :receivers="receivers" :isReceiver="receiver" :types="types" :data="data" :protocols="protocols" />
        <div class="flex flex-col gap-2 ml-2 mr-2 lg:flex-row">
            <div class="w-full">
                <InternetCheck></InternetCheck>
                <AntiStorm></AntiStorm>
            </div>
        </div>
    </AppLayout>
</template>