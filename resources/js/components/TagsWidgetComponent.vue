<template>
    <div>
            <b-field>
                <b-taginput
                    v-model="tags"
                    ellipsis
                    icon="label"
                    placeholder="Add a tag"
                    :title="123"
                    v-on:keyup.native="alert()"
                    >
                </b-taginput>
            </b-field>
    </div>
</template>


<script>
    export default {
       props:{
           
       }, 
       data() {
           return{
            tags: [
                    'Auckland',
                    'Wellington',
                    'Very long string that would overflow'
                ]
            }
       
       }, 
       methods: {
           title () {
               return '123';
           },
           alert(){
               alert(1);
           }
       },
       watch: {

       }
    }
</script>
