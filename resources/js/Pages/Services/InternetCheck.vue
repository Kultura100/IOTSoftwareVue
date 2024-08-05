<template>
    <div>

        <div class="mb-3 flex w-full transform cursor-pointer flex-col rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto" style="background: rgba(0, 0, 0, 0.2);">
            <div class="flex w-full flex-row lg:w-full space-x-4">
                <div class="relative flex flex-col">
                    <div class="flex h-10 w-10 flex-shrink-0 flex-col justify-center items-center"><i class="fa-solid fa-globe fa-3x"></i></div>
                </div>
                <div class="w-full lg:w-1/2 lg:ml-4 ml-1 self-center overflow-x-hidden">
                    <div class="w-full text-lg font-bold leading-4 tracking-tight">Połączenie z internetem</div>
                    <div>
                        <div v-if="isChecking" class="text-sm text-green font-bold">Sprawdzanie</div>
                        <div v-else class="flex items-center gap-1" :class="isConnected ? 'fa-solid fa-circle-check text-green-500 ml-1 text-lg' : 'fa-solid fa-xmark text-red-500'">
                            <div v-if="isConnected" class="text-sm font-sans">Masz dostęp do internetu!</div>
                            <div v-else class="text-sm font-sans">Brak połączenia z internetem!</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isConnected: false,
            isChecking: true,
            intervalId: null,
        };
    },
    methods: {
        async checkInternetConnection() {
            try {
                // Użycie trybu no-cors
                const response = await fetch('https://www.google.com', { method: 'HEAD', mode: 'no-cors' });
                // Tryb no-cors nie pozwala na sprawdzenie statusu odpowiedzi, więc zakładamy, że jest OK
                this.isConnected = true;
            } catch (error) {
                this.isConnected = false;
            } finally {
                this.isChecking = false;
            }
        },
    },
    mounted() {
        this.checkInternetConnection();
        this.intervalId = setInterval(this.checkInternetConnection, 10000);
    },
    beforeUnmount() {
        if (this.intervalId) {
            clearInterval(this.intervalId);
            this.intervalId = null;
        }
    }
};
</script>

<style scoped>
p {
    font-size: 1.2em;
}
</style>
