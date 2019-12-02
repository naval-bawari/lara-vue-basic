<template>
    <div class="container">
        <button href="javascript:;" class="btn btn-success" @click="clickedMixins()">Mixins Click</button>
        <button class="btn btn-primary" @click="clickedComponent()">Component Click</button>
        <br/>
        {{msg}}
    </div>
</template>

<script>
    import Mixins from '../mixins/mixins'
    export default {
        mixins: [Mixins],
        data(){
            return {
                msg:""
            }            
        },
        methods: {
            clickedComponent() {
                this.msg="This is Component Click"
            }
        }        
    }
</script>
