<template>
    <div class="row">
        <h1><slot></slot></h1>
    </div>
</template>

<script>

    export default {
        name: 'home',
        // props: [
        //     'items'
        // ],
        data() {
            return {
                items: '',
                currentView: '',
                item: '',
            }
        },
        components: {
        },
        mounted() {

        },
        methods: {

        }
    }
</script>
