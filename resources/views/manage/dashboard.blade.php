@extends('layouts.manage')

@section('content')
    
    <div class="flex-container">
        <div class="collumns">
            <div class="collumn">
                <div class="card m-t-100">
                    <div class="card-content">
                        <h1 class="title">Dashboard</h1>
                    </div>
                </div>
               
              
                {{-- {{ Auth::user()->name }} --}}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {

            }
        })
    </script>
@endpush