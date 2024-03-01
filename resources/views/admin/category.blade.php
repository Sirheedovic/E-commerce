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
      .center{
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 30px;
        border: solid 3px orange   
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      {{-- <div class="container-fluid page-body-wrapper"> --}}
        @include('admin.navbar')
        <!-- partial:partials/_navbar.html -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="c_center">

              @if (session()->has('message'))
                  <div class="alert alert-success">
                    {{ session()->get('message') }}
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                  </div>
              @endif


              <h3 class="text_font">Add Category</h3>
              <form method="POST" action="{{ url('/add_category') }}">
                @csrf
                <input type="text" name="category" placeholder="write category name...">
                
                <input type="submit" name="submit" class="btn btn-primary"  value="Add category">
  
              </form>
            </div>
            <table class="center">
              <tr>
                <td>Category</td>
                <td>Action</td>
              </tr>
              @foreach ($data as $data)
                  
              <tr>
                <td>
                  {{ $data->category_name }}
                </td>
                <td>
                  <a onclick="return confirm('Are you sure you want to Delete this category?')"
                   href="{{ url('delete_category',$data->id) }}" 
                   class="btn btn-danger">
                   Delete
                  </a>
                </td>
              </tr>
              @endforeach 
            </table>
            

            
          </div>
        </div>
        
      {{-- </div> --}}
      <!-- page-body-wrapper ends -->
    </div>
   
    
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
