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
        :chips="chips"
        :closable-chips="closableChips"
        auto-select-first="exact"
        @update:search="serverSearch ? select.getItems : true"
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
import { useLazySelect } from "@/helpers/t-lazy-select.js";
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
    chips: {
        type: Boolean,
        default() {
            return false
        }
    },
    closableChips: {
        type: Boolean,
        default() {
            return false
        }
    },
    serverSearch: {
        type: Boolean,
        default() {
            return false
        }
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
    multiple: {
        type: Boolean,
        default() {
      return false
    }
    },
    class: {
        type: String,
        default() {
      return ''
    }
    },
    returnObject: {
        type: Boolean,
        default() {
      return false
    }
    },
});

const select = useLazySelect(props.uri);

onMounted( () => {
     select.getItems();
     props.class = multiple ? props.class : `chips-unset-style ${props.class}`
});

const selectedItems = defineModel("selectedItems");
</script>
