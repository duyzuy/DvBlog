@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-inline-block">Edit</h1>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="field">
                        <label for="cat_name" class="label">Name</label>
                        <p class="control">
                            <input type="text" class="input is-small" name="cat_name" value="{{ $category->cat_name }}">
                        </p>
                        @error('cat_name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="cat_slug" class="label">Slug</label>
                        <p class="control">
                            <input type="text" class="input  is-small" name="cat_slug" value="{{ $category->cat_slug }}">
                        </p>
                        @error('cat_slug')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label for="cat_description" class="label">Descriptions</label>
                        <p class="control">
                            <textarea name="cat_desc" id="cat_desc" cols="30" rows="5" class="textarea  is-small">{{ $category->cat_description }}</textarea>
                        </p>
                    </div>
                    <div class="field">
                        <label for="cat_parent" class="label">Category parent</label>
                        <div class="select is-small">
                            <select name="cat_parent">
                                <option value="0">{{ __('Empty') }}</option>
                                @foreach($categories as $cat)
                                <option value="{{ $category->id }}" {{ ($cat->id === $category->cat_parent) ? 'selected' : '' }}>{{ $cat->cat_name }}</option>
                                @endforeach
                              </select>
                        </div>
                        @error('cat_parent')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <div class="content post-featured-image">
                            <h4 class="title is-5">Featured image</h4>
                            <figure class="image is-4by3" style="margin: 0 0 20px">
                                <img src="{{ asset('/images/1280x960.png') }}" alt="Placeholder image">
                            </figure>
                            <div class="file is-small">
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
                    </div>

                    <hr class="m-t-30">

                    <div class="field">
                        <button type="submit" class="button is-primary button-narrow">Update</button>
                        <a href="{{ route('categories.index') }}" class="button is-light">Cancel</a>
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
              
            }
        })
    </script>
@endpush