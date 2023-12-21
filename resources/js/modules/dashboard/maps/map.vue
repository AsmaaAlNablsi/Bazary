<template>
    <v-breadcrumbs :items="router.currentRoute.value.meta.breadcrumbs">
        <template v-slot:title="{ item }">
            {{ $t(item.title) }}
        </template>
    </v-breadcrumbs>
    <v-container>
        <h3> {{ $t('real_estates.real_estates') }}</h3>
        <v-divider :thickness="2" class="mt-3 mb-4"></v-divider>
        <div style="height: 80vh; margin: 0; padding: 0;">
            <l-map v-if="showMap"
                   :zoom="zoom"
                   :center="center"
                   :options="mapOptions"
                   style="height: 100%"
            >
                <l-tile-layer
                    :url="url"
                    :attribution="attribution"
                />
                <l-marker v-for="point in points" :lat-lng="latLng(point.latitude,point.longitude)">
                    <l-popup>
                        <p>
                            {{ point.title }}
                        </p>
                    </l-popup>
                </l-marker>
            </l-map>
        </div>
    </v-container>
</template>

<script setup>
import 'leaflet/dist/leaflet.css';
import {LMap, LMarker, LPopup, LTileLayer} from "@vue-leaflet/vue-leaflet";
import useMaps from "@/modules/subscription-management/composables/maps.js";
import {onMounted} from "vue";
import {latLng} from "leaflet";


const {
    zoom,
    center,
    url,
    points,
    attribution,
    getPoints,
    mapOptions,
    router,
    userPermissions,
    showMap,
} = useMaps()

onMounted(() => {
    getPoints();
    showMap.value = true;
});
</script>
