<template>
  <v-snackbar v-model="active" :color="color" :timeout="timeout" right top>
    <span color="white">{{ message }}</span>
    <template v-slot:action="{ attrs }">
      <v-btn
          v-bind="attrs"
          :color="color"
          depressed
          @click="disableSnackbar"
      >
        Close
      </v-btn>
    </template>
  </v-snackbar>
</template>

<script>
export default {
  name: 'Snackbar',
  computed: {
    active: {
      get: function () {
        return this.$store.state.snackBar.active;
      },
      set: function () {
        this.$store.commit("setActiveSnackBar", false);
      }
    },
    color() {
      return this.$store.state.snackBar.color;
    },
    timeout() {
      return this.$store.state.snackBar.timeout;
    },
    message() {
      return this.$store.state.snackBar.message;
    }
  },
  methods: {
    disableSnackbar() {
      this.$store.commit("setActiveSnackBar", false);
    }
  }
};
</script>
