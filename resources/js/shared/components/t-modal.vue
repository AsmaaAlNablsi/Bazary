<template>
 <v-dialog persistent v-model="show" :width="width">
    <t-loader></t-loader>
      <slot></slot>
 </v-dialog>
</template>
<script setup>
import TLoader from "@/shared/components/t-loader.vue"; 
const show = defineModel("show", {type: Boolean});
const props = defineProps(["width"]);
</script>
