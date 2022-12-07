<script setup>
    import useUtilisateurs from '../../comcosables/utilisateurs';
    import { onMounted } from 'vue';

    const { utilisateurs, getUtilisateurs, deleteUtilisateur } = useUtilisateurs();
    onMounted(()=> getUtilisateurs());
</script>
<template>
    <div class="mt-12">
       <div class="flex justify-end m-2 p-2">
            <RouterLink :to="{ name: 'create' }" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">
               Ajouter un utilisateur 
            </RouterLink>
       </div> 
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            #
                        </th>

                        <th scope="col" class="py-3 px-6">
                            Nom
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Prenom
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="u in utilisateurs" :key="u.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6">
                            {{ u.id }}
                        </td>

                        <td class="py-4 px-6">
                            {{ u.nom }}
                        </td>

                        <td class="py-4 px-6">
                            {{ u.prenom }}
                        </td>

                        <td class="py-4 px-6 space-x-2">
                            <RouterLink
                            :to="{name: 'edit',params:{id: u.id}}"
                            class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded"
                            >Editer</RouterLink>
                            <button @click="deleteUtilisateur(u.id)"
                            class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded">
                        Supprimer
                        </button>
                        </td>
                        
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>