@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-inline-block">Tags</h1>
            </div>
        </div>
        <div class="columns">
            <div class="column is-one-third">
                <h3 class="title is-5">Add new Tag</h3>
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label for="tag_name" class="label">Name</label>
                        <p class="control">
                            <input type="text" class="input is-small" name="tag_name" value="{{ old('tag_name') }}">
                        </p>
                        @error('tag_name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                   

                    <hr class="m-t-30">

                    <div class="field">
                        <button type="submit" class="button is-primary button-narrow">Create tag</button>
                        <a href="{{ route('tags.index') }}" class="button is-light">Cancel</a>
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
                                    <th class="name">Number post use</th>
                                    <th class="action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->tag_name }}</td>
                                    <td>{{ $tag->tag_count }}</td>
                                    <td>
                                        <a href="{{ route('tags.edit', $tag->id) }}" class="button is-small">Edit</a>
                                        <a href="#" onclick="deleteTag({{ $tag->id }})" class="button is-small is-danger">Delete</a>
                                        <form id="tag-{{ $tag->id }}" action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display: none;">
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
        function deleteTag(tagID) {
            // alert(catID);
            document.getElementById('tag-'+tagID).submit()
        }
    </script>
@endpush