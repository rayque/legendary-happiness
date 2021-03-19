<template>
  <div>

    <v-row>
      <v-col
          cols="12"
          sm="2"
      >
        <v-sheet
            min-height="268"
            rounded="lg"
        >
          <div class="headline pa-5 red--text">
            The best ingredients
          </div>
        </v-sheet>
      </v-col>

      <v-col
          cols="12"
          sm="8"
      >
        <v-sheet
            class="pl-3 pr-4"
            min-height="70vh"
            rounded="lg"
        >

          <div class="text-center pa-5">
            <h2>Enter the ingredients for your recipe</h2>
            <h3>Write from 1 to 3 ingredients</h3>
          </div>

          <v-row>
            <v-col
                cols="12"
                sm="8">

              <v-text-field
                  v-model="ingredient"
                  clearable
                  label="Ingredient"
                  outlined
                  :disabled="disableForm"
                  @keyup.enter="addItem"
              ></v-text-field>

            </v-col>

            <v-col
                cols="12"
                sm="2">
              <v-btn
                  :disabled="disableForm"
                  block
                  depressed
                  class="ma-2"
                  color="orange"
                  dark
                  @click="addItem"
              >
                Add Item
              </v-btn>
            </v-col>

            <v-col
                cols="12"
                sm="2">
              <v-btn
                  :disabled="disableSearchButton"
                  block
                  depressed
                  class="ma-2"
                  color="success"
                  dark
                  :loading="loading"
                  @click="search"
              >
                Search
              </v-btn>
            </v-col>
          </v-row>

          <v-row>
            <v-col
                cols="12"
                sm="12"
            >
              <v-chip-group>
                <v-chip v-for="(ingredient, index) in ingredients" :key="index"
                     color="success" @click="removeItem(index)"
                >
                  <span class="pr-2"> {{ingredient}} </span>
                  <v-icon> mdi-close </v-icon>
                </v-chip>
              </v-chip-group>
            </v-col>
          </v-row>


          <v-row>
            <v-col
                cols="12"
                sm="12"
            >
              <recipies-list :recipies="recipiesList" />
            </v-col>
          </v-row>

        </v-sheet>
      </v-col>

      <v-col
          cols="12"
          sm="2"
      >
        <v-sheet
            min-height="268"
            rounded="lg"
        >
          <div class="headline align-center center pa-5 red--text">
            The best recipes
          </div>
        </v-sheet>
      </v-col>
    </v-row>


  </div>
</template>

<script>
import RecipiesList from "../components/Recipies/RecipiesList";
import RecipiesApi from "../services/RecipiesApi";

export default {
  name: 'Home',
  components: {RecipiesList},
  data: () => ({
    loading: false,
    ingredient: null,
    ingredients: [],
    disableForm: false,
    disableSearchButton: true,
    recipiesList: [],
  }),
  methods: {
    search() {
      this.loading = true;
      RecipiesApi.getRecipies(this.ingredients.toString())
      .then(res => {
        this.recipiesList = res.recipies;
        this.loading = false;
      }).catch(e => {
        const{message} = e.response.data;
        this.loading = false;
        this.Helper.showMessage(message, 'error', 4000);
      })
    },
    addItem() {
      if (this.ingredient) {
        this.ingredients.push(this.ingredient);
        this.ingredient = null;
      }
    },
    removeItem(index){
      if (this.ingredients.indexOf(index) === -1) {
        this.ingredients.splice(index, 1);
      }
    }
  },
  watch: {
    ingredients(val) {
        this.disableForm = val.length >= 3;
        this.disableSearchButton = val.length < 1;
    }
  },
}
</script>
