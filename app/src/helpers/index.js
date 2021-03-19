import store from "./../store";
export const showMessage = (message, color, timeout) => {
    const snackbar = { message, color, timeout, active: true };
    store.commit("enableSnackBar", snackbar);
};
