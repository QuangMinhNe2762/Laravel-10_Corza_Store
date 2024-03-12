<?php
class Helper
{
    public static function menu($menus)
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id > 0) {
                $html .= '
        <tr>
        <td style="padding: 0 20px;">'   . $menu->id .     '</td>
        <td style="padding: 0 20px;">'   . '--' . $menu->name .     '</td>
        <td style="padding: 0 20px;">'   . $menu->parent_id .      '</td>
        <td style="padding: 0 20px;">'   . self::active($menu->active) .      '</td>
        <td style="padding: 0 20px;">
        <a href="edit/' . $menu->id . '"><i class="fa-solid fa-pen-to-square"></i></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" onclick="removerow(' . $menu->id . ',\'/menus/destroy\')"><i class="fa-solid fa-trash"></i></i></a>
        </td>
        </tr>
        ';
            } else {
                $html .= '
        <tr>
        <td style="padding: 0 20px;">'   . $menu->id .     '</td>
        <td style="padding: 0 20px;">'   . $menu->name .     '</td>
        <td style="padding: 0 20px;">'   . $menu->parent_id .      '</td>
        <td style="padding: 0 20px;">'   . self::active($menu->active) .      '</td>
        <td style="padding: 0 20px;">
        <a href="edit/' . $menu->id . '"><i class="fa-solid fa-pen-to-square"></i></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" onclick="removerow(' . $menu->id . ',\'/menus/destroy\')"><i class="fa-solid fa-trash"></i></i></a>
        </td>
        </tr>
        ';
            }
            unset($menus[$key]);
        }
        return $html;
    }
    public static function active($active)
    {
        $html = '';
        if ($active == 1) {
            $html .= '<span class="badge bg-success">Yes</span>';
        } else {
            $html .= '<span class="badge bg-danger">No</span>';
        }
        return $html;
    }

    public static function subString($content)
    {
        return strlen($content) > 5 ? substr($content, 0, 5) . '...' : $content;
    }

    public static function products($products)
    {
        $html = '';
        foreach ($products as $product) {
            $html .= '<tr>
        <td style="padding: 0 20px;">' . $product->id . '</td>
        <td style="padding: 0 20px;">' . $product->name . '</td>
        <td style="padding: 0 20px;">' . $product->description . '</td>
        <td style="padding: 0 20px;">' . self::subString($product->content) . '</td>
        <td style="padding: 0 20px;">' . $product->price . '</td>
        <td style="padding: 0 20px;">' . $product->price_salce . '</td>
        <td style="padding: 0 20px;">' . $product->quantity . '</td>
        <td style="padding: 0 20px;">' . $product->menu_id . '</td>
        <td style="padding: 0 20px;"> <img src="' . $product->image . '" width="50px" height="100px"></td>
        <td style="padding: 0 20px;">' . self::active($product->active) . '</td>
        <td style="padding: 0 20px;">' .
                '<a href="' . route('products.show', $product->id) . '"><i class="fa-solid fa-pen-to-square"></i></a>' .
                '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" onclick="removerow(' . $product->id . ',\'/products/destroy\')"><i class="fa-solid fa-trash"></i></i></a>
        </td>
        </tr>';
        }
        return $html;
    }
    public static function sliders($sliders)
    {
        $html = '';
        foreach ($sliders as $slider) {
            $html .= '
        <tr>
        <td style="padding: 0 20px;">' . $slider->id . '</td>
        <td style="padding: 0 20px;">' . $slider->name . '</td>
        <td style="padding: 0 20px;"> <img src="' . $slider->image . '" width="50px" height="100px"></td>
        <td style="padding: 0 20px;">' . $slider->sort_by . '</td>
        <td style="padding: 0 20px;"> <a href="' . $slider->url . '" target="_blank" >Đường dẫn ở đây</a></td>
        <td style="padding: 0 20px;">' . self::active($slider->active) . '</td>
        <td style="padding: 0 20px;">' .
                '<a href="' . route('sliders.edit', $slider->id) . '"><i class="fa-solid fa-pen-to-square"></i></a>' .
                '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" onclick="removerow(' . $slider->id . ',\'/sliders/destroy\')"><i class="fa-solid fa-trash"></i></i></a>
        </td>
        </tr>
        ';
        }
        return $html;
    }

    //========================================================
    //Coza_store
    public static function menuCoza_store($menus, $parent_id = 0)
    {
        $html = '';
        foreach ($menus as $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '<li class="active-menu">
                <a href="' . route('menu.index', [$menu->id, $menu->slug]) . '">' . $menu->name . '</a>';
                if (self::findMenuChild($menus, $menu->id)) {
                    $html .= '
                                <ul class="sub-menu">
									' . self::menuCoza_store($menus, $menu->id) . '
								</ul>
                ';
                }
            }
            $html .= '</li>';
        }
        return $html;
    }
    public static function menuCoza_store2($menus, $parent_id = 0)
    {
        $html = '';
        foreach ($menus as $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '<li class="active-menu">
                <a href="' . route('menu.index', [$menu->id, $menu->slug]) . '">' . $menu->name . '</a>';
                if (self::findMenuChild($menus, $menu->id)) {
                    $html .= '
                                <ul class="sub-menu" style="display: block;">
									' . self::menuCoza_store($menus, $menu->id) . '
								</ul>
                ';
                }
            }
            $html .= '</li>';
        }
        return $html;
    }
    public static function findMenuChild($menus, $id)
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }
        return false;
    }
    public static function ShowMenuParrent($menus)
    {
        $html = '';
        $ImageArr = ['banner-01.jpg', 'banner-02.jpg', 'banner-03.jpg'];
        $ImageArrIndex = 0;
        foreach ($menus as $menu) {

            $html .= '
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="/template/coza_store/images/' . $ImageArr[$ImageArrIndex] . '" alt="IMG-BANNER">
						<a href="#" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									' . $menu->name . '
								</span>

								<span class="block1-info stext-102 trans-04">
									Spring 2018
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
    ';
            $ImageArrIndex++;
        }
        return $html;
    }
    public static function ShowSlider($sliders)
    {
        $html = '';
        foreach ($sliders as $slider) {
            $html .= '
        <div class="item-slick1" style="background-image: url(' . $slider->Image . ');">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									' . $slider->Name . '
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									NEW SEASON
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
        ';
        }
        return $html;
    }
    public static function ShowProduct($products, $menuSlug)
    {
        $html = '';
        foreach ($products as $product) {
            $html .= '
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="' . $product->image . '" alt="IMG-PRODUCT">

							<a href="' . route('product.index', [$product->id, $menuSlug]) . '" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                Product detail
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									' . $product->name . '
								</a>

								<span class="stext-105 cl3">
									$' . $product->price . '
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="/template/coza_store/images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="/template/coza_store/images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
        ';
        }
        return $html;
    }
    public static function ShowProductSimilar($products, $menuSlug)
    {
        $html = '';
        foreach ($products as $product) {
            $html .= '
        <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15 slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 345px;">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="' . $product->image . '" alt="IMG-PRODUCT">

								<a href="' . route('product.index', [$product->id, $menuSlug]) . '" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" tabindex="0">
									Product Detail
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" tabindex="0">
										' . $product->name . '
									</a>

									<span class="stext-105 cl3">
										$' . $product->price . '
									</span>
								</div>
							</div>
						</div>
					</div>
        ';
        }
        return $html;
    }
    public static $getTotalPriceCart = 0;
    public static function setTotalPriceCart($total)
    {
        //     if(isset($PriceCart))
        //     {
        //         $PriceCart=0;
        //         $PriceCart+=$total;
        //     }
        //    $PriceCart+=$total;
        //     return $PriceCart;
        self::$getTotalPriceCart += intval($total);
    }
    public static function total($price, $qty)
    {
        return intval($price) * intval($qty);
    }
    public static function ShowCart($products, $qty)
    {
        $html = '';
        for ($i = 0; $i < count($products); $i++) {
            $html .= '
        <tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="' . $products[$i]->image . '" alt="IMG">
										</div>
									</td>
									<td class="column-2">' . $products[$i]->name . '</td>
									<td class="column-3">$' . $products[$i]->price . '</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="' . $qty[$i] . '" min="1" max="10">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5">$' . $total = self::total($products[$i]->price, $qty[$i]) . '</td>
								</tr>
        ';
            self::setTotalPriceCart($total);
        }
        return $html;
    }
    //========================================================
    public static function carts($customers)
    {
        $html = '';
        foreach ($customers as $customer) {
            $html .= '<tr>
        <td style="padding: 0 20px;">' . $customer->id . '</td>
        <td style="padding: 0 20px;">' . $customer->name . '</td>
        <td style="padding: 0 20px;">' . $customer->phone . '</td>
        <td style="padding: 0 20px;">' . $customer->email . '</td>
        <td style="padding: 0 20px;">' . $customer->content . '</td>
        <td style="padding: 0 20px;">' .
                '<a href="' . route('admin.carts.show', $customer->id) . '"><i class="fa-regular fa-eye"></i></a>' .
                '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" onclick="removerow(' . $customer->id . ',\'/carts/destroy\')"><i class="fa-solid fa-trash"></i></i></a>
        </td>
        </tr>';
        }
        return $html;
    }
    public static function cartProduct($products)
    {
        $html = '';
        foreach ($products as $products) {
            $html .= '<tr>
        <td style="padding: 0 20px;">' . $products->id . '</td>
        <td style="padding: 0 20px;">' . $products->customer_id . '</td>
        <td style="padding: 0 20px;">' . $products->product_id . '</td>
        <td style="padding: 0 20px;">' . $products->qty . '</td>
        <td style="padding: 0 20px;">' . $products->price . '</td>
        </tr>';
        }
        return $html;
    }
}
