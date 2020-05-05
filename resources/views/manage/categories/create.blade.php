@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-inline-block">Create new category</h1>
            </div>
        </div>
        <div class="columns">
            <div class="column is-one-third">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label for="cat_name" class="label">Name</label>
                        <p class="control">
                            <input type="text" class="input is-small" name="cat_name" value="{{ old('cat_name') }}">
                        </p>
                        @error('cat_name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="cat_slug" class="label">Slug</label>
                        <p class="control">
                            <input type="text" class="input  is-small" name="cat_slug" value="{{ old('cat_slug') }}">
                        </p>
                        @error('cat_slug')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label for="cat_description" class="label">Descriptions</label>
                        <p class="control">
                            <textarea name="cat_desc" id="cat_desc" cols="30" rows="5" class="textarea  is-small">{{ old('cat_desc') }}</textarea>
                        </p>
                    </div>
                    <div class="field m-b-20">
                        <label for="cat_parent" class="label">Category parent</label>
                        <div class="select is-small">
                            <select name="cat_parent">
                                <option value="0">{{ __('Empty') }}</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
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
                        <button type="submit" class="button is-primary button-narrow">Create category</button>
                        <a href="{{ route('categories.index') }}" class="button is-light">Cancel</a>
                    </div>
                </form>
            </div>
            <div class="column">
                <div class="wrap-content p-l-20 p-t-20">
                        <table class="table is-narow is-fullwidth is-bordered is-striped is-hoverable">
                            <thead>
                                <tr>
                                    <th class="id">ID</th>
                                    <th class="name">Name</th>
                                    <th class="action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $cat)
                                <tr>
                                    <td>{{ $cat->id }}</td>
                                    <td>{{ $cat->cat_name }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $cat->id) }}" class="button is-small">Edit</a>
                                        <a href="#" onclick="deleteCategory({{ $cat->id }})" class="button is-small is-danger">Delete</a>
                                        <form id="categories-{{ $cat->id }}" action="{{ route('categories.destroy', $cat->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function deleteCategory(catID) {
            // alert(catID);
            document.getElementById('categories-'+catID).submit()
        }
    </script>
@endpush