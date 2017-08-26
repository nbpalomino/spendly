<template lang="html">
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--4dp">
        <div class="app-item-form mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">NUEVO REGISTRO</h2>
            </div>
            <form action="#" method="POST">
                <div class="mdl-card__supporting-text text-center">
                    <div class="mdl-selectfield mdl-selectfield--floating-label mdl-js-selectfield">
                      <select class="mdl-selectfield__select" name="group" id="item__group" >
                          <option v-for="group in user.groups" :value="group.id">{{group.name}}</option>
                      </select>
                      <label for="item__group" class="mdl-selectfield__label">GRUPO</label>
                    </div>
                    <br>
                    <div class="mdl-selectfield mdl-selectfield--floating-label mdl-js-selectfield">
                        <select class="mdl-selectfield__select" name="type" id="item__type" required>
                          <option value="0" selected>EGRESO</option>
                          <option value="1">INGRESO</option>
                        </select>
                        <label for="item__type" class="mdl-selectfield__label">TIPO</label>
                        <span class="mdl-selectfield__error">Ingrese el tipo</span>
                    </div>
                    <br>
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                        <input type="text" id="item__name" name="name" class="mdl-textfield__input" required>
                        <label for="item__name" class="mdl-textfield__label">TITULO</label>
                        <span class="mdl-textfield__error">Ingrese el nombre</span>
                    </div>
                    <br>
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                        <textarea id="item__description" name="description" class="mdl-textfield__input"></textarea>
                        <label for="item__description" class="mdl-textfield__label">DESCRIPCIÓN</label>
                        <span class="mdl-textfield__error">Ingrese la descripción</span>
                    </div>
                    <br>
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                        <input type="number" id="item__amount" name="amount" class="mdl-textfield__input" required step="0.01" min="0">
                        <label for="item__amount" class="mdl-textfield__label">CANTIDAD S/.</label>
                        <span class="mdl-textfield__error">Ingrese la cantidad</span>
                    </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <input type="submit" @click="save" value="Guardar" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                </div>
            </form>
        </div>
    </section>
</template>

<script>
    "use strict";
    import axios from 'axios'
    import User from '../src/User'
    import router from '../src/router'

    export default {
        props: ['item'],
        data() {
            return Object.assign({

            }, User.info)
        },
        methods: {
            save(event) {
                let vm      = this;
                let form    = new FormData(document.querySelector('form'));

                axios.post('/items', form).then((res) => {
                    console.dir(res);
                    if('success' === res.data.status) {
                        router.push({name:'index'});
                    } else {
                        alert('Pew pew...')
                    }
                }).catch((e) => {
                    vm.errors.push(e)
                })
                event.preventDefault();
            }
        },
        created() {
            if(window.user) {
                this.user = window.user;
            } else {
                User.load(this);
            }
        },
        mounted() {
            console.dir(window.user);
            window.componentHandler.upgradeDom()
        }
    }
</script>
