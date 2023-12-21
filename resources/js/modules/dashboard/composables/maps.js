import {ref} from 'vue';
import useShared from "@/helpers/shared.js";
import RealEstatesService from "@/services/real-estates-service.js";
import {latLng} from "leaflet";

export default function useMaps() {
    const {
        errorHandle,
        router,
        userPermissions,
        form
    } = useShared()

    const points = ref([]);

    const zoom = 7;
    const center = latLng(34.8021, 38.9968);
    const attribution = '';
    const showMap = ref(false);
    const url = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    const mapOptions = {
        zoomSnap: 0.5,
        maxZoom: 18
    };
    const showMapVal = ref(false);

    const getPoints = async () => {
        try {
            const {data: {data}} = await RealEstatesService.positions();
            points.value = data;
        } catch (error) {
            errorHandle(error)
        }

    }

    function showMapModal() {
        showMapVal.value = true
    }

    function hideMapModal() {
        showMapVal.value = false
    }

    const setPoint = async (obj) => {
        form.latitude = obj.lat;
        form.longitude = obj.lng;
        showMapVal.value = false;
    }

    return {
        points,
        zoom,
        url,
        getPoints,
        center,
        mapOptions,
        showMap,
        showMapVal,
        showMapModal,
        hideMapModal,
        setPoint,
        attribution,
        router,
        userPermissions
    }
}
