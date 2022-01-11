import { createRouter, createWebHistory } from "vue-router";

import CustomersIndex from '../components/customers/CustomersIndex';
import CustomersCreate from '../components/customers/CustomersCreate';
import CustomersEdit from '../components/customers/CustomersEdit';

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
        path: '/customers/numbers',
        name: 'customers.numbers',
        component: NumbersIndex
    }
]

export default createRouter( 
    {
    history: createWebHistory(),
    routes
})