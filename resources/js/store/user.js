export default {
    namespaced: true,
    state: {
        users:[],
        userDetails:{
            name:"",
            email:""
        }
    },
    getters: {
        users: state => {
            return state.users
        },
    },
    mutations: {
        GET_USERS(state, users) {
            state.users = users
        },
        GET_USER_DETAILS(state, user) {
            state.userDetails = user       
        },
        UPDATE_USER_DETAILS(state, user) {
            state.userDetails = user
        }        
    },
    actions: {

        GET_USERS({commit}) {
            axios.get('api/list-users')
                .then(function (response) {
                    commit('GET_USERS', response.data.data)
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .finally(function () {
                    // always executed
            });
        },
        GET_USER_DETAILS({commit}, index) {
            commit('GET_USER_DETAILS', this.state.user.users[index])
        },
        UPDATE_USER_DETAILS({commit}, id) {
            let index = _.findIndex(this.state.user.users, { 'id': id });
            this.state.user.users[index] = this.state.user.userDetails;            
        }                
    },
};