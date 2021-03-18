import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);
const getDefaultState = () => {
    return {
        snackBar: {
            ativo: false,
            mensagem: '',
            color: '',
            timeout: 0
        },
    }
};

const state = getDefaultState();
const getters = {
    getSnackBar: state => state.snackBar,
};
const mutations = {
    enableSnackBar(state, dados) {
        console.log(dados);
        if (dados.mensagem !== "") {
            state.snackBar.mensagem = dados.mensagem;
            state.snackBar.color = dados.color;
            state.snackBar.timeout = dados.timeout;
            state.snackBar.ativo = dados.ativo;
        }
    },
    setActiveSnackBar(state, status) {
        state.snackBar.ativo = status;
    },
};
const actions = {};


export default new Vuex.Store({
    state,
    getters,
    mutations,
    actions
});
