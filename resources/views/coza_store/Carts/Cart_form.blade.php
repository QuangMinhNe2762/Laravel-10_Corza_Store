@for ($i = 0; $i < count($products); $i++)
    <tr class="table_row">
        <td class="column-1">
            <a href="/destroy-cart/{{ $products[$i]->id }}">
                <div class="how-itemcart1">
                    <img src="{{ $products[$i]->image }}" alt="IMG">
                </div>
            </a>
        </td>
        <td class="column-2">{{ $products[$i]->name }}</td>
        <td class="column-3">${{ $products[$i]->price }}</td>
        <td class="column-4">
            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                    <i class="fs-16 zmdi zmdi-minus"></i>
                </div>

                <input class="mtext-104 cl3 txt-center num-product" type="number"
                    name="products[{{ $products[$i]->id }}]" value="{{ $products[$i]->qty }}">



                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                    <i class="fs-16 zmdi zmdi-plus"></i>
                </div>
            </div>
        </td>
        <td class="column-5">$@php
            $total = Helper::total($products[$i]->price, $products[$i]->qty);
            echo $total;
        @endphp</td>
        {{-- @php
            $total = Helper::total($products[$i]->price, $products[$i]->qty);
        @endphp
        <td class="column-5">$
            <input type="hidden" name="price[{{ $products[$i]->id }}]" value="{{ $total }}">
            @php
                echo $total;
            @endphp
        </td> --}}
    </tr>
    @php
        Helper::setTotalPriceCart($total);
    @endphp
@endfor
