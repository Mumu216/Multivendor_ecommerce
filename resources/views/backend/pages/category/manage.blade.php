@extends('backend.layout.template');

@section('body-content')

<div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Manage All Categories</h4>
      <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
    </div>
  </div>


  <div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Category Table</h6>
          <div class="bd bd-gray-300 rounded ">
            <div class="row">
               <div class="col-lg-12">

                <table class="table table-bordered table-striped mg-b-0">
                    <thead class="thead-colored thead-dark">
                      <tr>
                        <th scope="col">#Sl</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category Title</th>
                        <th scope="col">[Primary / Secondary]</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                         @foreach($categories as $category)
                      <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>
                            @if(!empty($category->image))
                              <img src="{{ asset('backend/img/category/'  .  $category->image) }}"  width="30">
                            @else
                              No image found.
                            @endif
                        </td>
                        <td>{{ $category->title }}</td>
                        <td>
                            @if($category->is_parent == 0)
                            <span class="badge badge-i">Primary Category</span>
                            @endif
                        </td>

                        <td>
                            @if($category->status == 1)
                              <span class="badge badge-info">Active</span>
                            @elseif($category->status == 0)
                              <span class="badge badge-primary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-button">
                                <ul>
                                    <li><a href="{{ route('category.edit' , $category->id) }}"><i class="fa fa-edit"></i></a></li>
                                    <li><a href="" data-toggle="modal" data-target="#delete{{ $category->id }}"><i class="fa fa-trash"></i></a></li>
                                 </ul>
                                 <!-- Modal start -->

                                 <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this Category?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body text-center" >
                                        <div class="modal-buttons">
                                          <ul>
                                            <li>
                                              <form action="{{ route('category.destroy' , $category->id) }}" method="POST">
                                                @csrf
                                                <input type="submit" name="delete" class="btn btn-success" value="Confirm">
                                              </form>
                                            </li>
                                            <li><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                 <!-- Modal End -->


                            </div>
                        </td>
                    </tr>

                    <!-- Child categories start-->
                     @foreach(App\Models\Category::orderBy('title' , 'asc')->where('is_parent' , $category->id)->get() as $childCat)

                     <tr>
                        <th scope="row"></th>
                        <td>
                            @if(!empty($category->image))
                              <img src="{{ asset('backend/img/category/'  .  $childCat->image) }}"  width="30">
                            @else
                              No image found.
                            @endif
                        </td>
                        <td>{{ $childCat->title }}</td>
                        <td>
                            @if($childCat->is_parent == 0)
                            <span class="badge badge-i">Primary Category</span>
                            @endif
                        </td>

                        <td>
                            @if($childCat->status == 1)
                              <span class="badge badge-info">Active</span>
                            @elseif($childCat->status == 0)
                              <span class="badge badge-primary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-button">
                                <ul>
                                    <li><a href="{{ route('category.edit' , $childCat->id) }}"><i class="fa fa-edit"></i></a></li>
                                    <li><a href="" data-toggle="modal" data-target="#delete{{ $childCat->id }}"><i class="fa fa-trash"></i></a></li>
                                 </ul>
                                 <!-- Modal start -->

                                 <div class="modal fade" id="delete{{ $childCat->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this Category?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body text-center" >
                                        <div class="modal-buttons">
                                          <ul>
                                            <li>
                                              <form action="{{ route('category.destroy' , $childCat->id) }}" method="POST">
                                                @csrf
                                                <input type="submit" name="delete" class="btn btn-success" value="Confirm">
                                              </form>
                                            </li>
                                            <li><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                 <!-- Modal End -->


                            </div>
                        </td>
                    </td>
                     @endforeach
                    {{-- <!-- Child categories End --> --}}

                       @php $i++ ; @endphp
                       @endforeach
                    </tbody>
                      @if ( $categories->count() == 0)
                         <div class="alert alert-info">
                           No Category Found Yet. Please Add New Category.
                         </div>
                      @endif
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>




  @endsection
