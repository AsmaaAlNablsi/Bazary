<template>
    <v-footer class="d-flex flex-column">
        <div class="d-flex w-100 align-center">
            <div class="px-4 text-center w-100">
                {{ new Date().getFullYear() }} <strong>Bazary</strong>
            </div>
        </div>
    </v-footer>
</template>
<script>
export default {
    name: 'app-footer',
    data: () => ({}),
}
</script>
