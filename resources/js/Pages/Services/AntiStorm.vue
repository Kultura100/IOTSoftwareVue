<template>
    <div class="mb-3 flex w-full transform cursor-pointer flex-row rounded-md bg-white bg-opacity-75 p-6 transition duration-500 ease-in-out hover:-translate-y-1 hover:shadow-lg text-slate-300 lg:flex-row lg:p-4 mx-auto" style="background: rgba(0, 0, 0, 0.2);">
        <div v-for="(id, index) in ids " :key="id" class="flex w-full flex-row space-x-4 pr-4">
            <div class="relative flex flex-col">
                <div class="flex h-10 w-10 flex-shrink-0 flex-col justify-center items-center">
                    <i class="fa-solid fa-cloud-bolt fa-3x"></i>
                </div>
            </div>
            <div class="w-full lg:ml-4 ml-1">
                <div class="w-full truncate text-xl font-bold leading-6 tracking-tight">{{ weatherData[id]?.m || 'Ładowanie...' }}
                    <div v-if="weatherData[id]?.a_b == 'Tak'" title="Alarm burzowy aktywny" class="ml-1 fa-solid text-2xl  fa-cloud-rain text-blue-500 animate-pulse"></div>
                    <div v-if="weatherData[id]?.a_o == 'Tak'" title="Alarm opadowy aktywny" class="ml-1 fa-solid text-2xl fa-bolt text-yellow-500 animate-pulse"></div>
                </div>
                <div class="flex flex-col lg:flex-row lg:space-x-2 mt-2">
                    <div class="text-lg">
                        <div>
                            <div class="text-lg text-red-500 font-bold" v-if="weatherData[id]?.s">
                                <i class="fa-solid fa-bolt"></i> Burza aktywna!
                            </div>
                            <div class="text-lg text-green-500 font-bold" v-else>
                                <i class="fa-solid fa-circle-check"></i> Brak aktywnej burzy
                            </div>
                        </div>
                        <p><i class="fa-solid fa-percent"></i> Prawd. burzy: {{ weatherData[id]?.p_b }}</p>
                        <p><i class="fa-solid fa-droplet"></i> Prawd. opadów: {{ weatherData[id]?.p_o }}</p>
                        <p><i class="fa-solid fa-clock"></i> Czas do burzy: {{ weatherData[id]?.t_b == 255 ? "nieznane nadejście." : weatherData[id]?.t_b + " minut" }}</p>
                        <p><i class="fa-solid fa-clock"></i> Czas do opadów: {{ weatherData[id]?.t_o == 255 ? "nieznane nadejście." : weatherData[id]?.t_o + " minut" }}</p>
                    </div>
                    <div v-if="stationData[stations[index]]" class="text-lg">
                        <p><i class="fa-solid fa-thermometer-half"></i> Temperatura: {{ stationData[stations[index]].temperatura }} °C</p>
                        <p><i class="fa-solid fa-compass"></i> Kierunek i prędkość wiatru: {{ stationData[stations[index]].kierunek_wiatru }}°, {{ stationData[stations[index]].predkosc_wiatru }} km/h.</p>
                        <p><i class="fa-solid fa-water"></i> Wilgotność względna: {{ stationData[stations[index]].wilgotnosc_wzgledna }} %</p>
                        <p><i class="fa-solid fa-cloud-rain"></i> Suma opadu: {{ stationData[stations[index]].suma_opadu }} mm</p>
                        <p><i class="fa-solid fa-tachometer-alt"></i> Ciśnienie: {{ stationData[stations[index]].cisnienie }} hPa</p>
                        <p><i class="fa-solid fa-calendar-day"></i> Data pomiaru: {{ stationData[stations[index]].data_pomiaru }}, godzina: {{ stationData[stations[index]].godzina_pomiaru }}</p>
                    </div>
                </div>
            </div>
            <div v-if="ids.length - 1 > index" class="h-full self-center border-r-2"></div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            ids: [116, 314],
            stations: ['kalisz', 'sieradz'],
            weatherData: {},
            stationData: {}
        };
    },
    mounted() {
        this.ids.forEach((id, index) => {
            this.fetchWeatherData(id);
            this.fetchStationData(this.stations[index]);
        });
    },
    methods: {
        async fetchWeatherData(id) {
            try {
                const response = await fetch(`http://antistorm.eu/webservice.php?id=${id}`);
                const data = await response.json();
                this.weatherData = { ...this.weatherData, [id]: data };
            } catch (error) {
                console.error('Błąd podczas pobierania danych:', error);
            }
        },
        async fetchStationData(station) {
            try {
                const response = await fetch(`https://danepubliczne.imgw.pl/api/data/synop/station/${station}`);

                const data = await response.json();
                if (data.status == undefined) {
                    this.stationData = { ...this.stationData, [station]: data };
                }

            } catch (error) {
                console.error('Błąd podczas pobierania danych stacji:', error);
            }
        }
    }
};
</script>

<style scoped>
/* Dodaj wszelkie dodatkowe style, jeśli są potrzebne */
</style>
