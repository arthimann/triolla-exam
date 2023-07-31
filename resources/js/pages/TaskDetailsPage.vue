<template>
    <div>
        <LoaderComponent v-if="loading"/>
        <article v-else>
            <h1 class="text-h2">{{ details.title }}</h1>
            <p class="my-5 text-body-1">{{ details.description }}</p>

            <section>
                <v-btn @click="handleEdit" variant="outlined">Edit</v-btn>
            </section>
        </article>
    </div>
</template>

<script>
import axios from 'axios';
import {defineAsyncComponent} from 'vue';

const LoaderComponent = defineAsyncComponent(() => import('../components/treeshaking/LoaderComponent.vue'));

export default {
    name: 'TaskDetailsPage',

    components: {
        LoaderComponent,
    },

    data() {
        return {
            details: {},
            loading: true,
            id: this.$route.params.id,
        };
    },

    created() {
        axios.get('/tasks/' + this.id)
            .then(res => res.data.data)
            .then(body => {
                this.details = body;
                this.loading = false;
            })
            .catch(() => {
                this.loading = false;
                this.$router.push({
                    name: 'NotFoundPage',
                });
            });
    },

    methods: {
        handleEdit() {
            this.$router.push({
                name: 'EditPage',
                params: {
                    id: this.id,
                },
            });
        }
    },
}
</script>

