<template>
    <div v-if="this.weatherData">
        <div class="w-full max-w-screen-sm bg-[#333c49] p-10 rounded-xl ring-8 text-white ring-white ring-opacity-40">
            <div class="flex justify-between">
                <div class="flex flex-col">
                    <span class="text-6xl font-bold">{{ CutValue(this.weatherData.list[0].main.temp) }}℃</span>
                    <span class="font-semibold mt-1 text-gray-500">{{ this.weatherData.city.name }}, {{
                        this.weatherData.city.country }}</span>
                </div>
                <WeatherIcon class="w-24 h-24" :icon="this.weatherData.list[0].weather[0].icon"></WeatherIcon>
            </div>
            <div class="flex justify-between mt-12">
                <div v-for="data in getFirstDay()" class="flex flex-col items-center">
                    <span class="font-semibold text-lg">{{ CutValue(data.main.temp) }}℃</span>
                    <WeatherIcon class="w-12 h-12" :icon="data.weather[0].icon"></WeatherIcon>
                    <span class="font-semibold mt-1 text-sm">{{ ConvertTime(data.dt) }}</span>
                </div>
            </div>
        </div>
        <div
            class="flex flex-col space-y-6 w-full max-w-screen-sm bg-[#333c49] p-10 mt-10 rounded-xl text-white ring-8 ring-white ring-opacity-40">
            <div v-for="data in getSliceArray()" class="flex justify-between items-center">
                <span class="font-semibold text-lg w-1/4">{{ ConvertDate(data.dt) }}</span>
                <div class="flex items-center justify-end w-1/4 pr-10">
                    <span class="font-semibold">{{ CutValue(data.main.avg_humidity) }}%</span>
                    <!-- hum,idity -->
                    
                </div>
                <WeatherIcon class="w-12 h-12" :icon="data.weather[0].icon"></WeatherIcon>
                <span class="font-semibold text-lg w-1/4 text-right">{{ CutValue(data.main.max_temp) }}° / {{ CutValue(data.main.min_temp)}}°</span>
            </div>
        </div>
    </div>
    <!-- Component End  -->
</template>

<script>
import WeatherIcon from "../Weather/WeatherIcon.vue";
import axios from 'axios';
export default {
    data() {
        return {
            location: 'Błaszki',
            lat: 51.7045247,
            lon: 18.5273837,
            weatherData: null,
            loading: true,
            error: null
        };
    },
    components: {
        WeatherIcon,
        WeatherIcon
    },
    mounted() {
        //console.log(this.$page.props.captcha_key);

        this.fetchWeatherData();
    },
    methods: {
        fetchWeatherData() {
            let instance = axios.create();

            // delete headers if existing
            delete instance.defaults.headers.common['Accept'];
            delete instance.defaults.headers.common['X-Requested-With'];
            delete instance.defaults.headers.common['X-CSRF-TOKEN'];
            instance.get('https://api.openweathermap.org/data/2.5/forecast', {
                params: {
                    lat: this.lat,
                    lon: this.lon,
                    appid: this.$page.props.weather_api,
                    units: 'metric',
                    lang: 'pl',

                }
            })
                .then(response => {
                    //console.log(response.data);
                    this.weatherData = response.data;
                    this.loading = false;
                })
                .catch(error => {
                    this.error = 'Failed to fetch weather data.';
                    this.loading = false;
                });
        },
        CutValue(number) {
            return Math.trunc(number);
        },
        ConvertTime(time) {
            var date = new Date(time * 1000);
            var options = {
                hour: '2-digit',
                minute: 'numeric',
                second: undefined,
                hour12: false,
                timeZone: 'Europe/Warsaw',
                locale: 'pl-PL'
            };
            return date.toLocaleString('pl-PL', options);
        },
        ConvertDate(time) {
            var date = new Date(time * 1000);
            var options = {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: undefined,
                timeZone: 'Europe/Warsaw',
                locale: 'pl-PL'
            };

            return date.toLocaleDateString('pl-PL', options);
        },
        getFirstDay() {
            return this.weatherData.list.slice(0, 5);
        },

        getSliceArray() {
            const uniqueDates = new Set(); // Zbiór dla unikalnych dat

            // Przejście po wszystkich elementach i znalezienie unikalnych dat
            for (const element of this.weatherData.list) {
                const dt_txt = element.dt_txt; // Pobranie dt_txt
                const date = dt_txt.split(' ')[0]; // Pobranie samej daty

                uniqueDates.add(date);
            }

            const slicedArray = [];

            // Przetwarzanie unikalnych dat
            let isFirstUniqueDate = true; // Flaga określająca, czy to jest pierwsza unikalna data
            for (const date of uniqueDates) {
                // Pomijanie pierwszej unikalnej daty
                if (isFirstUniqueDate) {
                    isFirstUniqueDate = false;
                    continue;
                }

                const tempArray = []; // Tablica do przechowywania temperatur dla danej daty
                const humidityArray = []; // Tablica do przechowywania wilgotności dla danej daty

                // Znalezienie elementów odpowiadających danej dacie
                for (const element of this.weatherData.list) {
                    const dt_txt = element.dt_txt; // Pobranie dt_txt
                    const elementDate = dt_txt.split(' ')[0]; // Pobranie samej daty

                    if (elementDate === date) {
                        tempArray.push(element.main.temp);
                        humidityArray.push(element.main.humidity);
                    }
                }

                // Obliczanie wartości max_temp, min_temp i avg_humidity dla danej daty
                const max_temp = Math.max(...tempArray);
                const min_temp = Math.min(...tempArray);
                const avg_humidity = humidityArray.reduce((sum, humidity) => sum + humidity, 0) / humidityArray.length;

                // Dodawanie obiektu z unikalną datą i oryginalnymi składowymi do tablicy slicedArray
                const uniqueElement = this.weatherData.list.find(element => element.dt_txt.startsWith(date));

                const elementCopy = { ...uniqueElement }; // Kopia oryginalnego elementu
                elementCopy.main = { ...elementCopy.main }; // Kopia oryginalnej składowej main
                elementCopy.main.max_temp = max_temp;
                elementCopy.main.min_temp = min_temp;
                elementCopy.main.avg_humidity = avg_humidity;

                slicedArray.push(elementCopy);
            }
            console.log(slicedArray);
            return slicedArray;
        }
        // console.log(slicedArray);
    }
};
</script>