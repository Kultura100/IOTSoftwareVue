
<template>
    <div v-if="info" class="w-full truncate text-lg text-[#1a8eca] font-bold leading-6 tracking-tight text-center">
        {{ __('dashboard.receiverpanel.add.tutorial.title')}}
    </div>
    <ReceiverHelperVue v-if="info"></ReceiverHelperVue>
    <div v-else class="flex flex-col items-center mx-auto rounded-md w-full lg:p-4 lg lg:w-1/3"
        style="background: rgba(0,0,0,0.2);">
        <h2 class="font-bold text-[#1a8eca] text-2xl mb-3">{{ __('dashboard.receiverpanel.add.title')}}</h2>
        <form class="w-full max-w-lg mb-3">
            <div class="flex flex-wrap lg:-mx-3 mb-6 mx-2">
                <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                        {{ __('dashboard.receiverpanel.add.fields.name')}}
                    </label>
                    <input v-model="form.name"
                        class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text">
                    <InputError class="mt-2" :message="$page.props.errors.name" />
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                        {{ __('dashboard.receiverpanel.add.fields.receiverId')}}
                    </label>
                    <input v-model="form.receiverId"
                        class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text">
                    <InputError class="mt-2" :message="$page.props.errors.receiverId" />
                </div>
            </div>
        </form>
        <div>
            <JetButton @click="onSubmit">{{ __('dashboard.receiverpanel.add.buttontitle')}}</JetButton>
        </div>
    </div>
    <div v-if="info" class="flex flex-row lg:flex-row justify-center">
        <JetButton @click="changestate()">{{ __('dashboard.receiverpanel.add.next')}}</JetButton>
    </div>

</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Components/Button.vue";
import InputError from "@/Components/InputError.vue";
import { useForm } from '@inertiajs/inertia-vue3';
import ReceiverHelperVue from "../Receiver/ReceiverHelper.vue";
export default {
    name: "ReceiverAdd",
    emits: ["receiverAdd"],
    components: {
        AppLayout,
        JetButton,
        InputError,
        ReceiverHelperVue,
    },
    data(){
        return {
            info: true,
        }
    },
    setup() {
        const form = useForm({
            name: null,
            receiverId: null,
        })
        return {
            form
        }
    },
    methods: {
        onSubmit() {
            this.form.post('/receiveradd', {
                onSuccess: () => {
                    this.form.reset();
                    this.$emit("receiverAdd");
                }
            })
        },
        changestate(){
            console.log("test");
            this.info =! this.info;
        },
    },
};
</script>