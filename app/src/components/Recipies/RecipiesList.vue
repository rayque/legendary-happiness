<template>
  <div>
    <v-row>
      <v-col
          cols="12"
          sm="6"
          v-for="(recipie, index) in recipies" :key="index"
      >
        <v-card
                class="mx-auto my-12"
                max-width="374"
        >
          <v-img
              :src="recipie.gif"
              height="100"
          ></v-img>

          <v-card-title>{{ recipie.title }}</v-card-title>

          <v-card-text>
            <v-chip-group column>
              <v-chip v-for="(ingredient, i) in recipie.ingredients" :key="i">
                {{ ingredient }}
              </v-chip>
            </v-chip-group>
          </v-card-text>

          <v-card-actions>
            <v-btn color="primary" block>
              Read recipie
            </v-btn>
          </v-card-actions>
        </v-card>

      </v-col>
    </v-row>


  </div>
</template>

<script>
export default {
  name: "RecipiesList",
  props: ['recipies'],
}
</script>

<style scoped>

</style>
