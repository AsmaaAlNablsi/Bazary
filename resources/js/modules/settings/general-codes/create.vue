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
        {{ $t('general_codes.add') }}
      </v-card-title>
      <v-divider :thickness="2" class="mt-1 mb-2"></v-divider>
      <v-card-text class="pa-5">
        <v-row class="mt-n5">
          <v-col>
            <v-text-field
                v-model="form.description_ar"
                :type="'text'"
                :label="$t('description_ar')"
                :rules="validation.description_ar"
                variant="solo"
            >
            </v-text-field>

          </v-col>
          <v-col>
            <v-text-field
                v-model="form.description_en"
                :type="'text'"
                :label="$t('description_en')"
                :rules="validation.description_en"
                variant="solo"
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
                v-model="form.is_active"
            >
            </v-checkbox>
          </v-col>
        </v-row>
        <v-btn class="colored-btn-cancel" :class="'float-'+$t('right')" @click="$emit('cancel')">
          {{ $t('cancel') }}
        </v-btn>
        <v-btn @click="$emit('create', form)" class="colored-btn" :class="'float-'+$t('right')"
               v-model="valid"
        >
          <span class="px-2">{{ $t('save') }}</span>
          <img class="crud-icon" src="@/assets/icons/ic_add_2.svg">
        </v-btn>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>

<script setup>
import useGeneralCodes from "../composables/general-codes.js";
import {reactive} from "vue";

const {
  parent,
  form,
  validation,
  valid,
} = useGeneralCodes()


const props = defineProps(['show', 'data']);

</script>

