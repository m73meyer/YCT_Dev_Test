<template>
    <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
        {{ errors }}
    </div>
    <div> 
        Customer: {{customer.name}}
    </div>
    <div> 
        Number: {{number.number}}
    </div>
    <form class="space-y-6" @submit.prevent="saveNumberPreference">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.name">
                </div>
            </div>
            <div>
                <label for="value" class="block text-sm font-medium text-gray-700">Value</label>
                <div class="mt-1">
                    <input type="text" name="value" id="value"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.value">
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
import useNumbers from "../../composables/numbers";
import useCustomers from "../../composables/customers";
import useNumberPreferences from "../../composables/numberPreferences";

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
        const form = reactive({
            'name': '',
            'value': ''
        })

        const { errors, numberPreferences, getNumberPreferences, storeNumberPreference } = useNumberPreferences()
        const { number, getNumber } = useNumbers()
        const { customer, getCustomer } = useCustomers()
        
        onMounted(() => {
            getNumber(props.idCustomer, props.idNumber)
            getCustomer(props.idCustomer)
            getNumberPreferences(props.idCustomer, props.idNumber);
        })


        const saveNumberPreference = async () => {
            await storeNumberPreference(props.idCustomer, props.idNumber, {...form});
        }

        return {
            customer,
            number,
            form,
            errors,
            saveNumberPreference
        }
    }
}
</script>