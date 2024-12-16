<template>
    <data-table
        :rows="rows"
        :pagination="pagination"
        :query="query"
        :loading="loading"
        hoverable
        filter
        @loadData="emit('loadData', $event)"
    >
        <template #thead>
            <table-head v-for="col in cols">{{ $t(col.field) }}</table-head>
            <table-head v-if="actions">{{ $t("actions") }}</table-head>
        </template>

        <template #tbody="{ row }">
            <table-body v-for="col in cols" v-text="col.cell(row)"></table-body>
            <table-body v-if="actions">
                <div class="crud-actions-container">
                    <div v-for="action in actions">
                        <button
                            v-if="userPermissions.includes(action.perm)"
                            :class="action.class"
                            @click="action.action(row)"
                        >
                            <v-icon :icon="action.icon"></v-icon>
                        </button>
                    </div>
                </div>
            </table-body>
        </template>
    </data-table>
</template>
<script setup>
import { defineProps } from "vue";
const props = defineProps([
    "rows",
    "pagination",
    "query",
    "loading",
    "cols",
    "actions",
    "userPermissions",
]);
const emit = defineEmits(["loadData"]);
</script>
