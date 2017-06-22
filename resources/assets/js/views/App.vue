<template>
<div>
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--4dp">
        <div class="mdl-cell mdl-cell--12-col mdl-card">
                <div class="mdl-card__title">
                    <div class="mdl-selectfield mdl-selectfield--floating-label mdl-js-selectfield center text-center">
                        <select class="mdl-selectfield__select" name="group" id="group" v-model="app.groupId">
                            <option v-for="group in user.groups" :value="group.id">{{ group.name }}</option>
                        </select>
                        <label for="item__type" class="mdl-selectfield__label text-center">MI GRUPO</label>
                    </div>
                </div>
                <div class="mdl-card__supporting-text">
                    <div v-for="group in user.groups" v-if="group.id == app.groupId">
                        <div class="text-center">
                          <span>Dinero disponible:</span>
                          <span class="mdl-chip mdl-color-text--white" :class="classByMoney(group)" style="vertical-align:middle;">
                              <span class="mdl-chip__text text-success"  style="font-size: 2rem;">S/. {{ group.total }}</span>
                          </span>
                        </div>
                        <ul class="mdl-list" v-for="item in group.items">
                            <li class="mdl-list__item mdl-list__item--two-line mdl-shadow--2dp">
                                <span class="mdl-list__item-primary-content">
                                    <i class="material-icons mdl-list__item-icon">shopping_basket</i>
                                    <span><a href="#">{{ item.name }}</a></span>
                                    <span class="mdl-list__item-sub-title">{{ item.description }}</span>
                                </span>
                                <span class="mdl-list__item-secondary-content">
                                    <span class="mdl-chip mdl-color-text--white" :class="classByItem(item)">
                                        <span class="mdl-chip__text">S/. {{ item.amount }}</span>
                                    </span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="mdl-card__actions mdl-card--border text-center"></div> -->
            </div>
    </section>
    <a href="#" class="floating-fab mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--accent">
      <i class="material-icons">add</i>
    </a>
</div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: 'app',
        // props: [
        //     'items'
        // ],
        data() {
            return {
                app: {
                    groupId: null,
                },
                user: {},
                groups: {},
                errors: [],
            }
        },
        computed() {
            return {

            }
        },
        components: {
        },
        mounted() {
            axios.get('/api/v1/me').then(response => {
                console.log(response)
                this.user = response.data
                response.data.groups.forEach((item, index) => {
                    this.groups[item.id] = item;
                })
            }).catch(e => {
                this.errors.push(e)
            })
        },
        methods: {
            classByMoney(group) {
                return {
                    'mdl-color--green-A700': group.total > 0,
                    'mdl-color--red-A700': group.total < 0,
                }
            },
            classByItem(item) {
                return {
                    'mdl-color--green-400': item.type,
                    'mdl-color--red-400': !item.type,
                }
            }
        },
        watch() {

        }
    }
</script>
