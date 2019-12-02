<template>
    <div class="container">
    <el-form :inline="true" :model="userDetails" class="demo-form-inline" v-if="isShow" style="text-align: -webkit-center;">
    <el-form-item>
        <el-input v-model="userDetails.name" placeholder="Name"></el-input>
    </el-form-item>
    <el-form-item>
        <el-input v-model="userDetails.email" placeholder="Email"></el-input>
    </el-form-item>
    <el-form-item>
        <el-button type="primary" @click="updateDetails(userDetails.id)">Update</el-button>
    </el-form-item>
    <el-form-item>
        <el-button type="default" @click="cancelDetails()">Cancel</el-button>
    </el-form-item>
    </el-form> 
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">  
                    <template>
                        <el-table
                            :data="users"
                            height="530"
                            style="width: 100%">
                            <el-table-column
                            prop="name"
                            label="Name"
                            width="210px">
                            </el-table-column>
                            <el-table-column
                            prop="email"
                            label="Email"
                            width="210px">
                            </el-table-column>
                            <el-table-column label="Action" align="center" >
                                <template slot-scope="scope">
                                    <el-button
                                    size="mini"
                                    @click="getUserDetails(scope.$index)">Edit</el-button>
                                </template>
                            </el-table-column>
                        </el-table>
                    </template>                    
                </div>   
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                isShow: false
            }
        },
        mounted() {
            this.$store.dispatch('user/GET_USERS')
        },
        computed: {
            users: {
                get: function() {
                    return this.$store.state.user.users;
                }
            },
            userDetails: {
                get: function() {
                    return this.$store.state.user.userDetails;
                }
            }            
        },
        methods: {
            getUserDetails(index){
                this.$store.dispatch('user/GET_USER_DETAILS', index)
                this.isShow=true
            },
            updateDetails(id){
                this.$store.dispatch('user/UPDATE_USER_DETAILS', id)
                this.isShow=false;
            },
            cancelDetails(){
               this.isShow=false; 
            }
        }        
    }
</script>
