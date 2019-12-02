<template>                
    <div>
        <el-col :span="8" class="mt-2">
            <el-card shadow="hover">
                <h5 class="card-title">{{postDetails.title}}</h5>
                <p class="card-text">{{postDetails.description}}</p>
                <a href="#" class="btn btn-danger"  style="float:right;margin-top: -78px;" @click="deletePost(postIndex)"><i class="el-icon-delete"></i></a>
            </el-card>
        </el-col>
    </div>
</template>

<script>
    export default {

        props: {
            postDetails: Object,
            postIndex: Number
        },
        data(){
            return{
                
            }
        },

        methods: {
            deletePost(index) {
                this.$emit('deleted', index)
            }
        }        
    }
</script>
