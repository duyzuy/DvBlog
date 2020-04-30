@extends('layouts.manage')

@section('content')
    <div class="flex-container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-inline-block">Blog posts</h1>
                <a href="{{ route('posts.create') }}" class="button is-primary is-pulled-right"><i class="fa fa-plus m-r-10"></i>Create new post</a>
            </div>
        </div>
        <div class="card no-shadow">
            <div class="card-content">
                <table class="table is-striped is-fullwidth">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Categories</th>
                            <th>Status</th>
                            <th>Publish at</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>
                                @if(isset($post->image->url))
                              
                                @php
                                    $image = @json_decode($post->image->url); // reuturn stdClass Object
                                    // $image = @json_decode($post->image->url, true); // reuturn Array
                                @endphp
                                    @if($image->thumbnail !== null)
                                        <img src="{{ $image->thumbnail }}" width="60" height="60" />
                                    @else
                                        <img src="{{ asset('images/96x96.png') }}" width="60" height="60" />
                                    @endif
                                @else
                                    <img src="{{ asset('images/96x96.png') }}" width="60" height="60" />
                                
                                @endif
                            </td>
                            <td>{{ $post->post_title }}</td>
                            <td>
                                @foreach($post->categories as $cat)
                                <span class="tag is-link is-light">{{ $cat->cat_name }}</span>
                                @endforeach

                            </td>
                            <td>{{ $post->post_status }}</td>
                            <td> {{ date('M j, Y h:ia', strtotime($post->published_at))}}</td>
                            <td>
                                <a href="{{ route('posts.edit', $post->id) }}" class="button is-small">Edit</a>
                                <a href="#" onclick="deletePost({{ $post->id }})" class="button is-small is-danger">Delete</a>
                                <form id="posts-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                </td>

                            {{-- {!! Helper::week_date_selectbox(null, 'name') !!} --}}
                        </tr>
                        @endforeach
                       
                    </tbody>

                </table>
               
            </div>
           
        </div>
        <div class="page-paginations m-t-20">
            {{ $posts->links() }}
        </div>
    </div>    

@endsection

@push('scripts')
<script>
    function deletePost(postID) {
        // alert(catID);
        document.getElementById('posts-'+postID).submit()
    }
</script>
@endpush