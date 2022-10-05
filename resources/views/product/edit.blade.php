@foreach ($product as $pd)
    {{-- MODAL EDIT --}}
    <div class="modal fade modal-borderless" id="modalEdit{{$pd->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="assets/images/samples/helix-hx5.jpeg" width="290px;" alt="">
                    </div>
                    <form action="{{ url('/product/update/' . $pd->id) }}" method="POST" enctype="multipart/form-data"
                        class="form form-horizontal">
                        @csrf
                        <div class="form-body">
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label>Product Name</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input type="text" class="form-control" value="{{$pd->name}}" name="name" placeholder="Product Name"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label>Category</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <select class="choices form-select" name="category" required>
                                        @foreach ($category as $ct)
                                            <option value="{{ $ct->id }} {{$product[0]->categorie_id === $ct->id ? 'selected' : ''}}">{{ $ct->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Unit</label>
                                </div>
                                <div class="col-md-5 mb-3 form-group">
                                    <input type="number" class="form-control" value="{{$pd->quantity}}" name="qty" placeholder="size"
                                        required>
                                </div>
                                <div class="col-md-3 mb-3 form-group">
                                    <select class="choices form-select" name="unit">>
                                        @foreach ($unit as $ut)
                                            <option value="{{ $ut->id }} {{$product[0]->unit_id === $ut->id ? 'selected' : ''}}">{{ $ut->unit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Product photo</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input class="form-control" name="image" type="file" id="formFile">
                                </div>
                                <div class="col-md-4">
                                    <label>Stock</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input type="number" class="form-control" value="{{$pd->stock}}" name="stock" placeholder="Stock"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label>Price</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <input type="text" class="form-control" value="{{$pd->price}}" name="price" placeholder="Price"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label>Description</label>
                                </div>
                                <div class="col-md-8 mb-3 form-group">
                                    <textarea class="form-control" value="{{$pd->description}}" name="description" placeholder="Desc" rows="3" required></textarea>
                                </div>
                                <div class="col-sm-12 mt-4 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="button" class="btn btn-secondary  me-1 mb-1"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
{{-- MODAL EDIT --}}
