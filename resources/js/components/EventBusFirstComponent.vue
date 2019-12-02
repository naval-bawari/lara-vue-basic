<template>
    <div class="container">
       {{msg}}
       <br/>
        <button class="btn btn-success" @click="updateInfo()">Event 1</button>
    </div>
</template>

<script>

    import EventBus from '../event/eventBus'
    export default {
       data(){
           return{
               msg:"Event 1",
           }
       },
        methods: {
            updateData (payload) {
                this.msg = payload
            },
            updateInfo(){
                this.msg="Event 1 Clicked";
                EventBus.$emit('DATA_PUBLISHED_', "Event 1 Clicked")
            }                       
        },
        mounted () {
            EventBus.$on('DATA_PUBLISHED', (payload) => {
                this.updateData(payload)
            })
        }       
    }
</script>
