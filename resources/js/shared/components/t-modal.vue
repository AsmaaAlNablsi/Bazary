<template>
 <v-dialog persistent v-model="show" :width="width">
      <slot></slot>
 </v-dialog>
</template>
<script setup>
const show = defineModel("show", {type: Boolean});
const props = defineProps(["width"]);
</script>
