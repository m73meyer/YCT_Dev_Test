<template>
    <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
        {{ errors }}
    </div>
    <form class="space-y-6" v-on:submit.prevent="saveCustomer">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="customer.name">
                </div>
            </div>

            <div>
                <label for="document" class="block text-sm font-medium text-gray-700">Document</label>
                <div class="mt-1">
                    <input type="text" name="document" id="document"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="customer.document">
                </div>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <div class="mt-1">
                    <select class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" v-model="customer.status">
                        <option value="new">new</option>
                        <option value="active">active</option>
                        <option value="suspended">suspended</option>
                        <option value="cancelled">cancelled</option>
                    </select>
                </div>
            </div>
        </div>
        <br><br>
        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Save
        </button>
    </form>
</template>
<script>

    import useCustomers from "../../composables/customers";
    import { onMounted } from "vue";

    export default {
        props: {
            id: {
                required: true,
                type: String
            }
        },
        setup(props) {

            const { errors, customer, getCustomer, updateCustomer } = useCustomers()

            onMounted(getCustomer(props.id))

            const saveCustomer = async () => {
                await updateCustomer(props.id)
            }

            return {
                errors,
                customer,
                saveCustomer
            }
        }
    }
</script>