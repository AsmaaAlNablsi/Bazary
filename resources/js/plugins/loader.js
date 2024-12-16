export default {
    install: (app, options) => {
        options.axios.interceptors.request.use(
            config => {
                if (config.showLoader) {
                    options.mainLoader.value++;
                }

                return config;
            },
            error => {
                if (error.config.showLoader) {
                    options.mainLoader.value--;
                }
                return Promise.reject(error);
            }
        );
        options.axios.interceptors.response.use(
            response => {
                if (response.config.showLoader) {
                    options.mainLoader.value--;
                }

                return response;
            },
            error => {
                let response = error.response;

                if (response.config.showLoader) {
                    options.mainLoader.value--;
                }

                return Promise.reject(error);
            }
        )
    }
}