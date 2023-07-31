<template>
    <v-list-item @click="handleOpenTask">
        <span>{{ item.title }}</span>

        <template v-slot:append>
            <v-avatar color="amber">
                <strong>{{ item.priority }}</strong>
            </v-avatar>
        </template>
    </v-list-item>
</template>

<script>
export default {
    name: 'ItemComponent',
    props: [
        'item'
    ],

    methods: {
        handleOpenTask() {
            this.$router.push({
                name: 'TaskDetailsPage',
                params: {
                    id: this.item.id,
                },
            });
        },
    },
};
</script>
