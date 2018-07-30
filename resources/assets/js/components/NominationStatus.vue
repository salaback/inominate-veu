<template>
    <div class="card" v-if="nomination != null">
        <div class="card-header">
            {{ nomination.name }}
        </div>
    </div>
</template>

<script>
    export default {
        data: {
          nomination: this.previewNomination
        },
        name: "NominationStatus"
    }
</script>

<style scoped>

</style>