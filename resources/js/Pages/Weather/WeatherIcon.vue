<template>
    <object v-if="icon == '01d'" :class="this.class" type="image/svg+xml" data="storage/weather/01d.svg"></object>
    <object v-else-if="icon == '01n'" :class="this.class" type="image/svg+xml" data="storage/weather/01n.svg"></object>
    <object v-else-if="icon == '02d'" :class="this.class" type="image/svg+xml" data="storage/weather/02d.svg"></object>
    <object v-else-if="icon == '02n'" :class="this.class" type="image/svg+xml" data="storage/weather/02n.svg"></object>
    <object v-else-if="icon == '03d'" :class="this.class" type="image/svg+xml" data="storage/weather/03d.svg"></object>
    <object v-else-if="icon == '03n'" :class="this.class" type="image/svg+xml" data="storage/weather/03n.svg"></object>
    <object v-else-if="icon == '04d'" :class="this.class" type="image/svg+xml" data="storage/weather/04d.svg"></object>
    <object v-else-if="icon == '03n'" :class="this.class" type="image/svg+xml" data="storage/weather/03n.svg"></object>
    <object v-else-if="icon == '04d'" :class="this.class" type="image/svg+xml" data="storage/weather/04d.svg"></object>
    <object v-else-if="icon == '04n'" :class="this.class" type="image/svg+xml" data="storage/weather/04n.svg"></object>
    <object v-else-if="icon == '09d'" :class="this.class" type="image/svg+xml" data="storage/weather/09d.svg"></object>
    <object v-else-if="icon == '09n'" :class="this.class" type="image/svg+xml" data="storage/weather/09n.svg"></object>
    <object v-else-if="icon == '10d'" :class="this.class" type="image/svg+xml" data="storage/weather/10d.svg"></object>
    <object v-else-if="icon == '10n'" :class="this.class" type="image/svg+xml" data="storage/weather/10n.svg"></object>
    <object v-else-if="icon == '11d'" :class="this.class" type="image/svg+xml" data="storage/weather/11d.svg"></object>
    <object v-else-if="icon == '13d'" :class="this.class" type="image/svg+xml" data="storage/weather/13d.svg"></object>
    <object v-else-if="icon == '13n'" :class="this.class" type="image/svg+xml" data="storage/weather/13n.svg"></object>
    <object v-else-if="icon == '50d'" :class="this.class" type="image/svg+xml" data="storage/weather/50d.svg"></object>
    <object v-else-if="icon == '50n'" :class="this.class" type="image/svg+xml" data="storage/weather/50n.svg"></object>
</template>

<script>
export default {
    name: "WeatherIcon",
    props: ['class', 'icon'],
    components: {
    },
}
</script>