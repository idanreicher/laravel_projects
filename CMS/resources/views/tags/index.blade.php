@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-end mb-2">
<a href=" {{route('tags.create')}} " class="btn btn-success ">Add tag</a>
</div>

    <div class="card card-default">
        <div class="card">

            <div class="card-header">
                tags
            </div>
            <div class="card-body">
              @if($tags->count() > 0)
              <table class="table">
                <thead>
                   <th>Name</th>
                   <th>Tags count</th>
                   <th></th>
            </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                {{$tag->name}}
                            </td>

                            <td>
                                 {{ $tag->posts->count() }}

                            </td>
                            <td>
                                <a href="{{route('tags.edit' , $tag->id)}}" class="btn btn-info btn-sm">
                                        Edit
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" onclick="handelDelete({{$tag->id}})" data-toggle="modal" data-target="#exampleModal">
                                    Delete
                                </button>
                        </td>

                        </tr>
                    @endforeach
                </tbody>


            </table>
              @else
                  <h3>No Tags</h3>
              @endif


                <!-- Modal -->
            <form action="" method="POST" id="daletetagForm">
                @method('DELETE')
                @csrf
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete tag</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center text-bold">
                                    are you sure you want to delete {{$tag->name ?? ''}} ?
                                </p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">no</button>
                            <button type="submit" class="btn btn-danger">yes</button>
                            </div>
                        </div>
                        </div>
                    </div>



                </form>
                            </div>
                        </div>
                    </div>
@section('scripts')

                    <script>
                        function handelDelete(id){

                            let form = document.getElementById('daletetagForm');
                            form.action = '/tags/' + id;
                            $('#deleteModal').modal('show');

                        }
                    </script>

@endsection


@endsection
