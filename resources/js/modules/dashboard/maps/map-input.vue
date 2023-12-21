<template>
    <v-dialog
        v-model="props.show"
        width="50%">
        <v-card
            width="90%"
            class="pa-5 mx-auto"
            color="white"
            outlined
        >
            <v-card-text class="pa-5">
                <div style="height: 60vh; margin: 0; padding: 0;">
                    <l-map
                        :zoom="zoom"
                        :center="center"
                        :options="mapOptions"
                        :drawControl="true"
                        style="height: 80%"
                        class="cursor-auto"
                        @ready="mapReady"
                    >
                        <l-tile-layer
                            :url="url"
                            :attribution="attribution"
                        />
                        <l-marker :lat-lng="selectedPoint"></l-marker>
                    </l-map>
                </div>
                <v-btn class="colored-btn-cancel" :class="'float-'+$t('right')" @click="$emit('cancel')">
                    {{ $t('cancel') }}
                </v-btn>
                <v-btn @click="$emit('selectPoint', selectedPoint)" class="colored-btn" :class="'float-'+$t('right')">
                    <span class="px-2">{{ $t('select') }}</span>
                </v-btn>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>

<script setup>
import 'leaflet/dist/leaflet.css';
import {LMap, LMarker, LTileLayer} from "@vue-leaflet/vue-leaflet";
import useMaps from "@/modules/subscription-management/composables/maps.js";
import {onUpdated, ref} from "vue";
import {latLng} from "leaflet";

const {
    zoom,
    center,
    url,
    attribution,
    mapOptions
} = useMaps()

const props = defineProps(['show', 'data']);
const emit = defineEmits(['selectPoint', 'cancel'])

let selectedPoint = ref([0, 0]);

onUpdated(async () => {
    selectedPoint = props.data ? ref(latLng(props.data['latitude'], props.data['longitude'])) : ref([0, 0])
});

const mapReady = map => {
    map.on('click', addMarker);
}

function addMarker(event) {
    selectedPoint.value = event.latlng;
}
</script>
