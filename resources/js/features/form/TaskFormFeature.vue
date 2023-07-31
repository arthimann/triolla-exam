<template>
    <v-form v-model="valid" @submit.prevent="handleFormSubmit">
        <v-text-field v-model="title" :rules="titleRules" :counter="255" label="First name" required/>
        <v-textarea counter v-model="description" :rules="descriptionRules" label="Label"/>
        <v-btn type="submit" variant="outlined" class="mt-5">Save</v-btn>
    </v-form>
</template>

<script>
export default {
    name: 'TaskFormFeature',
    props: [
        'details',
    ],

    data() {
        return {
            submitted: false,
            valid: false,
            title: '',
            description: '',
            titleRules: [
                v => !!v || 'Title is required',
                v => v.length > 0 && v.length <= 255 || 'Title must be grater than 0 and less than 255 characters',
            ],
            descriptionRules: [
                v => !!v || 'Description is required',
                v => v.length > 0 || 'Description cannot be empty',
            ],
        }
    },

    watch: {
        details(newValue) {
            this.title = newValue.title;
            this.description = newValue.description;
        },
    },

    methods: {
        /**
         * Handle form submit with data to parent component
         * */
        handleFormSubmit() {
            this.submitted = true;
            if (this.title && this.description) {
                this.$emit('formSubmit', {
                    title: this.title,
                    description: this.description,
                });
            }
        },
    },
};
</script>
