<template>
    <v-container>
        <t-breadcrumbs
            :path="router.currentRoute.value.path"
            :title="$t(router.currentRoute.value.meta.breadcrumb)"
            :reset="true"
        >
        </t-breadcrumbs>
    </v-container>
    <v-container>
        ...
    </v-container>
</template>


<script setup>
import useShared from "@/helpers/shared.js";
import TBreadcrumbs from "@/shared/components/t-breadcrumbs.vue";

const {
    router
} = useShared()

</script>

