<template>
    <div>
        <section>
            <b-field>
                <b-taginput
                    v-model="tags"
                    ellipsis
                    icon="label"
                    placeholder="Add a tag">
                </b-taginput>
            </b-field>
        </section>
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
       
       }
    }
</script>
