<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
      .text_font{
        text-align: center;
        font-size: 20px;
        padding-top: 20px;
      }
      .center{
        margin: auto;
        width: 50%;
        border: 2px solid green;
        text-align: center;
        margin-top: 40px;
      }
      .img-size{
      width: 70px;
      height: 70px;
    }
    .th-color{
      background: green;
    }
    .th-desig{
      padding-right: 30px;
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
        <div class="main-panel">
          <div class="content-wrapper">

            @if (session()->has('message'))
                  <div class="alert alert-success">
                    {{ session()->get('message') }}

                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                  </div>
              @endif

            
              <h2 class="text_font">Display Product</h2>

              <table class="center">
                <tr class="th-color">
                  <th>Product Title</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Discount Price</th>
                  <th>Product Image</th>
                  <th>Delete</th>
                  <th>Edit</th>
                </tr>

                @foreach ($product as $product)
                  <tr>
                    <td class="th-desig">{{ $product->title }}</td>
                    <td class="th-desig">{{ $product->description }}</td>
                    <td class="th-desig">{{ $product->quantity }}</td>
                    <td class="th-desig">{{ $product->price }}</td>
                    <td class="th-desig">{{ $product->category }}</td>
                    <td class="th-desig">{{ $product->discount_price }}</td>
                    <td class="th-desig">
                      <img src="/product/{{ $product->image }}" class="img-size" alt="">
                    </td>
                    <td> <a onclick="return confirm('Are you sure you want to Delete this product?')"
                       href="{{ url('delete_product', $product->id) }}" class="btn btn-danger">Delete</a></td>


                    <td> <a href="{{ url('update_product', $product->id) }}" class="btn btn-success">Edit</a></td>
                
                    
                  </tr>
              @endforeach
              </table>

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
