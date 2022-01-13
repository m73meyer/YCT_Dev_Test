import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

export default function useNumberPreferences() {
    const numberPreferences = ref([])
    const numberPreference = ref([])
    const router = useRouter()
    const errors = ref('')

    const getNumberPreference = async (idCustomer, idNumber, id) => {
        let response = await axios.get( '/api/customer/'+idCustomer+'/number/' + idNumber + '/preferences/' + id)
        numberPreference.value = response.data.data;
    }

    const getNumberPreferences = async (idCustomer, idNumber) => {
        let response = await axios.get( '/api/customer/'+idCustomer+'/number/' + idNumber + '/preferences' )
        numberPreferences.value = response.data.data;
    }

    const storeNumberPreference = async (idCustomer, idNumber, data) => {
        errors.value = ''
        try {
            await axios.post('/api/customer/'+idCustomer+'/number/' + idNumber + '/preferences', data)
            await router.push({ name: 'numberPreferences.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const updateNumberPreference = async (idCustomer, idNumber, id) => {
        errors.value = ''
        try {
            await axios.patch('/api/customer/' +idCustomer+ '/number/' + idNumber + '/preferences/' + id, numberPreference.value)
            await router.push({ name: 'numberPreferences.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }        
    }

    const destroyNumberPreference = async (idCustomer, idNumber, id) => {
        await axios.delete('/api/customer/' + idCustomer + '/number/' + idNumber + '/preferences/' + id)
    }

    return {
        numberPreferences,
        numberPreference,
        errors,
        getNumberPreference,
        getNumberPreferences,
        destroyNumberPreference,
        storeNumberPreference,
        updateNumberPreference
    }

}