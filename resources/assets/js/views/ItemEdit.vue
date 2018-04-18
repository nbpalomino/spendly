<template lang="html">
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--4dp">
        <div class="app-item-form mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">NUEVO REGISTRO</h2>
            </div>
            <form action="#" method="POST">
                <div class="mdl-card__supporting-text text-center">
                    <div class="mdl-selectfield mdl-selectfield--floating-label mdl-js-selectfield">
                        <select class="mdl-selectfield__select" name="group" id="group" v-model="app.groupId">
                            <option v-for="group in user.groups" :value="group.id" selected>{{ group.name }}</option>
                        </select>
                        <label for="group" class="mdl-selectfield__label text-center">MI GRUPO</label>
                    </div>
                    <br>
                    <div class="mdl-selectfield mdl-selectfield--floating-label mdl-js-selectfield">
                        <select class="mdl-selectfield__select" name="type" id="item__type" required>
                          <option value=""></option>
                          <option value="0">EGRESO</option>
                          <option value="1">INGRESO</option>
                        </select>
                        <label for="item__type" class="mdl-selectfield__label">TIPO</label>
                        <span class="mdl-selectfield__error">Ingrese el tipo</span>
                    </div>
                    <br>
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                        <input type="text" id="item__name" name="name" :value="item.name" class="mdl-textfield__input" required>
                        <label for="item__name" class="mdl-textfield__label">TITULO</label>
                        <span class="mdl-textfield__error">Ingrese el nombre</span>
                    </div>
                    <br>
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                        <textarea id="item__description" name="description" class="mdl-textfield__input">{{ item.description }}</textarea>
                        <label for="item__description" class="mdl-textfield__label">DESCRIPCIÓN</label>
                        <span class="mdl-textfield__error">Ingrese la descripción</span>
                    </div>
                    <br>
                    <div class="mdl-textfield mdl-textfield--floating-label mdl-js-textfield">
                        <input type="number" id="item__amount" name="amount" :value="item.amount" class="mdl-textfield__input" required step="0.01" min="0">
                        <label for="item__amount" class="mdl-textfield__label">CANTIDAD S/.</label>
                        <span class="mdl-textfield__error">Ingrese la cantidad</span>
                    </div>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <input type="submit" value="Guardar" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    <input type="button" value="Borrar" v-on:click="borrarItem(item)" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--secondary">
                </div>
            </form>
        </div>
    </section>
</template>

<script>
import User from '../src/User'
import axios from 'axios'

export default {
    props: ['id','item'],
    watch: { },
    data() {
        return Object.assign({
            //item: {}
        }, User.info)
    },
    computed: {
        //--
    },
    methods: {
        borrarItem(item) {
            alert(item.name + ' sera borrado');
            axios.delete('/items/'+this.id).then((response) => {
                console.dir(response);
                //window.user = vm.user = response.data;
                //this.item = response.data;
            }).catch((e) => {
                this.errors.push(e)
            })
        }
    },
    created() {
        User.load(this);
        axios.get('/items/'+this.id).then((response) => {
            console.log(response);
            //window.user = vm.user = response.data;
            this.item = response.data;
        }).catch((e) => {
            this.errors.push(e)
        })
    },
    updated() {
        console.log('Item Edit');
        //console.dir(Vue.$user);
        window.componentHandler.upgradeDom();
    }
}
</script>
