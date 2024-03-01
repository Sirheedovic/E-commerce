<!DOCTYPE html>
<html lang="en">
  <head>
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
                <h2 class="text_font">Add Product</h2>

                @if (session()->has('message'))
                    <div class="alert alert-success">
                      {{ session()->get('message') }}

                      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                    </div>
                @endif

              <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="v-design">
                    <label>Product Title:</label>
                    <input type="text" placeholder="write a title..." name="title" required="">

                </div>
                <div class="v-design">
                    <label>Product Description:</label>
                    <input type="text" placeholder="write a description.." name="description" required="">

                </div>
                <div class="v-design">
                    <label>Product Price:</label>
                    <input type="number" placeholder="write a price..." name="price" required="">

                </div>
                <div class="v-design">  
                    <label>Discount Price:</label>
                    <input type="number" placeholder="write a discount if applied..." name="dis_price">

                </div>
                <div class="v-design">
                    <label>Product Quantity:</label>
                    <input type="number" placeholder="write a quantity..." min="0" name="quantity" required="">

                </div>
                <div class="v-design">
                    <label>Product Category:</label>
                    <select name="category" required="">
                        @foreach ($category as $category)
                            <option value="{{$category->category_name }}">{{$category->category_name }}</option>
                            @endforeach  
                            <option value="" selected="">Add a category here</option>
                          
                    </select>
                    
                    

                </div>
                <div class="v-design">
                    <label>Product Image Here:</label>
                    <input type="file"  name="image" required="">
                </div>
                <div class="v-design">
                   
                    <input type="submit" value="Add product" class="btn btn-primary">

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
