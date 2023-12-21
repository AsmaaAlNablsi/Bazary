<template>

    <div @click="changeLocale" class="header-btn-container">
        <img class="header-btn" src="@/assets/icons/ic_languages_en.svg">
    </div>
</template>

<script>
import BaseService from "@/services/base-service.js";

export default {
    name: "LocaleSwitcher",
    methods: {
        changeLocale() {
            new BaseService().lang();
            const lang = (this.$i18n.locale === 'ar') ? 'en' : 'ar';
            this.$i18n.locale = lang;
            localStorage.setItem('lang', lang);
            this.$vuetify.locale.rtl = (lang === 'ar') ? { ar: true } : { en: true };
        }
    },

};
</script>
