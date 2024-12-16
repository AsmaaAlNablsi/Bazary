import '../css/app.css';
import '../css/header.css';
import '../css/footer.css';
import '../css/navigation.css';

import Vuetify from "./plugins/vuetify.js";
import i18n from "./plugins/i18n.js";

import * as ConfirmDialog from 'vuejs-confirm-dialog';
import Notifications from '@kyvg/vue3-notification'

import {DataTable, TableBody, TableHead} from "@jobinsjp/vue3-datatable"
import "@jobinsjp/vue3-datatable/dist/style.css"

import {createApp, ref} from 'vue';
import Router from "./helpers/router";
import App from './app.vue';
import Store from "./store/store.js";
import axios from "axios";
import cookie from "vue-cookies";

const app = createApp(App);

app.config.globalProperties.$axios = axios;

const breadcrumbs = ref([]);

if(!cookie.get('breadcrumbs')) {
    cookie.set('breadcrumbs', breadcrumbs.value);
} else {
    breadcrumbs.value = cookie.get('breadcrumbs');
}

app.provide('breadcrumbs', breadcrumbs);

app.use(Vuetify)
    .use(Router)
    .use(Store)
    .use(ConfirmDialog)
    .use(Notifications)
    .use(i18n)
    .component("DataTable", DataTable)
    .component("TableBody", TableBody)
    .component("TableHead", TableHead)
    .mount('#app');

