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
                        <!-- <li class="hidden"><a href="#">New Sofas</a></li>
                        <li class="hidden"><a href="#">Sleight Sofas</a></li>
                        <li>
                            <a href="#" id="more-btn"><i class="fa fa-plus" aria-hidden="true"></i> More Categories</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="column2 col-lg-6">
            <div class="search_container">
                <form action="">
                    <div class="hover_category">
                        <select class="select_option" name="select" id="categor" required>
                            <option selected value="">All Categories</option>
                             @foreach($categories as $catonly)
                               <option value="{{$catonly['slug']}}">{{$catonly['name']}}</option>
                             @endforeach 
                        </select>
                    </div>
                    <div class="search_box">
                        <input placeholder="Search product..." type="text" id="sample_search" />
                        <button type="submit">Search</button>
                    </div>
                </form>
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
    <div class="row">
        <div class="col-md-12">
            <div class="search_container-1">
            <form action="#">
                <div class="search_box">
                    <input placeholder="Search product..." type="text">
                    <button type="submit">Search</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>


