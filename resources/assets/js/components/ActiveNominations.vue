<template>
    <div>
        <div class="card">
            <div class="card-header">Active Nominations</div>

            <div class="card-body">
                <div class="btn btn-primary col-sm-12" @click="addNomination = true">
                    Add Nomination
                </div>
            </div>

            <div class="card-body">

                <div class="list-group">
                    <div class="list-group-item nomination" v-for="nomination in nominations">
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
                addNomination: app.addNomination,
                nominations: [
                    {
                        name: 'John Doe',
                        office: 'President',
                        district: 'United States of America',
                        count: 5
                    },
                    {
                        name: 'John The Second',
                        office: 'U.S. Senator',
                        district: 'Montana',
                        count: 1
                    }
                ]
            }
        },
        name: "ActiveNominations"
    }
</script>

<style scoped>

</style>