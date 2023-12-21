import {createI18n} from 'vue-i18n'
import en from '@/locales/messages/en.json'
import ar from '@/locales/messages/ar.json'

export default createI18n({
    locale: localStorage.getItem('lang'),
    fallbackLocale: 'en',
    legacy: false,
    globalInjection: true,
    messages: {
        en,
        ar
    }
});
