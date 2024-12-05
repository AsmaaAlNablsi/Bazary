<template>
 <v-dialog
     persistent
      v-model="props.show"
      :width="props.width">
      <slot></slot>
 </v-dialog>
</template>
<script setup>
import { defineProps } from "vue";
const props = defineProps([
    "show",
    "width"
]);
</script>
