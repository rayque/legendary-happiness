<template>
  <v-app id="app">
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
export default {
  data: () => ({
    links: [
      'Search',
      'Trending',
      'About us',
    ],
  }),
}
</script>
