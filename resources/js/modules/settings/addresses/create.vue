<template>
    <v-container>
      <v-card width="90%" class="pa-5 mx-auto" color="white" outlined>
        <v-card-title class="headline black" primary-title>
          <h3>
            {{ $t('addresses.add') }}
          </h3>
        </v-card-title>
        <v-card-text class="pa-5">
          <v-form
            v-model="valid"
            v-on:submit.prevent="emit('create', {...createForm}, 'addresses', false, true)"
          >
            <v-row class="mt-n2">
              <v-col>
                <v-text-field
                  v-model="createForm.name_ar"
                  :label="$t('name_ar')"
                  variant="outlined"
                  :rules="validation.name_ar"
                  class="required"
                >
                </v-text-field>
              </v-col>
              <v-col>
                <v-text-field
                  dense
                  v-model="createForm.name_en"
                  :label="$t('name_en')"
                  variant="outlined"
                  :rules="validation.name_en"
                >
                </v-text-field>
              </v-col>
            </v-row>
            <v-row class="mt-n5">
            <v-col>
              <v-checkbox
                  :label="$t('is_active.is_active')"
                  false-value="0"
                  true-value="1"
                  v-model="createForm.is_active"
              >
              </v-checkbox>
            </v-col>
          </v-row>
            <v-btn
              @click="emit('cancel')"
              :class="'float-' + $t('right')"
              class="colored-btn-cancel"
            >
              {{ $t("cancel") }}
            </v-btn>
            <v-btn
              :class="'float-' + $t('right') + ' colored-btn'"
              type="submit"
            >
              <span class="px-2">{{ $t("save") }}</span>
            </v-btn>
          </v-form>
        </v-card-text>
      </v-card>
    </v-container>
</template>
<script setup>
import { ref } from 'vue';

const valid = defineModel("valid", {type: Boolean});
const form = defineModel("form", {type: Object});
const props = defineProps(["validation"]);
const emit = defineEmits(["cancel", "create"]);

const createForm = ref({...form.value});
</script>

