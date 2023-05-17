<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import DeviceAdd from './Devices/DeviceAdd.vue'
    import { Inertia } from '@inertiajs/inertia'
    export default {
    name: "Dashboard",
    components: {
        AppLayout,
       DeviceAdd,
    },
    props: ["data","types","protocols","receiver","receivers"],
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
        </AppLayout>
    </template>
    