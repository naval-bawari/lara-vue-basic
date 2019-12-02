<template>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12" v-if="isShow">
                <input class="form-control" placeholder="Enter post title" v-model="post.title" />
                <textarea class="form-control" placeholder="Enter post description" v-model="post.description" ></textarea>
                <div class="post-action-div"> 
                    <button class="btn btn-success" @click="savePost()" >Save Post</button>
                    <button class="btn btn-secondary" @click="cancelPost()" >Cancel</button>
                </div>
            </div>

            <div class="col-md-12">
                <a href="javascript:;" class="btn btn-primary" @click="addPost()"><span class="glyphicon glyphicon-trash"><i class="el-icon-plus"></i> Add Post</span></a>
                <el-row :gutter="12">
                    <div v-for="(post, index) in postData" :key="index"> 
                        <post-data :postDetails="post" :postIndex="index" @deleted="deleted"></post-data>                     
                    </div>
                </el-row>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                isShow:false,
                post: {
                    title:"",
                    description:""
                },
                postData:[
                    {
                        title:"Debut Infotech",
                        description : "Here is the description"
                    },
                    {
                        title:"Debut Infotech 1",
                        description : "Here is the description 1"
                    },
                    {
                        title:"Debut Infotech 2",
                        description : "Here is the description 2"
                    },
                    {
                        title:"Debut Infotech 3",
                        description : "Here is the description 3"
                    }                                    
                ]
            }
        },
        methods: {

            addPost(){
                this.isShow=true;
            },
            savePost(){
                this.isShow=false;
                this.postData.push(this.post);
                this.post={};

            },
            cancelPost(){
                this.isShow=false;
            },
            deleted(index) {
                 this.postData.splice(index, 1);
            }
        }        
    }
</script>
<style scoped>
.form-control{
    margin-bottom: 10px;
}
.post-action-div{
    margin-bottom: 10px;
}
</style>
