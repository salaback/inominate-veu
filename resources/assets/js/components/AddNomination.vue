<template>
  <div>
      <b-form @submit="onSubmit" @reset="onReset" id="addNominationForm">
        <b-form-group id="nameGroup"
                      label="Name:"
                      label-for="name">
          <b-form-input id="name"
                        type="text"
                        v-model="nomination.name"
                        required
                        placeholder="John Smith">
          </b-form-input>
        </b-form-group>
        <b-form-group id="emailGroup"
                      label="Email:"
                      label-for="email">
          <b-form-input id="name"
                        type="email"
                        v-model="nomination.email"
                        required
                        placeholder="john.smith@gmail.com">
          </b-form-input>
        </b-form-group>
        <b-form-group id="officeGroup"
                      label="Office:"
                      label-for="office">
          <b-form-input id="office"
                        type="text"
                        v-model="nomination.office"
                        required
                        placeholder="U.S. Representative">
          </b-form-input>
        </b-form-group>
        <b-form-group id="districtGroup"
                      label="District:"
                      label-for="district">
          <b-form-input id="district"
                        type="text"
                        v-model="nomination.district"
                        required
                        placeholder="California, 7th District">
          </b-form-input>
        </b-form-group>
      </b-form>
        <b-button type="submit" variant="primary" @click="onSubmit">Submit Nomination</b-button>
        <b-button type="reset" variant="danger" @click="onReset">Reset</b-button>
  </div>
</template>

<script>

    import { validationMixin } from "vuelidate"
    import { required, minLength } from "vuelidate/lib/validators"

    export default {

        data() {
            return {
                nomination: {
                    name: null,
                    office: null,
                    email: null,
                    district: null,
                    id: null
                },
                activeNominations: this.$parent.activeNominations

            }
        },
        mixins: [
            validationMixin
        ],
        methods: {
            onSubmit(evt) {
                evt.preventDefault();
                axios.post('/app/nominations', this.nomination)
                    .then((response) => {this.nomination.id = response});
                this.activeNominations.push(this.nomination);
                this.$refs.addNomRef.hide(),
                this.clearForm()
            },
            onReset(evt) {
                evt.preventDefault();

                this.clearForm();

                /* Trick to reset/clear native browser form validation state */
                this.show = false;
                this.$nextTick(() => {
                    this.show = true
                });
            },
        },
        validations: {
            name: {
                required,
                maxLength: 100
            },
            email: {
                required,

            }
        }

    }
</script>

<style scoped>

</style>