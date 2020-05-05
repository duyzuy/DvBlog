@extends('layouts.manage')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/plugin/ckeditor.css') }}">
@endpush
@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-inline-block">Add a new post</h1>
                {{-- <a href="{{ route('posts.create') }}" class="button is-primary is-pulled-right"><i class="fa fa-plus m-r-10"></i>Create new post</a> --}}
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <form action="{{ route('posts.store') }}" method="POST" class="form" enctype="multipart/form-data">
                    @csrf
                    <div class="columns">
                        <div class="column is-three-quarters content-area">
                            <div class="card no-shadow">
                                <div class="card-content">
                                    <b-field>
                                        <b-input type="text" placeholder="Post title" v-model="title" name="post_title"></b-input>
                                    </b-field>
                                    
                                    <slug-widget 
                                        url="{{ url('/') }}" 
                                        subdirectory="post" 
                                        :title="title"
                                        @slug-changed="updateSlug"
                                        >
                                    </slug-widget>

                                   <input type="hidden" :value="slug" name="post_slug" class="input">
                                   
                                   <b-field class="m-b-50">
                                        <b-input id="postContentEditor" type="textarea" name="post_content" rows="25" value="{{ old('post_content') }}"></b-input>
                                    </b-field>
                                
                                     
                                    <b-field label="Post excerpt">
                                        <b-input type="textarea" name="post_excerpt" rows="5" value="{{ old('post_excerpt') }}"></b-input>
                                    </b-field>
                
                                </div>
                            </div>
                           
                        </div>

                        <div class="column is-one-quarters widget-area">
                            <div class="card no-shadow">
                                <div class="card-content">
                                    <div class="media post-author">
                                        <div class="media-left">
                                          <figure class="image is-48x48">
                                            <img src="{{ asset('/images/96x96.png')}}" alt="Placeholder image">
                                          </figure>
                                        </div>
                                        <div class="media-content">
                                          <p class="title is-6">{{ Auth::user()->name }}</p>
                                          <p class="subtitle is-7">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                    <hr class="m-t-10 m-b-10">
                                    <div class="content post-status">
                                        <h4 class="title is-5">Posts status</h4>
                                        <p>
                                            <input type="hidden" name="post_status" :value="post_status" class="input hidden">
                                            <p class="field m-b-5">
                                                <b-radio v-model="post_status" native-value="publish">Publish</b-radio>
                                            </p>
                                            <p class="field m-b-5">
                                                <b-radio v-model="post_status" native-value="draft">Draft</b-radio>
                                            </p>
                                            
                                            <p class="field m-b-5">
                                                <b-radio v-model="post_status" native-value="private">Protect by password</b-radio>
                                            </p>
                                        </p>
                                    </div>

                                    <hr class="m-t-10 m-b-10">
                                    <div class="content">
                                        <button type="submit" class="button is-primary button-narrow">Publish</button>
                                        <a href="#" class="button is-light">Save Draft</a>
                                    </div>

                                    <hr class="m-t-10 m-b-10">
                                    <div class="content post-categories">
                                        <h4 class="title is-5">Categories</h4>
                                   
                                        <div class="fields">
                                            @foreach($categories as $cat)
                                            <p class="field"><b-checkbox v-model="categorySelected" native-value="{{ $cat->id }}">{{ $cat->cat_name }}</b-checkbox></p>
                                            @endforeach
                                             @error('post_category')
                                                 <p class="help is-danger">{{ $message }}</p>
                                             @enderror
                                            <input type="hidden" name="post_categories" :value="categorySelected" class="input">
                                       
                                        </div>
                                    </div>
                                    <hr class="m-t-10 m-b-10">
                                    <div class="content post-tags">
                                        <h4 class="title is-5">Tags</h4>
                                        {{-- <tags-widget></tags-widget> --}}
                                        <div class="fields">
                                        @foreach($tags as $tag)
                                            <p class="field"><b-checkbox v-model="tagSelected" native-value="{{ $tag->id }}">{{ $tag->tag_name }}</b-checkbox></p>
                                        @endforeach
                                        @error('post_tags')
                                            <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                        <input type="hidden" name="post_tags" :value="tagSelected" class="input">
                                        </div>
                                    </div>

                                    <hr class="m-t-10 m-b-10">
                                    <div class="content post-featured-image">
                                        <h4 class="title is-5">Featured image</h4>
                                        <figure id="img_preview" class="image" style="margin: 0 0 20px"></figure>
                                       
                                            <div class="field">
                                                <span class="input-group-btn">
                                                  <a id="lfm_image" data-input="post_thumbnail" data-original="post_original" data-preview="img_preview" class="button is-small">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                  </a>
                                                </span>
                                                <input id="post_thumbnail" class="input" type="hidden" name="post_image[thumbnail]">
                                                <input id="post_original" class="input" type="hidden" name="post_image[original]">
                                              </div>
                                    </div>

                                    <hr class="m-t-10 m-b-10">
                                    <div class="content post-comment-status">
                                        <h4 class="title is-5">Comments</h4>
                                       <input type="hidden" class="input" :value="commentStatus" name="comment_status">
                                        <p class="field"><b-checkbox v-model="commentStatus" true-value="open" false-value="closed">Comment is allowed</b-checkbox>
                                        </p>    
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                  
                </form>
            </div>
        </div>
       
    </div>    

