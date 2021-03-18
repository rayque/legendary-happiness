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
  data: () => ({
    recipies: [{
      title: "Greek Omelet with Feta",
      ingredients: ["eggs", "feta cheese", "garlic", "red onions", "spinach", "tomato", "water"],
      link: "http://www.kraftfoods.com/kf/recipes/greek-omelet-feta-104508.aspx",
      gif: "https://media.giphy.com/media/xBRhcST67lI2c/giphy.gif"
    }, {
      title: "Guacamole Dip Recipe",
      ingredients: ["avocado", "onions", "tomato"],
      link: "http://cookeatshare.com/recipes/guacamole-dip-2783",
      gif: "https://media.giphy.com/media/I3eVhMpz8hns4/giphy.gif"
    }
    ]
  })
}
</script>

<style scoped>

</style>
