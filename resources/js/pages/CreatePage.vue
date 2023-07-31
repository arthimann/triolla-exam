<template>
    <div>
        <h1>Create New Task</h1>
        <TaskFormFeature @formSubmit="formSubmit" class="mt-5" />
    </div>
</template>

<script>
import axios from 'axios';
import { defineAsyncComponent } from 'vue';
const TaskFormFeature = defineAsyncComponent(() => import('../features/form/TaskFormFeature.vue'));

export default {
    name: 'CreatePage',

    components: {
        TaskFormFeature,
    },

    methods: {
        formSubmit(data) {
            axios.post('/tasks', {
                title: data.title,
                description: data.description,
            })
                .then(res => res.data)
                .then(body => {
                    this.$router.push({
                        name: 'TaskDetailsPage',
                        params: {
                            id: body.id,
                        }
                    });
                });
        }
    },
};
</script>

