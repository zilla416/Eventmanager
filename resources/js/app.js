import { createApp } from "vue";
import "./bootstrap";

const counterapp = createApp({
    data() {
        return {
            count: 0,
        };
    },
    methods: {
        increment() {
            this.count++;
        },
        decrement() {
            this.count--;
        },
        reset() {
            this.count = 0;
        },
    },
});

counterapp.mount("#counterapp");