<template>
    <div v-if="mainLoader>0" style="position: absolute; z-index:9999; background-color: white;  height: 100%;width:100%">
        <div style="position: absolute; z-index:9999;background-color: white; top: 50%;left: 50%;transform: translate(-50%, -50%);">
            <v-progress-circular indeterminate :size="48"></v-progress-circular>
        </div>
    </div>  
</template>
<script setup>
import { inject } from 'vue';

const mainLoader = inject('mainLoader');
</script>