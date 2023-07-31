<template>
    <v-app-bar color="blue-grey-darken-4">
        <v-btn @click="handleHomepage">Home Page</v-btn>
        <v-btn @click="handleCreateTask">Create New Task</v-btn>
    </v-app-bar>
</template>

<script>
export default {
    name: 'TopnavComponent',

    methods: {
        handleHomepage () {
            this.$router.push({
                name: 'HomePage',
            });
        },

        handleCreateTask () {
            this.$router.push({
                name: 'CreatePage',
            });
        },
    },
};
</script>
