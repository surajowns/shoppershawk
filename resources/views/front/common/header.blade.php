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
                <form action="#">
                    <div class="hover_category">
                        <select class="select_option" name="select" id="categori2" required>
                            <option selected value="">All Categories</option>
                             @foreach($categories as $catonly)
                               <option value="{{$catonly['slug']}}">{{$catonly['name']}}</option>
                             @endforeach 
                        </select>
                    </div>
                    <div class="search_box">
                        <input placeholder="Search product..." type="text" />
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
                                    <div class="hover_category">
                                        <select class="select_option" name="select" id="categori2" style="display: none;">
                                            <option selected="" value="1">All Categories</option>
                                            <option value="2">Accessories</option>
                                            <option value="3">Accessories &amp; More</option>
                                            <option value="4">Butters &amp; Eggs</option>
                                            <option value="5">Camera &amp; Video </option>
                                            <option value="6">Mornitors</option>
                                            <option value="7">Tablets</option>
                                            <option value="8">Laptops</option>
                                            <option value="9">Handbags</option>
                                            <option value="10">Headphone &amp; Speaker</option>
                                            <option value="11">Herbs &amp; botanicals</option>
                                            <option value="12">Vegetables</option>
                                            <option value="13">Shop</option>
                                            <option value="14">Laptops &amp; Desktops</option>
                                            <option value="15">Watchs</option>
                                            <option value="16">Electronic</option>
                                        </select><div class="nice-select select_option" tabindex="0" style="display: none;"><span class="current">All Categories</span><ul class="list"><li data-value="1" class="option selected">All Categories</li><li data-value="2" class="option">Accessories</li><li data-value="3" class="option">Accessories &amp; More</li><li data-value="4" class="option">Butters &amp; Eggs</li><li data-value="5" class="option">Camera &amp; Video </li><li data-value="6" class="option">Mornitors</li><li data-value="7" class="option">Tablets</li><li data-value="8" class="option">Laptops</li><li data-value="9" class="option">Handbags</li><li data-value="10" class="option">Headphone &amp; Speaker</li><li data-value="11" class="option">Herbs &amp; botanicals</li><li data-value="12" class="option">Vegetables</li><li data-value="13" class="option">Shop</li><li data-value="14" class="option">Laptops &amp; Desktops</li><li data-value="15" class="option">Watchs</li><li data-value="16" class="option">Electronic</li></ul></div><div class="nice-select select_option" tabindex="0"><span class="current"></span><ul class="list"></ul></div>
                                    </div>
                                    <div class="search_box">
                                        <input placeholder="Search product..." type="text">
                                        <button type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
</div>