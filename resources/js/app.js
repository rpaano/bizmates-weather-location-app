import {createApp} from 'vue'
import './axios';
import App from './App.vue'
import router from "./router"

createApp(App).use(router).mount('#app')