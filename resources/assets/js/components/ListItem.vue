<template lang="html">
    <li class="mdl-list__item mdl-list__item--two-line mdl-shadow--2dp">
        <span class="mdl-list__item-primary-content">
            <i class="material-icons mdl-list__item-icon">{{ icon }}</i>
            <span><router-link :to="{ name:'item.edit', params:{id: item.id, item: item} }">{{ item.name }}</router-link></span>
            <span class="mdl-list__item-sub-title">{{ item.description }}</span>
        </span>
        <span class="mdl-list__item-secondary-content">
            <span class="mdl-chip mdl-color-text--white" :class="classByItem(item)">
                <span class="mdl-chip__text">{{ currency }} {{ item.amount }}</span>
            </span>
        </span>
    </li>
</template>

<script>
export default {
    name: 'list-item',
    props: [
        'item', 'icon', 'currency'
    ],
    data() {
        return {
        }
    },
    computed: {
        //
    },
    methods: {
        classByItem(item) {
            return {
                'mdl-color--green-400': item.type === true,
                'mdl-color--red-400': item.type === false,
            }
        }
    }
}
</script>
