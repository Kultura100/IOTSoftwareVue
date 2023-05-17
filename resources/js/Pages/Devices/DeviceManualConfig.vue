
<template>
    <div class="flex flex-col items-center mx-auto rounded-md w-full lg:p-4 lg:w-1/3" style="background: rgba(0,0,0,0.2);">
        <h2 class="font-bold text-[#1a8eca] text-2xl mb-3">{{ __('dashboard.transmitterpanel.add.title')}}</h2>
        <form class="w-full max-w-lg mb-3">
            <div class="flex flex-wrap lg:-mx-3 mb-6 mx-2">
                <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                        {{ __('dashboard.transmitterpanel.add.fields.name')}}
                    </label>
                    <input v-model="form.name"
                        class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text">
                    <InputError class="mt-2" :message="$page.props.errors.name" />
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                        {{ __('dashboard.transmitterpanel.add.fields.transmitterId')}}
                    </label>
                    <input v-model="form.transmitterId"
                        class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text">
                    <InputError class="mt-2" :message="$page.props.errors.transmitterId" />
                </div>
            </div>
            <div class="flex flex-wrap lg:-mx-3 mb-6 mx-2">
                <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                        {{ __('dashboard.transmitterpanel.add.fields.receiver_id')}}
                    </label>
                    <select v-model="form.receiver_id" class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option selected>     {{ __('dashboard.transmitterpanel.add.fields.receiver')}}</option>
                    <option v-for="receiver in receivers" :value="receiver.id" :key="receiver.id">{{ receiver.name }}</option>
                </select>
                </div>
                <InputError class="mt-2 ml-3" :message="$page.props.errors.receiver_id" />
            </div>
        </form>
        <div>
            <JetButton @click="onSubmit">{{ __('dashboard.transmitterpanel.add.buttontitle')}}</JetButton>
        </div>
    </div>

</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Components/Button.vue";
import InputError from "@/Components/InputError.vue";
import { useForm } from '@inertiajs/inertia-vue3';
export default {
    name: "DeviceManualConfig",
    components: {
        AppLayout,
        JetButton,
        InputError,
    },
    props: ["receivers"],
    setup() {
        const form = useForm({
            name: null,
            transmitterId: null,
            receiver_id:null,
        })
    return { form }
    },
    methods: {
        onSubmit() {
            this.form.post('/deviceadd', {
                onSuccess: () => {
                    this.form.reset();
                    this.$emit("transmitterAdd");
                }
            })
        },
    },
};
</script>