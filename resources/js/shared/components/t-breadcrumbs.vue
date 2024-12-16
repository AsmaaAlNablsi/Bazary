<template>
    <v-breadcrumbs :items="breadcrumbs">
        <template v-slot:title="{ item }">
            {{ item.title }}
        </template>
    </v-breadcrumbs>
</template>
<script setup>
import { defineProps, inject, onMounted } from "vue";
import cookie from "vue-cookies";

const breadcrumbs = inject("breadcrumbs");

const props = defineProps([
    "path",
    "title",
    "reset"
]);


onMounted(() => {
    addBreadcrumbs();
});

const addBreadcrumbs = () => {
    if (props.reset) {
        breadcrumbs.value = [];
    }

    breadcrumbs.value.push({
        title: props.title,
        to: props.path,
    });

    /// Check if breadcrumb is already existed
    const idx = breadcrumbs.value.findIndex((value) => value.to === props.path);
    if (idx > -1) {
        breadcrumbs.value = breadcrumbs.value.slice(0, idx + 1);
    }

    cookie.set('breadcrumbs', breadcrumbs.value);
};
</script>
