<?php 
  $categories=App\CategoryModel::where('parent_id',0)->where('status',1)->get();
  $subcategories=App\CategoryModel::where('parent_id','!=',0)->where('status',1)->get();

?>
<div class="header_bottom">
    <div class="row align-items-center">
        <div class="column1 col-lg-3 col-md-6">
            <div class="categories_menu categories_three">
                <div class="categories_title">
                    <h2 class="categori_toggle">ALL CATEGORIES</h2>
                </div>
                <div class="categories_menu_toggle" style="display: none;">
                    <ul>
                    @foreach($categories as $cat)
                        <li class="menu_item_children">
                            <a href="{{url('/products/'.'?cat='.$cat['slug'])}}">{{$cat['name']}} <i class="fa fa-angle-right"></i></a>
                            <ul class="categories_mega_menu">
                                @foreach($subcategories as $subcat)
                                @if($cat['id']==$subcat['parent_id']) 
                                <li class="menu_item_children">
                                    <a href="{{url('/products/'.'?cat='.$cat['slug'].'&subcat='.$subcat['slug'])}}">{{$subcat['name']}}</a>
                                  
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                       @endforeach           
                       
                    </ul>
                </div>
            </div>
        </div>
        <div class="column2 col-lg-6">
            <!-- desktop search -->
            <div class="search_container">
                <form action="{{url('/products/'.'?cat=')}}" method="get" autocomplete="off">
                    <div class="hover_category ">
                        <select class="selectoption" name="cat" id="categor" >
                            <option selected value="">All Categories</option>
                             @foreach($categories as $catonly)
                               <option value="{{$catonly['slug']}}">{{$catonly['name']}}</option>
                             @endforeach 
                        </select>
                    </div>
                    <div class="search_box">
                        <input placeholder="Search product..." name="keywords" value="{{isset($_GET['keywords'])?$_GET['keywords']:(isset($_GET['cat'])?(is_numeric($_GET['cat'])?'':$_GET['cat']):'')}}" type="text" class="sample_search" required />
                        <button type="submit">Search</button>
                    </div>
                   
                </form>
                 <ul class="list_details"></ul>
            </div>
        </div>
        <div class="column3 col-lg-3 col-md-6">
            <div class="header_bigsale">
                <div class="btn-my">
                    Flash Sale Deal !!!
                    <div class="btn2-my"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- mobile serch -->
    <div class="row">
        <div class="col-md-12">
            <div class="search_container-1">
            <form action="{{url('/products/'.'?cat=')}}" method="get" autocomplete="off">
                @csrf
                    <div class="hover_category ">
                        <select class="selectoption" name="cat" id="categor" >
                            <option selected value="">All Categories</option>
                             @foreach($categories as $catonly)
                               <option value="{{$catonly['id']}}">{{$catonly['name']}}</option>
                             @endforeach 
                        </select>
                    </div>
                    <div class="search_box">
                        <input placeholder="Search product..." name="keywords" type="text" value="{{isset($_GET['keywords'])?$_GET['keywords']:(isset($_GET['cat'])?(is_numeric($_GET['cat'])?'':$_GET['cat']):'')}}"  class="sample_search" required />
                        <button type="submit">Search</button>
                    </div>
                   
                </form>
                 <ul class="list_details"></ul>
           </div>
        </div>
    </div>
</div>
 <!-- /mobile bottom nav -->
<div class="bottom-nav1">
            <nav class="nav-mob1">
              <a class="nav-item1" href="{{url('/')}}">
               <div class="{{Request::segment(2)==''?'myclass':''}}">
                <i class="fa fa-home " aria-hidden="true"></i><span class="{{Request::segment(2)==''?'myclassspan':'myclassshide'}}">Home</span>
                </div>
              </a>
              
              <a class="nav-item1" href="{{url('/product/category')}}">
              <div class="{{Request::segment(2)=='category'?'myclass':''}}">
                <i class="fa fa-archive " aria-hidden="true"></i><span class="{{Request::segment(2)=='category'?'myclassspan':'myclassshide'}}">Category</span>
              </div>
              </a>
              
              <a class="nav-item1" href="{{url('user/cart_details')}}">
              <div class="{{Request::segment(2)=='cart_details'?'myclass':''}}">
                <i class="fa fa-shopping-cart  " aria-hidden="true"></i><span class="{{Request::segment(2)=='cart_details'?'myclassspan':'myclassshide'}}">Cart</span>
                 </div>
              </a>
              
              <a class="nav-item1" href="{{url('user/account')}}">
              <div class="{{Request::segment(2)=='account'?'myclass':''}}">
                 <i class="fa fa-user " aria-hidden="true"></i><span class="{{Request::segment(2)=='account'?'myclassspan':'myclassshide'}}">Profile</span>
              </div>
                </a>
            </nav>
        </div>
       

