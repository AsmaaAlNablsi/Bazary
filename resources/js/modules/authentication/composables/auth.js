import {reactive, ref} from 'vue'
import {useRouter} from 'vue-router';
import {notify} from "@kyvg/vue3-notification";
import store from "@/store/store.js";
import { VForm } from 'vuetify/lib/components/index';
import {useI18n} from "vue-i18n";
import useValidations from '@/helpers/validations.js'

export default function useAuth() {
    const {t} = useI18n({})
    const router = useRouter()
    const form = ref<typeof VForm>(null);
    const valid = ref(false);

    const validationRules = useValidations(t);

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
