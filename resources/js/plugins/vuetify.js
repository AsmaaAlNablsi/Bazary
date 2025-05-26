import 'vuetify/styles'
import {createVuetify} from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import {aliases, mdi} from 'vuetify/iconsets/mdi'
import '@mdi/font/css/materialdesignicons.css'
import { ar, en } from 'vuetify/locale'
import { createVueI18nAdapter } from 'vuetify/locale/adapters/vue-i18n'
import { createI18n, useI18n } from 'vue-i18n'

const customTheme = {
    dark: false,
    colors: {
        background: '#F1EFFD',
        surface: '#F1EFFD',
        primary: '#F1EFFD',
        error: '#FA7575',
        info: '#9FD8E7',
        success: '#55E0B2',
        warning: '#FCD17C',
    },
}

const  localStorageLang = localStorage.getItem("lang");
const setLocalLang = ( localStorageLang === '' || localStorageLang === 'en') ? "en" : "ar";

const messages = {
    en: {
        $vuetify: {
            ...en,
        },
    },
    ar: {
        $vuetify: {
            ...ar,
        },
    },
}

const i18n = createI18n({
    rtl: { ar: true },
    legacy: false, // Vuetify does not support the legacy mode of vue-i18n
    current: setLocalLang,
    locale: setLocalLang,
    fallback: 'en',
    fallbackLocale: 'en',
    messages,
})
export default createVuetify({
    theme: {
        defaultTheme: 'customTheme',
        themes: {
            customTheme,
        },
    },
    directives,

    locale: {
        adapter: createVueI18nAdapter({ i18n, useI18n }),
    },
    components,
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
            mdi,
        }
    },
});
