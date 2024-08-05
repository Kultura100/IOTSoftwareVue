<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">Real-time Data-Device</h1>
        <div v-if="loading" class="text-gray-500">Loading...</div>
        <div v-else>
            <div v-for="dataItem in dataList" :key="dataItem.key" class="mb-4">
                <p class="font-bold">{{ dataItem.name }}</p>
                <p>{{ dataItem.value }} {{ dataItem.unit }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { Inertia } from '@inertiajs/inertia'
export default {
    data() {
        return {
            loading: true,
            dataList: []
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            let instance = axios.create();

            // delete headers if existing
            delete instance.defaults.headers.common['Accept'];
            delete instance.defaults.headers.common['X-Requested-With'];
            delete instance.defaults.headers.common['X-CSRF-TOKEN'];

            instance.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
            instance.defaults.headers.common['Access-Control-Allow-Methods'] = 'GET, POST, PATCH, PUT, DELETE, OPTIONS';
            instance.defaults.headers.common['Access-Control-Allow-Headers'] = 'Origin, Content-Type, X-Auth-Token';
            instance.post('https://api.solarmanpv.com/account/v1.0/token?appId=2023050944391482/', {
                params: {
                    appSecret: '30a53fa6092b5c1776c675aa2bd975ff',
                    password: 'e342850d3eb61bb584d8bcbdd27fb4d72ae2088ab432afd9f4798e0a818be78c',
                    username: 'andrzej51322@gmail.com'
                }
            })
                .then(response => {
                    //console.log(response.data);
                })
                .catch(error => {
                });
        }
    }
};
</script>

<style>
/* Dodaj tu style Tailwind CSS, jeśli są potrzebne */
</style>
