<template>
    <AppLayout title="Camera">
        <div class="px-2 py-2 mb-24">
            <!-- <button @click="toggleFullscreen">fullscreen</button> -->
            <div v-if="!camera.length" class="mb-3 flex w-full max-w-screen-xl transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 text-slate-800 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg dark:bg-slate-700 dark:bg-opacity-25 dark:text-slate-300 lg:flex-row lg:p-4 mx-auto" style="background: rgba(0,0,0,0.2);">
                <div class="flex w-full flex-row lg:w-3/12">
                    <div class="ml-4 self-center overflow-x-hidden">
                        <div class="w-full truncate text-xl font-extrabold leading-5 tracking-tight">{{
                __('dashboard.camerapanel.empty') }}</div>
                    </div>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 sm:grid-rows-2 gap-1 grid-cols-1 grid-rows-4">
                <div v-for="(cam, index) in camera" :key="cam.id" class="px-2 pt-2 lg:pt-1 lg:pb-1 lg:w-full bg-opacity-75 rounded-md text-slate-800 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg lg:p-1" style="background: rgba(0,0,0,0.2);">
                    <div class="flex flex-wrap flex-col">
                        <div class="flex-1 w-full h-full" v-if="cam.protocol_id == 1">
                            <div v-show="cameras[index].isLoaded" class="flex justify-center items-center sm:h-[31.5rem] h-96 bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700">
                                <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 384 512">
                                    <path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z" />
                                </svg>
                            </div>
                            <object @load="Img(index)" class="h-[200px] lg:h-full lg:w-full mx-auto rounded-md" :data="cam.get_protocol_name.name + '://' + cam.source + ':' + cam.port + '/videostream.cgi?user=' + cam.login + '&amp;pwd=' + cam.password" type="image/jpeg" ref="object"></object>
                        </div>
                        <div v-else class="flex w-full h-[32rem] overflow-hidden">
                            <div v-show="cameras[index].isLoaded" class="flex justify-center items-center w-full  bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700">
                                <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 384 512">
                                    <path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z" />
                                </svg>
                            </div>
                            <canvas ref="canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/YHcVnzWe-vM" title="Transmisja na żywo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/Components/Button.vue";
import { loadPlayer } from 'rtsp-relay/browser';
import screenfull from "screenfull";
export default {
    mounted() {
        var test = this.camera.filter((item) => item.protocol_id == 2);
        var licznik = 0;
        test.forEach(element => {
            const player = loadPlayer({
                url: 'ws://localhost:2000/api/stream/' + test[licznik].login + ":" + test[licznik].password + "@" + test[licznik].source + ":" + test[licznik].port,
                canvas: this.$refs.canvas[licznik],
            });
            if (player.catch(() => { }).then(() => {
                var ktory = [];
                this.camera.map(function (value, key) {
                    if (value.protocol_id == 2)
                        ktory.push(key);
                });
                for (let index = 0; index < licznik; index++) {
                    this.cameras[ktory[index]].isLoaded = false;
                }
            }));
            licznik++;
        });

    },
    name: "Camera",
    components: {
        AppLayout,
        JetButton,
    },
    props: ["camera"],
    data() {
        return {
            cameras: [
                { id: 0, isLoaded: true },
                { id: 1, isLoaded: true },
                { id: 2, isLoaded: true },
                { id: 3, isLoaded: true },
            ]
        };
    },
    methods: {
        toggleFullscreen() {
            const objectElement = this.$refs.object[0];

            if (screenfull.isEnabled) {
                screenfull.toggle(objectElement);
            }

            if (screenfull.isFullscreen) {
                objectElement.width = window.innerWidth;
                objectElement.height = window.innerHeight;
            } else {
                objectElement.width = null;
                objectElement.height = null;
            }
        },
        Img(id) {
            this.cameras[id].isLoaded = false;
        }
    },
};
</script>