<template>
  <v-snackbar right top vertical v-model="ativo" :color="color" :timeout="timeout">
    {{ mensagem }}
    <v-btn dark :color="color" @click="disableSnackbar">Fechar</v-btn>
  </v-snackbar>
</template>

<script>
export default {
  name: 'Snackbar',
  computed: {
    ativo: {
      get: function() {
        return this.$store.state.snackBar.ativo;
      },
      set: function() {
        this.$store.commit("setActiveSnackBar", false);
      }
    },
    color() {
      return this.$store.state.snackBar.color;
    },
    timeout() {
      return this.$store.state.snackBar.timeout;
    },
    mensagem() {
      return this.$store.state.snackBar.mensagem;
    }
  },
  methods: {
    disableSnackbar() {
      this.$store.commit("setActiveSnackBar", false);
    }
  }
};
</script>
