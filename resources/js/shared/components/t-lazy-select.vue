<template>
    <v-autocomplete
        :variant="variant"
        :items="select.items.value"
        v-model="selectedItems"
        :return-object="returnObject"
        :item-title="itemTitle"
        :item-value="itemValue"
        :label="label"
        :loading="select.loading.value"
        :rules="validation"
        :multiple="multiple"
        chips
        closable-chips
        auto-select-first="exact"
        @update:search="setTimeout(() => {select.getItems}, 2000);"
        @click="requestOnClick ? select.getItems() : true"
        :class="class"
    >
        <template v-slot:append-item>
            <div v-intersect.quiet="select.loadMoreFromApi" />
        </template>
        <template v-slot:no-data>
            <div class="px-4">
                {{ $t("no_data") }}
            </div>
        </template>
    </v-autocomplete>
</template>
<script setup>
import { useAutocomplete } from "@/helpers/autocomplete";
import { onMounted, ref } from "vue";

const props = defineProps({
    validation: {
        required: true,
        type: Object,
    },
    uri: {
        required: true,
        type: String,
    },
    label: {
        required: true,
        type: String,
    },
    itemTitle: {
        required: true,
        type: String,
    },
    itemValue: {
        required: true,
        type: String,
    },
    requestOnClick: {
        type: Boolean,
        default() {
            return false
        }
    },
    variant: {
        type: String,
        default() {
            return ''
        }
    },
    class: {
        type: String,
        default() {
      return ''
    }
    },
    multiple: {
        type: Boolean,
        default() {
      return false
    }
    },
    returnObject: {
        type: Boolean,
        default() {
      return false
    }
    },
});

const select = useAutocomplete(props.uri);

onMounted( () => {
     select.getItems();
});

const selectedItems = defineModel("selectedItems");
</script>
