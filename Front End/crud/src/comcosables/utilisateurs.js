import { ref } from "vue";
import axios from "axios";
import { useRouter } from 'vue-router';

axios.defaults.baseURL = "http://127.0.0.1:8000/api/";

export default function useUtilisateurs() {

    const utilisateurs = ref([]);
    const utilisateur = ref([]);
    const errors = ref([]);
    const router = useRouter();

    const getUtilisateurs = async () => {
        const response = await axios.get("utilisateurs");
        utilisateurs.value = response.data.Utilisateurs;
    };

    const getUtilisateur = async (id) => {
        const response = await axios.get("utilisateurs/" + id);
        utilisateur.value = response.data.utilisateur;
    };

    const storeUtilisateur = async (data) => {
        try {
            await axios.post("utilisateurs", data);
            await router.push({name: "index"});
        } catch (error) {
            if(error.response.status === 422){
                errors.value = error.response.data.errors;
            }
        }
    };

    const updateUtilisateur = async (id) => {
        try {
            await axios.put("utilisateurs/" + id, utilisateur.value);
            await router.push({name: "index"});
        } catch (error) {
            if(error.response.status === 422){
                errors.value = error.response.data.errors;
            }
        }
    };

    const deleteUtilisateur = async (id) => {
        if (!window.confirm("Vous etes sur!")) {
            return;
        }
        await axios.delete("utilisateurs/" + id)
        await getUtilisateurs();
    }

    return {
        utilisateur,
        utilisateurs,
        getUtilisateur,
        getUtilisateurs,
        storeUtilisateur,
        updateUtilisateur,
        deleteUtilisateur,
        errors,
    }
}