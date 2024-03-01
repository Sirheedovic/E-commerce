<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
    @include('admin.css')

    <style>
        .c_center{
        text-align: center;
        padding-top: 40px
      }
      .text_font{
        font-size: 20px;
        padding-bottom: 40px;
      }

      label{
        display: inline-block;
        width: 200px
      }
      input{
        display: inline-block;
        width: 200px
      }
      .v-design{
        padding-bottom: 15px;

      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->

        @include('admin.navbar')
        <!-- partial -->
       {{-- @include('admin.body') --}}
       <div class="main-panel">
        <div class="content-wrapper">
            <div class="c_center">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" aria-hidden="true" data-dismiss="alert" class="close">x</button>
                        {{ session()->get('message') }}
                    </div>
                    
                @endif
                <h2 class="text_font">Edit</h2>

            

              <form action="{{ url('/confirm_update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="v-design">
                    <label>Product Title:</label>
                    <input type="text" placeholder="write a title..." name="title" required="" value="{{ $product->title }}">

                </div>
                <div class="v-design">
                    <label>Product Description:</label>
                    <input type="text" placeholder="write a description.." name="description" required="" value="{{ $product->description }}">

                </div>
                <div class="v-design">
                    <label>Product Price:</label>
                    <input type="number" placeholder="write a price..." name="price" required="" value="{{ $product->price }}">

                </div>
                <div class="v-design">  
                    <label>Discount Price:</label>
                    <input type="number" placeholder="write a discount if applied..." name="dis_price" value="{{ $product->discount_price }}">

                </div>
                <div class="v-design">
                    <label>Product Quantity:</label>
                    <input type="number" placeholder="write a quantity..." min="0" name="quantity" required="" value="{{ $product->quantity }}">

                </div>
                <div class="v-design">
                    <label>Product Image Here:</label>
                    <img height="100" width="100" src="/product/{{ $product->image }}" alt="">
                </div>

                <div class="v-design">
                    <label>Product Category:</label>
                    <select name="category" required="">
                        @foreach ($category as $category)
                            <option value="{{$category->category_name }}">{{$category->category_name }}</option>
                            @endforeach  
                            <option value="" selected="">Change category here</option>
                          
                    </select>
                    
                    

                </div>
                <div class="v-design">
                    <label>Change Image Here:</label>
                    <input type="file"  name="image" >
                </div>
                <div class="v-design">
                   
                    <input type="submit" value="Update product" class="btn btn-primary">

                </div>
              </form>
            </div>

            
        </div>
       </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
