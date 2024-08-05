<template>
    <div>
        <object @load="startAnalysis" class="h-[200px] lg:h-full lg:w-full mx-auto rounded-md"
            data="http://192.168.1.4:48151/videostream.cgi?user=admin&amp;pwd=terminator1234" type="image/jpeg"
            ref="object"></object>
        <div v-if="result">
            Result: {{ result }}
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            result: null,
            intervalId: null,
        };
    },
    mounted() {
        this.startCamera();
    },
    beforeDestroy() {
        clearInterval(this.intervalId);
    },
    methods: {
        startCamera() {
            this.$refs.object.addEventListener('load', () => {
                this.startAnalysis();
            });
        },
        startAnalysis() {
            this.intervalId = setInterval(() => {
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                canvas.width = this.$refs.object.offsetWidth;
                canvas.height = this.$refs.object.offsetHeight;

                const image = new Image();
                image.crossOrigin = 'Anonymous';
                image.src = this.$refs.object.data;
                image.onload = () => {
                    context.drawImage(image, 0, 0, canvas.width, canvas.height);

                    canvas.toBlob((blob) => {
                        this.analyzeImage(blob); // Przekazanie samego bloba
                    }, 'image/jpeg');
                };
            }, 5000);
        },
        analyzeImage(imageData) {
            const formData = new FormData();
            formData.append('image', imageData, 'image.jpg');

            // Wysłanie danych obrazu do backendu
            axios.post('/analyze-image', formData)
                .then((response) => {
                    const results = response.data.results;
                    // Obsługa wyników analizy obrazu
                    console.log(results);
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    },
};
</script>
