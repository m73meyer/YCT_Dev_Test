import axios from 'axios'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

export default function useNumbers() {
    const numbers = ref([])
    const number = ref([])
    const router = useRouter()
    const errors = ref('')

    const getNumber = async (idCustomer, id) => {
        let response = await axios.get( '/api/customer/'+idCustomer+'/numbers/' + id )
        number.value = response.data.data;
    }

    const getNumbers = async (idCustomer) => {
        let response = await axios.get( '/api/customer/'+idCustomer+'/numbers' )
        numbers.value = response.data.data;
    }

    const storeNumber = async (idCustomer, data) => {
        errors.value = ''
        try {
            await axios.post('/api/customer/'+idCustomer+'/numbers', data)
            await router.push({ name: 'numbers.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    const updateNumber = async (idCustomer, id) => {
        errors.value = ''
        try {
            await axios.patch('/api/customer/' +idCustomer+ '/numbers/' + id, number.value)
            await router.push({ name: 'numbers.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }        
    }

    const destroyNumber = async (idCustomer, id) => {
        await axios.delete('/api/customer/'+idCustomer+'/numbers/'+id)
    }

    return {
        numbers,
        number,
        errors,
        getNumber,
        getNumbers,
        destroyNumber,
        storeNumber,
        updateNumber
    }

}