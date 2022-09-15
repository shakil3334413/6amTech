@extends("layouts.master")

@section("title", "Product Page")
@section("content")
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card p-2 m-0">
                <div class="card-body">
                    <form id="addProduct" enct>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control rounded-pill" name="name" placeholder="Enter Product Name">
                                    <span class="error-name error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Product price <span class="text-danger">*</span></label>
                                    <input type="number" id="price" class="form-control rounded-pill" name="price" placeholder="Enter Price">
                                    <span class="error-price error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control rounded-pill" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    <span class="error-status error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Category Name <span class="text-danger">*</span></label>
                                    <select id="category_id" class="form-control rounded-pill" name="category_id">
                                        <option value="">Choose a category name</option>
                                        @foreach($data['category'] as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error-category_id error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="size_id">Variant</label>
                                    <select id="size_id" class="form-control rounded-pill" name="size_id">
                                        <option value="">Choose a variant</option>
                                        @foreach($data['variant'] as $item)
                                        <option value="{{$item->id}}">{{$item->size}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error-size_id error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-8 d-flex gap-3">
                                <img class="img-rounded border img" width="75" height="75">
                                <div class="form-group">
                                    <label for="image">Product Image</label>
                                    <input type="file" class="form-control rounded-pill" name="image" id="image" onchange="document.querySelector('.img').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>
                            <span class="error-image error text-danger"></span>

                            <div class="form-group text-center mt-2">
                                <button type="submit" class="btn btn-success px-3 text-white rounded-pill"><i class="mdi mdi-content-save"></i> Save</button>
                            </div>
                        </div>

                    </form>

                    <form id="updateProduct" class="d-none">
                        <input type="hidden" id="id" name="id">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control rounded-pill" name="name">
                                    <span class="error-name error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Product price <span class="text-danger">*</span></label>
                                    <input type="text" id="price" class="form-control rounded-pill" name="price">
                                    <span class="error-price error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control rounded-pill" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    <span class="error-status error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Category Name <span class="text-danger">*</span></label>
                                    <select id="category_id" class="form-control rounded-pill" name="category_id">
                                        <option value="">Choose a category name</option>
                                        @foreach($data['category'] as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error-category_id error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="size_id">Variant</label>
                                    <select id="size_id" class="form-control rounded-pill" name="size_id">
                                        <option value="">Choose a variant</option>
                                        @foreach($data['variant'] as $item)
                                        <option value="{{$item->id}}">{{$item->size}}</option>
                                        @endforeach
                                    </select>
                                    <span class="error-size_id error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-8 d-flex gap-3">
                                <img class="img-rounded image border imgs" width="75" height="75">
                                <div class="form-group">
                                    <label for="image">Product Image</label>
                                    <input type="file" class="form-control rounded-pill" name="image" onchange="document.querySelector('.imgs').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>
                            <span class="error-image error text-danger"></span>

                            <div class="form-group text-center mt-2">
                                <button type="submit" class="btn btn-primary px-3 text-white rounded-pill"><i class="mdi mdi-content-save"></i> Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex p-3 pb-0">
                        <div class="col-md-2 p-0 pe-1">
                            <div class="form-group">
                                <select name="ascdesc" id="ascdesc" class="form-control rounded-pill">
                                    <option value="">Select Asc or Desc</option>
                                    <option value="ASC">ASC</option>
                                    <option value="DESC">DESC</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 p-0">
                            <div class="form-group">
                                <select name="status" id="Status" class="form-control rounded-pill">
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 p-0 ps-1">
                            <input type="number" id="price1" class="form-control rounded-pill" placeholder="Enter Price">
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Sl</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Category Name</th>
                                <th class="text-center">Variant</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push("js")
<script>
    $(document).ready(() => {
        function getData() {
            $.ajax({
                url: "{{route('product.get')}}",
                method: "GET",
                dataType: "JSON",
                beforeSend: () => {
                    $("tbody").html("");
                },
                success: (response) => {
                    $.each(response, (index, value) => {
                        let row = `<tr>
                                <td class="text-center">${++index}</td>
                                <td class="text-center">${value.name}</td>
                                <td class="text-center">${value.category.name}</td>
                                <td class="text-center">${(value.variant)?value.variant.size:"null"}</td>
                                <td class="text-center">${value.price} <span class="fst-italic text-info">tk</span></td>
                                <td class="text-center">
                                    ${(value.status)=="active"?"<span class='text-success'>Active</span>":"<span class='text-danger'>Inactive</span>"}
                                </td>
                                <td class="text-center">
                                    <button value="${value.id}" type="button" class="btn btn-info btn-sm rounded-pill Edit">Edit</button>
                                    <button value="${value.id}" type="button" class="btn btn-danger btn-sm rounded-pill text-white Delete">Delete</button>
                                </td>
                              </tr>  `;

                        $("tbody").append(row)
                    })
                }
            })
        }
        getData();
        //add category
        $("#addProduct").on("submit", (event) => {
            event.preventDefault()
            var formdata = new FormData(event.target)
            $.ajax({
                url: "{{route('product.store')}}",
                method: "POST",
                dataType: "JSON",
                data: formdata,
                contentType: false,
                processData: false,
                beforeSend: () => {
                    $("#addProduct").find(".error").text("");
                },
                success: (response) => {
                    $("#addProduct").trigger("reset")
                    getData();
                    $(".img").attr("src", "");
                    alert(response);
                },
                error: (error) => {
                    $.each(error.responseJSON.errors, (index, value) => {
                        $("#addProduct").find(".error-" + index).text(value);
                    })
                }
            })
        })
        // edit product
        $(document).on("click", ".Edit", (event) => {
            $("#addProduct").addClass("d-none");
            $("#updateProduct").removeClass("d-none");

            $.ajax({
                url: "product/edit/" + event.target.value,
                method: "GET",
                dataType: "JSON",
                success: (response) => {
                    $.each(response, (index, value) => {
                        $("#updateProduct").find("#" + index).val(value);
                    })
                    $("#updateProduct").find(".image").attr("src", response.image);
                }
            })
        })
        // update product
        $("#updateProduct").on("submit", (event) => {
            event.preventDefault()
            var formdata = new FormData(event.target)
            $.ajax({
                url: "{{route('product.update')}}",
                method: "POST",
                dataType: "JSON",
                data: formdata,
                contentType: false,
                processData: false,
                beforeSend: () => {
                    $("#updateProduct").find(".error").text("");
                },
                success: (response) => {
                    $("#updateProduct").trigger("reset")
                    $("#updateProduct").addClass("d-none")
                    $("#addProduct").removeClass("d-none")
                    $("#addProduct").find(".error").text("");
                    $(".img").attr("src", "");
                    getData();
                    alert(response);
                },
                error: (error) => {
                    $.each(error.responseJSON.errors, (index, value) => {
                        $("#updateProduct").find(".error-" + index).text(value);
                    })
                }
            })
        })
        // delete product
        $(document).on("click", ".Delete", (event) => {
            if (confirm("Are you sure want to delete this data !")) {
                $.ajax({
                    url: "{{route('product.destroy')}}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        id: event.target.value
                    },
                    success: (response) => {
                        alert(response)
                        getData()
                    }
                })
            }
        })

        // filter product
        $(document).on("change", "#ascdesc", (event) => {
            var ascdesc = $("#ascdesc").val();
            if (event.target.value !== "") {
                $.ajax({
                    url: "{{route('product.filter')}}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        ascdesc: event.target.value
                    },
                    beforeSend: () => {
                        $("tbody").html("")
                    },
                    success: (response) => {
                        $.each(response, (index, value) => {
                            let row = `<tr>
                                <td class="text-center">${++index}</td>
                                <td class="text-center">${value.name}</td>
                                <td class="text-center">${value.category.name}</td>
                                <td class="text-center">${(value.variant)?value.variant.size:"null"}</td>
                                <td class="text-center">${value.price} <span class="fst-italic text-info">tk</span></td>
                                <td class="text-center">
                                    ${(value.status)=="active"?"<span class='text-success'>Active</span>":"<span class='text-danger'>Inactive</span>"}
                                </td>
                                <td class="text-center">
                                    <button value="${value.id}" type="button" class="btn btn-info btn-sm rounded-pill Edit">Edit</button>
                                    <button value="${value.id}" type="button" class="btn btn-danger btn-sm rounded-pill text-white Delete">Delete</button>
                                </td>
                              </tr>  `;

                            $("tbody").append(row)
                        })
                    }
                })
            }
        })
        $(document).on("change", "#Status", (event) => {
            if (event.target.value !== "") {
                $.ajax({
                    url: "{{route('product.filter')}}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        status: event.target.value
                    },
                    beforeSend: () => {
                        $("tbody").html("")
                    },
                    success: (response) => {
                        $.each(response, (index, value) => {
                            let row = `<tr>
                                    <td class="text-center">${++index}</td>
                                    <td class="text-center">${value.name}</td>
                                    <td class="text-center">${value.category.name}</td>
                                    <td class="text-center">${(value.variant)?value.variant.size:"null"}</td>
                                    <td class="text-center">${value.price} <span class="fst-italic text-info">tk</span></td>
                                    <td class="text-center">
                                        ${(value.status)=="active"?"<span class='text-success'>Active</span>":"<span class='text-danger'>Inactive</span>"}
                                    </td>
                                    <td class="text-center">
                                        <button value="${value.id}" type="button" class="btn btn-info btn-sm rounded-pill Edit">Edit</button>
                                        <button value="${value.id}" type="button" class="btn btn-danger btn-sm rounded-pill text-white Delete">Delete</button>
                                    </td>
                                  </tr>  `;

                            $("tbody").append(row)
                        })
                    }
                })
            }
        })
        $(document).on("input", "#price1", (event) => {
            $.ajax({
                url: "{{route('product.filter')}}",
                method: "POST",
                dataType: "JSON",
                data: {
                    price: event.target.value
                },
                beforeSend: () => {
                    $("tbody").html("")
                },
                success: (response) => {
                    $.each(response, (index, value) => {
                        let row = `<tr>
                                        <td class="text-center">${++index}</td>
                                        <td class="text-center">${value.name}</td>
                                        <td class="text-center">${value.category.name}</td>
                                        <td class="text-center">${(value.variant)?value.variant.size:"null"}</td>
                                        <td class="text-center">${value.price} <span class="fst-italic text-info">tk</span></td>
                                        <td class="text-center">
                                            ${(value.status)=="active"?"<span class='text-success'>Active</span>":"<span class='text-danger'>Inactive</span>"}
                                        </td>
                                        <td class="text-center">
                                            <button value="${value.id}" type="button" class="btn btn-info btn-sm rounded-pill Edit">Edit</button>
                                            <button value="${value.id}" type="button" class="btn btn-danger btn-sm rounded-pill text-white Delete">Delete</button>
                                        </td>
                                      </tr>  `;

                        $("tbody").append(row)
                    })
                }
            })
        })
    })
</script>
@endpush