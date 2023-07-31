<template>
    <div>
        <h1>Edit Page</h1>
        <TaskFormFeature :details="details" @formSubmit="formSubmit"/>
    </div>
</template>

<script>
import axios from 'axios';
import {defineAsyncComponent} from 'vue';
const TaskFormFeature = defineAsyncComponent(() => import('../features/form/TaskFormFeature.vue'));

export default {
    name: 'CreatePage',

    components: {
        TaskFormFeature,
    },

    data() {
        return {
            id: this.$route.params.id,
            details: {},
        };
    },

    created() {
        axios.get('/tasks/' + this.id)
            .then(res => res.data.data)
            .then(body => {
                this.details = body;
            });
    },

    methods: {
        formSubmit(data) {
            axios.patch('/tasks/' + this.id, {
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

}
</script>
