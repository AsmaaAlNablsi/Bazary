<template>
    <v-breadcrumbs :items="router.currentRoute.value.meta.breadcrumbs">
        <template v-slot:title="{ item }">
            {{ $t(item.title) }}
        </template>
    </v-breadcrumbs>
    <v-container>
        ...
    </v-container>
</template>


<script setup>
import useShared from "@/helpers/shared.js";

const {
    router
} = useShared()

</script>

