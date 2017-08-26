"use strict";
import axios from 'axios'
import Vue from 'vue'

export default {
    load(vm) {
        axios.get('/api/v1/me').then((response) => {
            console.log(response);
            window.user = vm.user = response.data;
            vm.user.groups.forEach((item, index) => {
                vm.groups[item.id] = item;
            });
        }).catch((e) => {
            vm.errors.push(e)
        })
    },
    info: {
        app: {
            groupId: 1,
            currency: '$'
        },
        user: {},
        groups: {},
        errors: []
    }
}