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
        {{ $t('addresses.edit') }}
      </v-card-title>
      <v-divider :thickness="2" class="mt-2 mb-3"></v-divider>
      <v-card-text class="pa-5">
        <div>
          <v-row class="mt-n5">
            <v-col>
              <v-text-field
                  v-model="addressData.name_ar"
                  :type="'text'"
                  :label="$t('name_ar')"
                  variant="solo"
              >
              </v-text-field>

            </v-col>
            <v-col>
              <v-text-field
                  v-model="addressData.name_en"
                  :type="'text'"
                  :label="$t('name_en')"
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
                v-model="addressData.is_active"
            >
            </v-checkbox>
          </v-row>
          <v-btn class="colored-btn-cancel" :class="'float-'+$t('right')" @click=" $emit('cancel')">
            {{ $t('cancel') }}
          </v-btn>
          <v-btn :class="'float-'+$t('right') + ' colored-btn'" @click="$emit('update', addressData)">
            <span class="px-2">{{ $t('edit') }}</span>
          </v-btn>
        </div>
      </v-card-text>
    </v-card>
  </v-dialog>
</template>
<script setup>
import {reactive, computed} from 'vue';
import useAddresses from "@/modules/settings/composables/addresses.js";

const {
  form,
  validation,
  valid
} = useAddresses()

const props = defineProps(['show', 'data']);
const state = reactive({data: null});

const addressData = computed({
  get() {
    return props.data;
  },
  set(newVal) {
    state.data = newVal
  },
});

</script>

