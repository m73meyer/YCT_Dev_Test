<template>
      <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 cursor-pointer">
               <router-link :to="{ name: 'customers.create' }" class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">New customer</router-link>
            </div>
        </div>

        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 border">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Name</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 border">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Document</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 border">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Status</span>
                </th>
                <th class="px-6 py-3 bg-gray-50 border">
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-for="item in customers" :key="item.id">
                <tr class="bg-white">
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap border">
                        {{ item.name }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap border">
                        {{ item.document }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap border">
                        {{ item.status }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap border">
                        <router-link :to="{ name: 'numbers.index', params: { idCustomer: item.id } }"
                                     class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Numbers
                        </router-link>
                        <router-link :to="{ name: 'customers.edit', params: { id: item.id } }"
                                     class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </router-link>
                        <button @click="deleteCustomer(item.id)"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete</button>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>
<script>
    import useCustomers from "../../composables/customers";
    import { onMounted } from "vue";
    export default { 
        setup() {

            const { customers, getCustomers, destroyCustomer } = useCustomers()

            onMounted(getCustomers)

            const deleteCustomer = async (id) => {
                if (!window.confirm('Do you like delete customer: ' + id)) {
                    return;
                }
                await destroyCustomer(id);
                await getCustomers();
            }

            return { 
                customers,
                deleteCustomer
            }

        }
    }
</script>