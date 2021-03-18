import api from "./api";

class RecipieApi {
    async getRecipies(params) {
        const {data}  = await api.get(`recipies/?i=${params}`);
        return data;
    }
}
export default new RecipieApi();
