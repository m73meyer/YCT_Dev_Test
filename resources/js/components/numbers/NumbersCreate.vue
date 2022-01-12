<template>
    <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
        {{ errors }}
    </div>
    <div> 
        Customer: {{customer.name}}
    </div>
    <form class="space-y-6" @submit.prevent="saveNumber">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="number" class="block text-sm font-medium text-gray-700">Number</label>
                <div class="mt-1">
                    <input type="text" name="number" id="number"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.number">
                </div>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <div class="mt-1">
                    <select class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="status" id="status" v-model="form.status">
                        <option value="active">active</option>
                        <option value="inactive">inactive</option>
                        <option value="cancelled">cancelled</option>
                    </select>
                </div>
            </div>
        </div>
        <br><br>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Create
        </button>
    </form>
</template>
<script>
import { reactive, onMounted } from "vue";

import useCustomers from "../../composables/customers";
import useNumbers from '../../composables/numbers';

export default {
    props: {
        idCustomer: {
            required: true,
            type: String
        }
    },
    setup(props) {
        const form = reactive({
            'id_customer': '',
            'number': '',
            'status': '',
        })

        const { customer, getCustomer } = useCustomers()
        const { errors, storeNumber } = useNumbers()

        onMounted(getCustomer(props.idCustomer))


        const saveNumber = async () => {
            await storeNumber(props.idCustomer, {...form});
        }

        return {
            customer,
            form,
            errors,
            saveNumber
        }
    }
}
</script>