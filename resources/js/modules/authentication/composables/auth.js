import {reactive, ref} from 'vue'
import {useRouter} from 'vue-router';
import {notify} from "@kyvg/vue3-notification";
import store from "@/store/store.js";
import { VForm } from 'vuetify/lib/components/index';
import {useI18n} from "vue-i18n";

export default function useAuth() {
    const {t} = useI18n({})
    const router = useRouter()
    const form = ref<typeof VForm>(null);
    const valid = ref(false);

    const validationRules = {
        email: value => /.+@.+\..+/.test(value) || t('validation.email'),
        password: value => /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/.test(value) || t('validation.password'),
        required: value => !!value || t('validation.required')
    }

    const validation = {
        email: [
            validationRules.required, validationRules.email
        ],
        password: [
            validationRules.required, validationRules.password
        ],
    }

    const userCredentials = reactive({
        email: "",
        password: ""
    });


    const showPassword = false;

    const login = async (userData) => {
        if (valid.value) {
            store.dispatch("auth/login", userData).then(
                () => {
                    router.push("/");
                },
                (error) => {
                   notify(error.response.data.message);
                }
            );

        }
    }

    return {
        showPassword,
        validation,
        userCredentials,
        form,
        valid,
        login
    }
}
