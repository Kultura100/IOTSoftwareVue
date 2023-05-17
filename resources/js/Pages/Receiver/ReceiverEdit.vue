<template>
    <AppLayout :title="__('dashboard.receiverpanel.edit.routename')">
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{__('dashboard.receiverpanel.edit.routename')}}
            </h2>
        </template>

    <div class="flex flex-col items-center mx-auto rounded-md w-full lg:p-4 lg:w-1/3 mt-2" style="background: rgba(0,0,0,0.2);">
        <h2 class="font-bold text-[#1a8eca] text-2xl mb-3">{{__('dashboard.receiverpanel.edit.title')}}</h2>
        <form class="w-full max-w-lg mb-3">
            <div class="flex flex-wrap lg:-mx-3 mb-6 mx-2">
                <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                        {{__('dashboard.receiverpanel.add.fields.name')}}
                    </label>
                    <input v-model="form.name"
                        class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text">
                    <InputError class="mt-2" :message="$page.props.errors.name" />
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                        {{__('dashboard.receiverpanel.add.fields.receiverId')}}
                    </label>
                    <input v-model="form.receiverId"
                        class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        type="text">
                    <InputError class="mt-2" :message="$page.props.errors.receiverId" />
                </div>
            </div>
        </form>
        <div>
            <JetButton @click="onSubmit">{{__('dashboard.receiverpanel.edit.buttontitle')}}</JetButton>
        </div>
    </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Components/Button.vue";
import InputError from "@/Components/InputError.vue";
import { useForm } from '@inertiajs/inertia-vue3';
export default {
    name: "ReceiverAdd",
    components: {
        AppLayout,
        JetButton,
        InputError,
    },
    props: ["receiver"],
    setup() {
        const form = useForm({
            name: null,
            receiverId: null,
            id: null,
        })
    return { form }
    },
    mounted(){
        this.form.name = this.receiver.name;
        this.form.receiverId = this.receiver.receiverId;
        this.form.id = this.receiver.id;
    },
    methods: {
        onSubmit() {
            this.form.post('/receiverupdate', {
                onSuccess: () => {
                    this.form.reset();
                    this.$emit("receiverAdd");
                }
            })
        },
    },
};
</script>