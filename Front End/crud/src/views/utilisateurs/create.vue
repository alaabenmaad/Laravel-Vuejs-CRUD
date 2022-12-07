<script setup>
    import { reactive } from 'vue';
    import useUtilisateurs from '../../comcosables/utilisateurs';

    const { storeUtilisateur, errors } = useUtilisateurs();

    const form = reactive({
        nom: "",
        prenom: ""
    })
</script>
<template>
    <div class="mt-12">
        <form class="max-w-md mx-auto p-4 bg-white shadow-md rounded" @submit.prevent="storeUtilisateur(form)">
            <div class="mb-6">
                <div class="mb-6">
                    <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre Nom</label>
                    <input type="text"
                    v-model="form.nom"
                    id="nom" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                
                    <div v-if="errors.nom">
                        <span class="text-sm text-red-400">{{errors.nom[0]}}</span>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="prenom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre Prenom</label>
                    <input type="text"
                     id="prenom"
                     v-model="form.prenom"
                     class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                     <div v-if="errors.nom">
                        <span class="text-sm text-red-400">{{errors.prenom[0]}}</span>
                    </div>
                </div>

                <div class="mt-4">
                    <button
                    type="submit"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded"> Ajouter</button>
                </div>

            </div>
        </form>
    </div>
</template>