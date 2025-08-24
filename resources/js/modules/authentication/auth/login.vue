<template>
        <v-row class="login-row p-0 m-0">
            <v-col class="pb-0 mb-0 mt-5 text-center">
                 <v-container class="w-50">
                     <notifications position="top left" />

                    <img class="login-logo" src="@/assets/logo/logo.jpg">

                    <h3 class="login-header py-5 my-5">{{ $t('login') }}</h3>

                    <v-form v-model="valid" v-on:submit.prevent="loginUser()">
                        <v-row>
                            <v-col>
                                <v-text-field
                                    v-model="userCredentials.email"
                                    :type="'text'"
                                    :label="$t('users.email')"
                                    :rules="validation.email"
                                    variant="solo"
                                >
                                </v-text-field>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col>
                                <v-text-field
                                    v-model="userCredentials.password"
                                    :type="showPassword? 'text' : 'password'"
                                    @click:append="showPassword = !showPassword"
                                    :label="$t('users.password')"
                                    :rules="validation.password"
                                    variant="solo"
                                >
                                </v-text-field>
                            </v-col>
                        </v-row>
                        <v-btn class="mx-auto py-5 my-5 colored-btn w-100" type="submit">
                            {{ $t('login') }}
                        </v-btn>
                    </v-form>
                 </v-container>

            </v-col>

        </v-row>
</template>


<script setup>
import '../../../../css/login.css';
import useAuth from "../composables/auth.js";

const {
    showPassword,
    validation,
    userCredentials,
    form,
    valid,
    login
} = useAuth()

const loginUser = async () => {
    await login({...userCredentials})
}
</script>
