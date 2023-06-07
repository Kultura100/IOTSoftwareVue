
<template>
    <div class="flex flex-col items-center mx-2 lg:mx-auto rounded-md w-full lg:p-4 lg:w-1/3" style="background: rgba(0,0,0,0.2);">
        <h2 class="font-bold text-[#1a8eca] text-2xl mb-3">{{__("dashboard.camerapanel.add.title")}}</h2>
        <form class="w-full max-w-lg mb-3">
            <div class="flex flex-wrap lg:-mx-3 mb-6 mx-2">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                        {{__('dashboard.camerapanel.add.fields.name')}}
                    </label>
                    <input v-model="form.name"
                        class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text">
                    <InputError class="mt-2" :message="$page.props.errors.name" />
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                        {{__('dashboard.camerapanel.add.fields.source')}}
                    </label>
                    <input v-model="form.source"
                        class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text">
                    <InputError class="mt-2" :message="$page.props.errors.source" />
                </div>
            </div>
            <div class="flex flex-wrap lg:-mx-3 mb-6 mx-2">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                        {{__('dashboard.camerapanel.add.fields.login')}}
                    </label>
                    <input v-model="form.login"
                        class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text">
                    <InputError class="mt-2" :message="$page.props.errors.login" />
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                        {{__('dashboard.camerapanel.add.fields.password')}}
                    </label>
                    <input v-model="form.password"
                        class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="password">
                    <InputError class="mt-2" :message="$page.props.errors.password" />
                </div>
            </div>
            <div class="flex flex-wrap lg:-mx-3 mb-6 mx-2">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2  text-left">
                        {{__('dashboard.camerapanel.add.fields.protocol_id')}}
                    </label>
                    <select v-model="form.protocol_id" class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option selected>{{__('dashboard.camerapanel.add.fields.prot')}}</option>
                    <option v-for="protocol in protocols" :value="protocol.id" :key="protocol.id">{{ protocol.name }}</option>
                </select>
                    <InputError class="mt-2" :message="$page.props.errors.password" />
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                        {{__('dashboard.camerapanel.add.fields.port')}}
                    </label>
                    <input v-model="form.port"
                        class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text">
                    <InputError class="mt-2" :message="$page.props.errors.port" />
                </div>
            </div>
        </form>
        <div>
            <JetButton class="mb-2" @click="onSubmit">{{__('dashboard.camerapanel.add.buttontitle')}}</JetButton>
        </div>
    </div>

</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Components/Button.vue";
import InputError from "@/Components/InputError.vue";
import { useForm } from '@inertiajs/inertia-vue3';
export default {
    name: "CameraAdd",
    components: {
        AppLayout,
        JetButton,
        InputError,
    },
    props: ["protocols"],
    setup() {
        const form = useForm({
            name: null,
            port: null,
            login: null,
            password: null,
            source: null,
            protocol_id: null,
        })
    return { form }
    },
    methods: {
        onSubmit() {
            this.form.post('/cameraadd', {
                onSuccess: () => {
                    this.form.reset();
                    this.$emit("cameraAdd");
                }
            })
        },
    },
};
</script>