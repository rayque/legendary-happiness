import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);
const getDefaultState = () => {
    return {
        snackBar: {
            active: false,
            message: '',
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
        if (dados.message !== "") {
            state.snackBar.message = dados.message;
            state.snackBar.color = dados.color;
            state.snackBar.timeout = dados.timeout;
            state.snackBar.active = dados.active;
        }
    },
    setActiveSnackBar(state, status) {
        state.snackBar.active = status;
    },
};
const actions = {};


export default new Vuex.Store({
    state,
    getters,
    mutations,
    actions
});
