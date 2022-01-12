<template>
    <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
        {{ errors }}
    </div>
    <form class="space-y-6" v-on:submit.prevent="saveNumber">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Number</label>
                <div class="mt-1">
                    <input type="text" name="number.number" id="number.number"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="number.number">
                </div>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <div class="mt-1">
                    <select class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" v-model="number.status">
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
            Save
        </button>
    </form>
</template>
<script>

    import useNumbers from "../../composables/numbers";
    import { onMounted } from "vue";

    export default {
        props: {
            idCustomer: {
                required: true,
                type: String
            },
            id: {
                required: true,
                type: String
            }
        },
        setup(props) {

            const { errors, number, getNumber, updateNumber } = useNumbers()

            onMounted(getNumber(props.idCustomer, props.id))

            const saveNumber = async () => {
                await updateNumber(props.idCustomer, props.id)
            }

            return {
                errors,
                number,
                saveNumber
            }
        }
    }
</script>