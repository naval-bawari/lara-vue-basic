
import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

let store = new Vuex.Store({
    modules: {
        user: require("./store/user").default,
    },
});

export default store;
