<script setup>
const emit = defineEmits(['confirm', 'cancel'])
</script>
<template>
  <div class="modal-container">
    <div class="modal-body">
      <span class="modal-header">{{ $t('confirm') }} </span>
      <v-divider :thickness="2" class="mt-4 mb-5"></v-divider>
      {{ $t('are_you_sure') }}
      <span class="model-define"> {{ $t('define_about_confirm_delete') }} </span>
      <div class="modal-action">
        <v-btn class="confirmation-btn green-btn" @click="$emit('confirm')">
          <span class="px-2">{{ $t('confirm') }}</span>
        </v-btn>
        <v-btn class="confirmation-btn" @click="$emit('cancel')" color="error">
          <span class="px-2">{{ $t('cancel') }}</span>
        </v-btn>
      </div>
    </div>
  </div>
</template>

