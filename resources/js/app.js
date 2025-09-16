import { createApp } from 'vue';
import './bootstrap';

const test = createApp({
    data() {
        return {
            message: "123456"
        }
    }
});

test.mount('#test');