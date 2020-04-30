<style scoped>
    .slug-widget, 
    .wrapper{
        display: flex;
        display: -webkit-flex;
        align-items: center;
    }
    .icon-wraper{
        margin-right: 5px
    }
    .button-wrapper .button{
        margin-left: 10px;
    }
    .slug{
        background-color: #ddebf9;
        text-overflow: ellipsis;
        -webkit-line-clamp: 1;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

</style>
<template>
    <div class="slug-widget m-b-30">
        <div class="icon icon-wraper">
            <span><i class="fa fa-link"></i></span>
        </div>

       <div class="url-wrapper wrapper">
            <span class="root">{{url}}</span>
            <span class="subdirectory">/{{subdirectory}}/</span>
            <span class="slug" v-show="slug && !isEditing">{{slug}}</span>
            <input type="text" class="input is-small" v-show="isEditing" v-model="customSlug">
         
       </div>

       <div class="button-wrapper wrapper">
            <button class="button is-small" type="button" v-show="!isEditing" @click="editSlug">Edit</button>
            <button class="button is-small" type="button" v-show="isEditing" @click="saveSlug">Save</button>
            <button class="button is-small" type="button" v-show="isEditing" @click="resetSlug">Reset</button>
       </div>
       
    </div>
</template>

<script>
    export default {
        props:{
            url: {
                type: String,
                required: true
            },
            subdirectory:{
                type: String,
                required: true
            },
            title: {
                type: String,
                required: true
            },
            oldslug: {
                type: String,
            }
        },
        data () {
            return {
                slug: this.oldslug,
                isEditing: false, 
                customSlug: '',
                wasEdited: false,
                api_token: this.$root.api_token,
            }
        },
        methods:{
            editSlug: function() {
                this.customSlug = this.slug;
                this.isEditing = true;
            },
            saveSlug: function(){
                if(this.customSlug !== this.slug){
                    this.wasEdited = true;
                }
                this.slug = Slug(this.customSlug);
                this.isEditing = false;
            },
            resetSlug: function(){
                if(this.wasEdited === true){
                    this.slug = this.setSlug(this.title);
                    this.customSlug = '';
                    this.isEditing = false;
                    this.wasEdited = false;
                }
            },
           setSlug: function(newVal, count = 0){
               //slugify the newval
                let slug = Slug(newVal + (count > 0 ? `-${count}` : ''));
                let vm = this;
               
               //test to see if unique
               if(this.api_token){
                    axios.get('http://localhost/DvBlog/api/posts/unique',{
                        params:{
                            api_token: vm.api_token,
                            post_slug: slug
                        }
                    }).then(function(response){
                        
                        if(response.data && slug !== vm.oldslug ){
                             //if not customize the slug to make it unique and test agian
                             
                            vm.setSlug(newVal, count+1)
                            vm.slug = slug

                        }else{
                               //if unique, then set the slug and emit event
                            vm.slug = slug;
                            vm.$emit('slug-changed', vm.slug);
                        }
                    }).catch(function(error){
                        console.log(error)
                    })
                }
           }
        },
        watch: {
            title: _.debounce(function(){
                if(this.wasEdited === false){
                    this.slug = this.setSlug(this.title);
                }
            }, 500),
          
        }
    }
</script>
