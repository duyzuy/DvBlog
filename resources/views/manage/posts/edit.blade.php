@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-inline-block">Edit post</h1>
                {{-- <a href="{{ route('posts.create') }}" class="button is-primary is-pulled-right"><i class="fa fa-plus m-r-10"></i>Create new post</a> --}}
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <form action="{{ route('posts.update', $post->id) }}" method="POST" class="form">
                    @csrf
                    @method('PUT')
                    <div class="columns">
                        <div class="column is-three-quarters content-area">
                            <div class="card no-shadow">
                                <div class="card-content">
                                    <b-field>
                                        <b-input type="text" placeholder="Post title" v-model="title" name="post_title" value="{{ $post->post_title }}"></b-input>
                                    </b-field>
                                    
                                    <slug-widget 
                                        url="{{ url('/') }}" 
                                        subdirectory="post" 
                                        :title="title"
                                        @slug-changed="updateSlug"
                                        >
                                    </slug-widget>

                                   <input type="hidden" v-model="slug" name="post_slug" class="input">
                                   
                                   <b-field class="m-b-50">
                                        <b-input type="textarea" name="post_content" rows="25" value="{{ $post->post_content }}"></b-input>
                                    </b-field>

                                     
                                    <b-field label="Post excerpt">
                                        <b-input type="textarea" name="post_excerpt" rows="5" value="{{ $post->post_excerpt }}"></b-input>
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
                                          <p class="title is-6">{{ $post->author->name }}</p>
                                          <p class="subtitle is-7">{{ $post->author->email }}</p>
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
                                        <figure class="image is-4by3" style="margin: 0 0 20px">
                                            <img src="{{ asset('/images/1280x960.png') }}" alt="Placeholder image">
                                        </figure>
                                        <div class="file">
                                            <label class="file-label">
                                              <input class="file-input" type="file" name="post_image">
                                              <span class="file-cta">
                                                <span class="file-label">
                                                  Choose image
                                                </span>
                                              </span>
                                            </label>
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
    <script>
        const app = new Vue({
            el: '#app', 
            data: {
                post_status: '{{ $post->post_status }}',
                commentStatus: '{{ $post->comment_status }}',
                categorySelected: {!! $post->categories()->pluck('id') !!},
                title: '{{ $post->post_title }}',
                slug: '{{ $post->post_slug }}',
                tagSelected: {!! $post->tags()->pluck('tag_id') !!}
            },
            methods:{
                updateSlug: function(val){
                    this.slug = val
                }
            }
           

        })
    </script>
@endpush