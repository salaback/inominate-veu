

<template>
    <div>
        <div class="card">
            <div class="card-header">Active Nominations New</div>

            <div class="card-body">
                <add-nomination></add-nomination>
            </div>

            <div class="card-body">
                <div class="list-group">
                    <div class="list-group-item nomination" v-for="nomination in activeNominations">
                        <div class="name">{{ nomination.name }}</div>
                        <div class="nominationInfo">
                            <span class="office">{{nomination.office}}</span> -
                            <span class="district">{{nomination.district}}</span>
                        </div>
                        <div class="nominationCount">{{nomination.count}} {{ nomination.count > 1 ? 'Nominations' : 'Nomination'}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                addNomination: this.$parent.addNomination,
                activeNominations: this.$parent.activeNominations
            }
        },
        name: "ActiveNominations",
    }

</script>

<style scoped>

</style>