@endsection

@push('scripts')
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('plugins/ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
   
    <script>
        const app = new Vue({
            el: '#app', 
            data: {
                post_status: '{{ old("post_status") ? old("post_status") : "publish" }}',
                commentStatus: '{{ old("comment_status") ? old("comment_status") : "open" }}',
                categorySelected: [],
                title: '{{ old('post_title') }}',
                slug: '{{ old('post_slug') }}',
                api_token: '{{ Auth::user()->api_token }}',
                tagSelected: [],
            },
            methods:{
                updateSlug: function(val){
                    this.slug = val
                }
            }
           

        })
    </script>
      <script>
        if(document.getElementById("postContentEditor")){
           
            var options = {
                filebrowserImageBrowseUrl: '{{ url("/") }}/filemanager?type=Images',
                filebrowserImageUploadUrl: '{{ url("/") }}/filemanager?upload?type=Images&_token=',
                filebrowserBrowseUrl: '{{ url("/") }}/filemanager?type=Files',
                filebrowserUploadUrl: '{{ url("/") }}/filemanager?upload?type=Files&_token=',
           
            };
            CKEDITOR.replace("postContentEditor", options);
            CKEDITOR.config.height = 680;
            CKEDITOR.config.removePlugins = 'resize';
           
        }
      
        var lfm = function(id, type, options) {
            
        let button = document.getElementById(id);

        button.addEventListener('click', function () {
            var route_prefix = (options && options.prefix) ? options.prefix : '/Dvblog/filemanager';
            var target_input = document.getElementById(button.getAttribute('data-input'));
            var target_original = document.getElementById(button.getAttribute('data-original'));
            var target_preview = document.getElementById(button.getAttribute('data-preview'));

            window.open(route_prefix + '?type=' + type || 'file', 'FileManager', 'width=900,height=600');
            
            window.SetUrl = function (items) {
                
                var file_path = items.map(function (item) {
                    return item.url;

                }).join(',');
            
           
                // set the value of the desired input to image url
                // target_input.value = file_thumbnail;
                // target_original.value = file_path;
                target_input.dispatchEvent(new Event('change'));

                // clear previous preview
                target_preview.innerHTML = '';
            
                // set or change the preview image src
                items.forEach(function (item) {
                    let img = document.createElement('img')
                    target_input.value = item.thumb_url;
                    target_original.value = item.url;
                    // img.setAttribute('style', 'height: 5rem')
                    img.setAttribute('src', item.thumb_url)
                    target_preview.appendChild(img);
                    console.log(item)
                });
                // trigger change event
                target_preview.dispatchEvent(new Event('change'));
            };
        });
    }
        var route_prefix = "/Dvblog/filemanager";
        lfm('lfm_image', 'image', {prefix: route_prefix});

    </script>
    
@endpush