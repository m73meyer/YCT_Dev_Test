<template>
      <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 cursor-pointer">
               <router-link :to="{ name: 'numberPreferences.create', params: { idCustomer: idCustomer } }" class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">New Number Preference</router-link> 
            </div>
        </div>
        <div> 
            Customer: {{customer.name}}
        </div>
        <br>
        <div> 
            Number: {{number.number}}
        </div>
        <br>
        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 border">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Number</span>
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
            <template v-for="item in numberPreferences" :key="item.id">
                <tr class="bg-white">
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap border">
                        {{ item.name }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap border">
                        {{ item.value }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap border">
                        <router-link :to="{ name: 'numberPreferences.edit', params: { idCustomer: idCustomer, idNumber: idNumber, id: item.id } }"
                                     class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </router-link>
                        <button @click="deleteNumberPreference(item.id)"
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
    import useNumbers from "../../composables/numbers";
    import useCustomers from "../../composables/customers";
    import useNumberPreferences from "../../composables/numberPreferences";
    import { onMounted } from "vue";

    export default { 
        props: {
            idCustomer: {
                required: true,
                type: String
            },
            idNumber: {
                required: true,
                type: String
            }

        },
        setup(props) {

            const { numberPreferences, getNumberPreferences, destroyNumberPreference } = useNumberPreferences()
            const { number, getNumber } = useNumbers()
            const { customer, getCustomer } = useCustomers()
           
            onMounted(() => {
                getNumber(props.idCustomer, props.idNumber)
                getCustomer(props.idCustomer)
                getNumberPreferences(props.idCustomer, props.idNumber);
            })

            const deleteNumberPreference = async (id) => {
                if (!window.confirm('Do you like delete number: ' + id)) {
                    return;
                }
                await destroyNumberPreference(props.idCustomer, props.idNumber, id);
                await getNumberPreferences(props.idCustomer, props.idNumber);
            }

            let idCustomer = props.idCustomer
            let idNumber   = props.idNumber

            return { 
                idCustomer,
                idNumber,
                numberPreferences,
                number,
                customer,
                deleteNumberPreference
            }

        }
    }
</script>