<template>
  <div class="flex flex-row gap-2 w-[1024px]">
    <div class="w-full" v-html="tomorrowWidget"></div>
    <div class="w-full" v-html="aqiWidget"></div>
  </div>
</template>

<script>
export default {
  name: "TomorrowWidget",
  data() {
    return {
      tomorrowWidget: "",
      aqiWidget: ""
    };
  },
  mounted() {
    const tomorrowScript = document.createElement("script");
    tomorrowScript.id = "tomorrow-sdk";
    tomorrowScript.src = "https://www.tomorrow.io/v1/widget/sdk/sdk.bundle.min.js";
    tomorrowScript.async = true;
    tomorrowScript.onload = () => {
      if (window.__TOMORROW__) {
        window.__TOMORROW__.renderWidget();
      }
    };
    document.body.appendChild(tomorrowScript);

    this.tomorrowWidget = `
      <div class="tomorrow"
         data-location-id=""
         data-language="PL"
         data-unit-system="METRIC"
         data-skin="dark"
         data-widget-type="upcoming"
         style="padding-bottom:22px;position:relative;"
      >
        <a
          href="https://www.tomorrow.io/weather-api/"
          rel="nofollow noopener noreferrer"
          target="_blank"
          style="position: absolute; bottom: 0; transform: translateX(-50%); left: 50%;"
        >
          <img
            alt="Powered by the Tomorrow.io Weather API"
            src="https://weather-website-client.tomorrow.io/img/powered-by.svg"
            width="250"
            height="18"
          />
        </a>
      </div>
    `;

    const aqiScript = document.createElement("script");
    aqiScript.id = "aqi-sdk";
    aqiScript.src = "https://www.tomorrow.io/v1/widget/sdk/sdk.bundle.min.js";
    aqiScript.async = true;
    aqiScript.onload = () => {
      if (window.__TOMORROW__) {
        window.__TOMORROW__.renderWidget();
      }
    };
    document.body.appendChild(aqiScript);

    this.aqiWidget = `
      <div class="tomorrow"
         data-location-id=""
         data-language="PL"
         data-unit-system="METRIC"
         data-skin="dark"
         data-widget-type="aqiPollutant"
         style="padding-bottom:22px;position:relative;"
      >
        <a
          href="https://www.tomorrow.io/weather-api/"
          rel="nofollow noopener noreferrer"
          target="_blank"
          style="position: absolute; bottom: 0; transform: translateX(-50%); left: 50%;"
        >
          <img
            alt="Powered by the Tomorrow.io Weather API"
            src="https://weather-website-client.tomorrow.io/img/powered-by.svg"
            width="250"
            height="18"
          />
        </a>
      </div>
    `;
  }
};
</script>

<style>
/* Dodaj swoje style CSS tutaj, jeśli są potrzebne */
</style>
