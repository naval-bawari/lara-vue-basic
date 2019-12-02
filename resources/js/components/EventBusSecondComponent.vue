<template>
    <div class="container">
       {{msg}}
       <br/>
       <button class="btn btn-warning" @click="updateInfo()">Event 2</button>
    </div>
</template>

<script>
    import EventBus from '../event/eventBus'
    export default {
       data(){
            return{
                msg:"Event 2",
            }
       },                
       methods:{
            updateData (payload) {
                this.msg = payload
            },           
            updateInfo(){
                this.msg="Event 2 Clicked";
                EventBus.$emit('DATA_PUBLISHED', "Event 2 Clicked")
            }
       },
        mounted () {
            EventBus.$on('DATA_PUBLISHED_', (payload) => {
                this.updateData(payload)
            })
        }
    }
</script>
