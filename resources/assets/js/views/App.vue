<template>
    <div>
        <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--4dp">
            <div class="mdl-cell mdl-cell--12-col mdl-card">
                <div class="mdl-card__title">
                    <div class="mdl-selectfield mdl-selectfield--floating-label mdl-js-selectfield center text-center">
                        <select class="mdl-selectfield__select" name="group" id="group" v-model="app.groupId">
                            <option v-for="group in user.groups" :value="group.id">{{ group.name }}</option>
                        </select>
                        <label for="group" class="mdl-selectfield__label text-center">MI GRUPO</label>
                    </div>
                </div>
                <div class="mdl-card__supporting-text">
                    <div v-for="group in user.groups" v-if="group.id == app.groupId">
                        <div class="text-center">
                            <span>Dinero disponible:</span>
                            <br>
                            <span class="mdl-chip mdl-color-text--white" :class="classByMoney(group)" style="vertical-align:middle;">
                                <span class="mdl-chip__text"  style="font-size: 2rem;">{{ app.currency }} {{ group.total }}</span>
                            </span>
                        </div>
                        <ul class="mdl-list" v-for="item in group.items">
                            <list-item :item="item" :icon="'shopping_basket'" :currency="app.currency"></list-item>
                        </ul>
                    </div>
                </div>
                <!-- <div class="mdl-card__actions mdl-card--border text-center"></div> -->
            </div>
        </section>
        <router-link :to="{name:'item.create'}" class="floating-fab mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--accent"><i class="material-icons">add</i></router-link>
    </div>
</template>

<script>
    import User    from '../src/User'
    import ListItem from '../components/ListItem.vue'

    export default {
        name: 'app',
        // props: [
        //     'items'
        // ],
        data() {
            return Object.assign({
                item: {}
            }, User.info)
        },
        computed: {
            //
        },
        components: { ListItem },
        methods: {
            classByMoney(group) {
              console.log(group);
                return {
                    'mdl-color--green-A700': group.total > 0,
                    'mdl-color--red-A700': group.total < 0,
                }
            },
        },
        watch: { },
        created() {
            User.load(this);
        },
        updated() {
            console.log('updated');
            window.componentHandler.upgradeDom();
            //window.componentHandler.upgradeDom('MaterialSelectfield', 'mdl-js-selectfield');
        }
    }
</script>
