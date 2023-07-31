<template>
    <div>
        <div v-if="!loader">
            <v-card v-if="tasksList?.length > 0">
                <v-list>
                    <ItemComponent v-for="(item, index) in tasksList" :key="index" :item="item"/>
                </v-list>
            </v-card>
            <v-row v-else justify="center">
                <v-col>
                    <v-alert color="info" variant="outlined">Seems like you don't have any tasks</v-alert>
                    <v-btn @click="handleCreateTask" variant="outlined" class="mt-3">Create Task</v-btn>
                </v-col>
            </v-row>
        </div>
        <LoaderComponent v-else />
    </div>
</template>

<script>
import axios from 'axios';
import { defineAsyncComponent } from 'vue';
const ItemComponent = defineAsyncComponent(() => import('../components/list/ItemComponent.vue'));
const LoaderComponent = defineAsyncComponent(() => import('../components/treeshaking/LoaderComponent.vue'));

export default {
    name: 'HomePage',

    components: {
        ItemComponent,
        LoaderComponent,
    },

    data() {
        return {
            tasksList: [],
            loader: true,
        }
    },

    created() {
        axios.get('tasks')
            .then(res => res.data.data)
            .then(body => {
                this.tasksList = body;
                this.loader = false;
            });
    },

    methods: {
        handleCreateTask() {
            this.$router.push({
                name: 'CreatePage',
            });
        }
    }
}
</script>
