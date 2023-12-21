<template>
  <v-dialog
      v-model="props.show"
      width="70%">
    <v-card
        width="90%"
        class="pa-5 mx-auto"
        color="white"
        outlined
    >
      <v-card-title class="headline black" primary-title>
        {{ $t('general_codes.edit') }}
      </v-card-title>
      <v-divider :thickness="2" class="mt-1 mb-2"></v-divider>
      <v-card-text class="pa-5">
        <div>
          <v-row class="mt-n5">
            <v-col>
              <v-text-field
                  v-model="generalCodeData.description_ar"
                  :type="'text'"
                  :label="$t('description_ar')"
                  variant="solo"
              >
              </v-text-field>

            </v-col>
            <v-col>
              <v-text-field
                  v-model="generalCodeData.description_en"
                  :type="'text'"
                  :label="$t('description_en')"
                  variant="solo"
              >
              </v-text-field>
            </v-col>
          </v-row>
          <v-row class="mt-n5">
            <v-checkbox
                :label="$t('is_active.is_active')"
                v-bind:false-value="0"
                v-bind:true-value="1"
                v-model="generalCodeData.is_active"
            >
            </v-checkbox>
          </v-row>
          <v-btn class="colored-btn-cancel" :class="'float-'+$t('right')" @click="$emit('cancel')">
            {{ $t('cancel') }}
          </v-btn>
          <v-btn @click="$emit('update', generalCodeData)" class="colored-btn" :class="'float-'+$t('right')"
                 v-model="valid"
          >
            <span class="px-2">{{ $t('edit') }}</span>
          </v-btn>
        </div>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>
<script setup>
import {computed, reactive} from 'vue';
import useGeneralCodes from "../composables/general-codes.js";

const {
  parent,
  form,
  validation,
  valid
} = useGeneralCodes()

const props = defineProps(['show', 'data']);
const state = reactive({data: null});

const generalCodeData = computed({
  get() {
    return props.data;
  },
  set(newVal) {
    state.data = newVal
  },
});

</script>

