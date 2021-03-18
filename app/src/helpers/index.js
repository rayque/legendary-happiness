import store from "./../store";
export const showMessage = (mensagem, color, timeout) => {
    mensagem = mensagem.replace("GraphQL error: ", "");

    const snackbar = { mensagem, color, timeout, ativo: true };
    store.commit("enableSnackBar", snackbar);
};
