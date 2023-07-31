import {createApp} from 'vue';
import routes from './routes/index.js';
import App from './App.vue';
import vuetify from './theme/index.js';
import './utils/axios.js'

createApp(App)
    .use(routes)
    .use(vuetify)
    .mount('#app');
