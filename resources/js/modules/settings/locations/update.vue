<template>
  <v-container>
    <v-card width="90%" class="pa-5 mx-auto" color="white" outlined>
      <v-card-title class="headline black" primary-title>
        <h3>
          {{ $t('locations.edit') }}
        </h3>
      </v-card-title>
      <v-card-text class="pa-5">
            <v-form
                v-model="valid"
                v-on:submit.prevent="emit('update', {...updateForm}, 'locations', true)"
            >
          <v-row class="mt-n2">
            <v-col>
              <v-text-field
                v-model="updateForm.name"
                :label="$t('name')"
                variant="outlined"
                :rules="validation.name"
                class="required"
              >
              </v-text-field>
            </v-col>
            <v-col>
              <v-text-field
                v-model="updateForm.code"
                :label="$t('locations.code')"
                variant="outlined"
                :rules="validation.code"
              >
              </v-text-field>
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
                    <span class="px-2">{{ $t("edit") }}</span>
                </v-btn>
        </v-form>
      </v-card-text>
    </v-card>
  </v-container>
</template>
<script setup>
import {ref, defineProps, onMounted} from 'vue';
import useLocations from "@/modules/settings/composables/locations";



const valid = defineModel("valid", {type: Boolean});
const form = defineModel("form", {type: Object});
const props = defineProps(["validation"]);
const emit = defineEmits(["cancel", "update"]);

const updateForm = ref({...form.value});


</script>

