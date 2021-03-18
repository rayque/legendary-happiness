<template>
  <v-app id="app">
    <snackbar />
    <v-app-bar
        app
        color="red"
        flat
    >
      <v-tabs
          centered
          class="ml-n9"
          color="white"
      >
        <v-tab
            v-for="link in links"
            :key="link"
        >
          {{ link }}
        </v-tab>
      </v-tabs>

    </v-app-bar>

    <v-main class="grey lighten-3">
      <v-container>

        <router-view/>

      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Snackbar from "./common/Snackbar";
export default {
  components: {Snackbar},
  data: () => ({
    links: [
      'Search',
      'Trending',
      'About us',
    ],
  }),
}
</script>
