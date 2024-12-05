import 'vuetify/styles'
import {createVuetify} from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import {aliases, mdi} from 'vuetify/iconsets/mdi'
import '@mdi/font/css/materialdesignicons.css'
import { ar, en } from 'vuetify/locale'

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

export default createVuetify({
    theme: {
        defaultTheme: 'customTheme',
        themes: {
            customTheme,
        },
    },
    locale: {
        locale: 'ar',
        fallback: 'ar',
        messages: { ar, en },
        rtl: {ar: true},
    },
    components,
    directives,
    icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
            mdi,
        }
    },
});
