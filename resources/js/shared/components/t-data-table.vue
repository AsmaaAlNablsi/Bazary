<template>
    <data-table
        :rows="rows"
        :pagination="savedState?.pagination ?? pagination"
        :query="savedState?.query ?? query" 
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
import { defineProps, inject, computed } from "vue";
const service = inject('service');

const props = defineProps([
    "rows",
    "pagination",
    "query",
    "queryType",
    "loading",
    "cols",
    "actions",
    "userPermissions",
]);

// Create a computed property to safely access localStorage
const savedState = computed(() => {
    // Check if we're in a browser environment where localStorage is available
    if (typeof window !== 'undefined' && window.localStorage) {
        const key = `${service.value.routPath + props.queryType}`;
        const storedData = window.localStorage.getItem(key);
        return storedData ? JSON.parse(storedData) : null;
    }
    return null;
});

const emit = defineEmits(["loadData"]);
</script>
