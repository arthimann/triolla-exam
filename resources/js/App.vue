<template>
    <v-app>
        <TopnavComponent/>
        <v-main>
            <v-container>
                <v-row justify="center">
                    <v-col cols="6">
                        <router-view/>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
</template>

<script>

import TopnavComponent from './layout/TopnavComponent.vue';

export default {
    name: 'App',

    components: {
        TopnavComponent,
    }
}
</script>
