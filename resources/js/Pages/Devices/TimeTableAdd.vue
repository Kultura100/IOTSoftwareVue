<template>
    <AppLayout :title="__('tasktable.routename')">
        <template #header>
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{__('tasktable.routename')}}
            </h2>
        </template>

        <div class="flex flex-col mt-2 items-center mx-auto rounded-md w-full lg:p-4 lg:w-1/3"
            style="background: rgba(0,0,0,0.2);">
            <h2 class="font-bold text-[#1a8eca] text-2xl mb-5">{{__('tasktable.add.title')}}</h2>
            <form class="w-full max-w-lg mb-3">
                <div class="flex flex-wrap lg:-mx-3 mb-6 mx-2">
                    <div class="w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                            {{__('tasktable.add.fields.type')}}
                        </label>
                        <select v-model="form.type"
                            class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="temperature">{{__('tasktable.add.fields.options.temperature')}}</option>
                            <option value="humidity">{{__('tasktable.add.fields.options.humidity')}}</option>
                            <option value="alldata">{{__('tasktable.add.fields.options.alldata')}}</option>
                        </select>
                        <InputError class="mt-2 ml-3" :message="$page.props.errors.type" />
                    </div>
                    <div class="w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                            {{__('tasktable.add.fields.frequency_function')}}
                        </label>
                        <select v-model="form.frequency_function" @change="resetdaymonth()"
                            class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="everyThirtyMinutes">{{__('tasktable.add.fields.options.everyThirtyMinutes')}}</option>
                            <option value="hourly">{{__('tasktable.add.fields.options.hourly')}}</option>
                            <option value="everySixHours">{{__('tasktable.add.fields.options.everySixHours')}}</option>
                            <option value="daily">{{__('tasktable.add.fields.options.daily')}}</option>
                            <option value="weekly">{{__('tasktable.add.fields.options.weekly')}}</option>
                            <option value="monthly">{{__('tasktable.add.fields.options.monthly')}}</option>
                            <option value="weeklyOn">{{__('tasktable.add.fields.options.weeklyOn')}}</option>
                            <option value="monthlyOn">{{__('tasktable.add.fields.options.monthlyOn')}}</option>
                        </select>
                        <InputError class="mt-2 ml-3" :message="$page.props.errors.frequency_function" />
                    </div>
                    <div v-show="form.frequency_function == 'weeklyOn' || form.frequency_function == 'monthlyOn' " class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label v-if="form.frequency_function == 'weeklyOn'" class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                            {{__('tasktable.add.fields.options.day')}}
                        </label>
                        <label v-else class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                            {{__('tasktable.add.fields.options.dayofmonth')}}
                        </label>
                        <select v-if="form.frequency_function == 'weeklyOn'" v-model="form.day"
                            class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="1">{{__('tasktable.add.fields.options.monday')}}</option>
                            <option value="2">{{__('tasktable.add.fields.options.tuesday')}}</option>
                            <option value="3">{{__('tasktable.add.fields.options.wednesday')}}</option>
                            <option value="4">{{__('tasktable.add.fields.options.thurdsay')}}</option>
                            <option value="5">{{__('tasktable.add.fields.options.friday')}}</option>
                            <option value="6">{{__('tasktable.add.fields.options.saturday')}}</option>
                            <option value="7">{{__('tasktable.add.fields.options.sunday')}}</option>
                        </select>
                        <select v-else v-model="form.month"
                            class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option v-for="index in actualmonth" :key="index" :value="index">{{ index }}</option>
                        </select>
                        <InputError v-if="form.frequency_function == 'weeklyOn'" class="mt-2 ml-3" :message="$page.props.errors.day" />
                        <InputError v-else class="mt-2 ml-3" :message="$page.props.errors.month" />
                    </div>
                    <div v-show="form.frequency_function == 'weeklyOn' || form.frequency_function == 'monthlyOn'" class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                            {{__('tasktable.add.fields.options.hour')}}
                        </label>
                        <input v-model="form.time"
                            class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="time">
                        <InputError class="mt-2" :message="$page.props.errors.time" />
                    </div>
                    <div class="w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-[#1a8eca] text-xs font-bold mb-2 text-left">
                            {{__('tasktable.add.fields.device_id')}}
                        </label>
                        <select v-model="form.device_id"
                            class="appearance-none block w-full bg-gray-200 text-[#1a8eca] border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option v-if="actualtransmitter" v-for="item in transmitters" :selected="actualtransmitter.id == item.id" :key="item.id" :value="item.id">{{ item.name }}</option>
                            <option v-else v-for="item in transmitters" :key="item" :value="item.id">{{ item.name }}</option>
                        </select>
                        <InputError class="mt-2 ml-3" :message="$page.props.errors.device_id" />
                    </div>
                </div>
            </form>
            <div>
                <JetButton class="mb-2" @click="onSubmit">{{__('tasktable.add.buttontitle')}}</JetButton>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Components/Button.vue";
import InputError from "@/Components/InputError.vue";
import { useForm } from '@inertiajs/inertia-vue3';
import { isSet } from "@vue/shared";
export default {
    name: "HarmonogramAdd",
    components: {
        AppLayout,
        JetButton,
        InputError,
    },
    props: ["actualmonth","transmitters","actualtransmitter"],
    setup() {
        const form = useForm({
            type: null,
            device_id: null,
            frequency_function: null,
            day: null,
            time: null,
            month: null,
        })
        return { form }
    },
    mounted(){
        if(this.actualtransmitter)
        {
        this.form.device_id = this.actualtransmitter.id;
        }
    },
    methods: {
        onSubmit() {
            this.form.post('/timetables', {
                onSuccess: () => {
                    this.form.reset();
                }
            })
        },
        resetdaymonth(){
            this.form.day = null;
            this.form.month = null;
            this.form.day = null;
        },
    },
};
</script>