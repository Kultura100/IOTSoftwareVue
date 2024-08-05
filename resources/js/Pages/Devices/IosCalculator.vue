
<template>
    <div class="w-[15rem] h-[23rem] bg-black p-2.5">
        <div class="text-6xl text-white text-end font-light mb-3">0</div>
        <div class="flex flex-row flex-wrap w-[14rem] gap-2 text-lg">
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-zinc-400 select-none cursor-pointer">AC</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-zinc-400 select-none cursor-pointer">+/-</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-zinc-400 select-none cursor-pointer">%</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-orange-400 text-white select-none cursor-pointer">/</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-zinc-800 text-white select-none cursor-pointer">7</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-zinc-800 text-white select-none cursor-pointer">8</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-zinc-800 text-white select-none cursor-pointer">9</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-orange-400 text-white select-none cursor-pointer">x</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-zinc-800 text-white select-none cursor-pointer">4</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-zinc-800 text-white select-none cursor-pointer">5</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-zinc-800 text-white select-none cursor-pointer">6</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-orange-400 text-white select-none cursor-pointer">-</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-zinc-800 text-white select-none cursor-pointer">1</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-zinc-800 text-white select-none cursor-pointer">2</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-zinc-800 text-white select-none cursor-pointer">3</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-orange-400 text-white select-none cursor-pointer">+</div>
            <div class="font-bold rounded-full w-[6.5rem] bg-zinc-800 text-white flex items-center justify-start">
                <div class="ml-4">0</div>
            </div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-zinc-800 text-white select-none cursor-pointer">,</div>
            <div class="flex justify-center items-center w-[3rem] h-[3rem] font-bold rounded-full bg-orange-400 text-white select-none cursor-pointer">=</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Calculator",
    components: {

    },
    props: [],
    data() {
        return {
            wynik: 0.0,
        };
    },
    methods: {
        policz(operacja) { //1 - dodawanie, 2 - odejmowanie 3 - dzielenie 4 - mnozenie 5 - procent 6
            switch (operacja) {
                case value:

                    break;

                default:
                    break;
            }
        }
    },
};
</script>