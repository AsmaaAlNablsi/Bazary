import { ref } from "vue";

export default {
    install: (app, options) => {
        const mainLoader = ref(0);
        app.provide('mainLoader', mainLoader);
        options.axios.interceptors.request.use(
            config => {
                if (config.showLoader) {
                    mainLoader.value++;
                }

                return config;
            },
            error => {
                if (error.config.showLoader) {
                    mainLoader.value--;
                }
                return Promise.reject(error);
            }
        );
        options.axios.interceptors.response.use(
            response => {
                if (response.config.showLoader) {
                    mainLoader.value--;
                }

                return response;
            },
            error => {
                let response = error.response;

                if (response.config.showLoader) {
                    mainLoader.value--;
                }

                return Promise.reject(error);
            }
        )
    }
}