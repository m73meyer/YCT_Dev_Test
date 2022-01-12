import { createRouter, createWebHistory } from "vue-router";

import CustomersIndex from '../components/customers/CustomersIndex';
import CustomersCreate from '../components/customers/CustomersCreate';
import CustomersEdit from '../components/customers/CustomersEdit';
import NumbersIndex from '../components/numbers/NumbersIndex';
import NumbersCreate from '../components/numbers/NumbersCreate';
import NumbersEdit from '../components/numbers/NumbersEdit';
import NumberPreferencesIndex from '../components/numberPreferences/NumberPreferencesIndex';
import NumberPreferencesCreate from '../components/numberPreferences/NumberPreferencesCreate';
import NumberPreferencesEdit from '../components/numberPreferences/NumberPreferencesEdit';

const routes = [
    {
        path: '/customers',
        name: 'customers.index',
        component: CustomersIndex
    },
    {
        path: '/customers/create',
        name: 'customers.create',
        component: CustomersCreate
    },
    {
        path: '/customers/:id/edit',
        name: 'customers.edit',
        component: CustomersEdit,
        props: true
    },
    {
        path: '/customer/:idCustomer/numbers',
        name: 'numbers.index',
        component: NumbersIndex,
        props: true
    },
    {
        path: '/customer/:idCustomer/numbers/create',
        name: 'numbers.create',
        component: NumbersCreate,
        props: true
    },
    {
        path: '/customer/:idCustomer/numbers/:id/edit',
        name: 'numbers.edit',
        component: NumbersEdit,
        props: true
    },
    {
        path: '/customer/:idCustomer/number/:idNumber/preferences',
        name: 'numberPreferences.index',
        component: NumberPreferencesIndex,
        props: true
    },
    {
        path: '/customer/:idCustomer/number/:idNumber/preferences/create',
        name: 'numberPreferences.create',
        component: NumberPreferencesCreate,
        props: true
    },
    {
        path: '/customer/:idCustomer/number/:idNumber/preference/:id/edit',
        name: 'numberPreferences.edit',
        component: NumberPreferencesEdit,
        props: true
    }
]

export default createRouter( 
    {
    history: createWebHistory(),
    routes
})