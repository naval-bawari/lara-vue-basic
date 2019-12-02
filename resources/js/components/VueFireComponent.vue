<template>
    <div class="container">
        <div class="row">
            <div class="col">
            <div class="container" style="padding-left: 0px;">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add Item</h3>
                            <el-alert v-if="isShow"
                                title="All fields are mandatory."
                                type="error"
                                :closable="false"
                                show-icon
                                effect="dark">
                            </el-alert>                         
                        </div>
                        <div class="card-body">
                            <el-form
                                 ref="item"
                                 :model="item"
                                 @submit.native.prevent
                                 :rules="rules"
                            >
                                <div class="form-group">
                                    <el-form-item label="Item Name" prop="name">
                                        <el-input placeholder="Please enter item name" v-model="item.name"></el-input>
                                    </el-form-item>  
                                </div>
                                <div class="form-group">
                                    <el-form-item label="Item Price" prop="price">
                                        <el-input placeholder="Please enter item price" v-model="item.price"></el-input>
                                    </el-form-item>                                    
                                </div>
                                <div class="form-group">
                                    <input :disabled='!isDisabled' type="submit" class="btn btn-success" value="Add Item" @click="addItem('item')"/>
                                    <button type="button" class="btn btn-secondary" @click="clearForm()">Clear</button>
                                    
                                    <button :disabled='isDisabled'  type="button" class="btn btn-info" @click="updateItem()" style="color: #fff;">Update</button>
                                </div>
                            </el-form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <el-table
                    :data="items"
                    style="width: 100%">
                    <el-table-column
                    label="Name"
                    width="180">
                    <template slot-scope="scope">
                        <i class="el-icon-s-cooperation"></i>
                        <span style="margin-left: 10px">{{ scope.row.name }}</span>
                    </template>
                    </el-table-column>
                    <el-table-column
                    label="Price"
                    width="180">
                    <template slot-scope="scope">
                        <span style="margin-left: 10px">{{ scope.row.price }}</span>
                    </template>
                    </el-table-column>
                    <el-table-column
                    label="Operations">
                    <template slot-scope="scope">
                        <el-button
                        size="mini"
                        @click="editItem(scope.row['.key'])">Edit</el-button>
                        <el-button
                        size="mini"
                        type="danger"
                        @click="deleteItem(scope.row['.key'])">Delete</el-button>
                    </template>
                    </el-table-column>
                </el-table>               
            </div>
        </div>            
    </div>
</template>

<script>
    import { db } from '../db/firebase';
    export default {
       data(){
           return{
               item:{
                   name:"",
                   price:""
               },
               items:[],
               isShow:false,
               key:"",
               rules: {
                    name: [
                        { required: true, message: 'Please enter iten name', trigger: 'blur' },
                        { min: 3, max: 15, message: 'Length should be 3 to 15', trigger: 'blur' }
                    ],
                    price: [
                        { required: true, message: 'Please enter item price', trigger: 'blur' }
                    ]
                },
                isDisabled: true             
           }
       },
        firebase: {
            items: db.ref('items')
        },
        methods: {
            addItem(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {

                            let vm = this;
                            vm.key=""; 
                            vm.$firebaseRefs.items.push({
                                name: vm.item.name,
                                price: vm.item.price
                            })
                            vm.key="";
                            this.isDisabled=true;
                            vm.item.name="";
                            vm.item.price="";
                            vm.$notify('Item Added Successfully!','success')  
                    } else {
                        return false;
                    }
                });      
            },
            deleteItem(key){
                
                let vm = this;
                vm.$confirm('Are you sure?', 'You want to delete!', function(){ 
                    vm.$firebaseRefs.items.child(key).remove();
                    vm.$notify('Item Deleted Successfully!','success')
                }, function(){})                
                
                 
            },
            editItem(key){
                this.key = key;
                this.isDisabled=false;
                db.ref('items/' + key).once('value', snapshot => {
                    const document = snapshot.val()
                    this.item = document
                })
            },
            clearForm(){
                this.item.name="";
                this.item.price="";   
                this.key=""; 
                this.isDisabled=true;     
                this.$refs['item'].resetFields();     
            },
            updateItem(){
                if(this.key=="")
                    return false;
                this.$firebaseRefs.items.child(this.key).set(this.item);
                this.key="";
                this.isDisabled=true;
                this.item.name="";
                this.item.price="";    
                let vm = this 
                vm.$notify('Item Updated Successfully!','success')
                      
            }                                     
        },
     
    }
</script>
