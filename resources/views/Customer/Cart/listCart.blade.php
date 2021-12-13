<?php $count = 0; ?>
@foreach($data['cl_page'] as $item)
<tr>
    <?php
    $listProduct = DB::table('carts')->pluck('product_id')->toArray();
    $listSize = DB::table('carts')->pluck('size_id')->toArray();
    $listColor = DB::table('carts')->get('color_id');
    ?>
    <td class="product-thumbnail"><a href="product-details.html"><img src="{{url('uploads')}}/{{$item['image']}}" alt=""></a></td>
    <td class="product-name"><a href="product-details.html">{{$item['name']}}</a></td>
    <?php
    $flagS = true;
    foreach ($sizes as $value) {
        if(($value->product_id == $item['product_id'])){
            if ($value->name == "none") {
                $flagS = false;
            }
        }
        
    }
    ?>
    <?php
    $flagC = true;
    foreach ($colors as $value) {
        if(($value->product_id == $item['product_id'])){
            if ($value->name == "none") {
                $flagC = false;
            }
        }
        
    }
    ?>
    <td class="product-price">
        <div class="product__modal-input size mb-20" style="display: <?= ($flagS==false) ? "none" : "" ?>;">
            <label>Dung tích <i class="fas fa-star-of-life"></i></label>
            <select id="size_{{ $item['id']}}" onchange="change_detail_cart(<?= $item['id'] ?>, 0)">
                @foreach($sizes as $value)
                @if($value->product_id == $item['product_id'])
                <option <?= ($value->size_id == $item['size_id']) ? "selected" : "" ?> <?php
                $check_repeat = DB::table('carts')->where('product_id', $item['product_id'])->get();
                $flag = 0;
                // var_dump($check_repeat);
                foreach ($check_repeat as $check_rp) {
                    if ($check_rp->size_id == $value->size_id && $value->size_id != $item['size_id']) {
                        $flag = 1;
                    }
                };
                if ($flag == 1) {
                    echo "disabled";
                }
                ?> value="{{$value->id}}" price="{{$value->price}}" sale="{{$item['sale_price']}}">{{$value->name}} </option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="product__modal-input color mb-20" style="display: <?= ($flagC==false) ? "none" : "" ?>;">
            <label>Màu <i class="fas fa-star-of-life"></i></label>
            <select id="color_{{$item['id']}}" onchange="change_detail_cart(<?= $item['id'] ?>, 0)">
                @foreach($colors as $value)
                @if($value->product_id == $item['product_id'])
                <option <?= ($value->color_id == $item['color_id']) ? "selected" : "" ?>
                <?php 
                $check_repeat=DB::table('carts')->where('product_id', $item['product_id'])->get();
                $flag=0;
                // var_dump($check_repeat);
                foreach($check_repeat as $check_rp){
                    if ($check_rp->color_id == $value->color_id && $value->color_id != $item['color_id']) {
                        $flag=1;
                    }
                };
                if($flag==1){
                    echo "disabled";
                }
                ?>
                value="{{$value->id}}">{{$value->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
    </td>
    <td class="product-price"><span class="amount">$ {{$item['price']}}</span></td>
    <td class="product-quantity">
        <div class="cart-plus-minus"><input type="text" value="{{$item['quantity']}}" />
            <div class="dec qtybutton" onclick="change_detail_cart(<?= $item['id'] ?>, -1)">-</div>
            <div class="inc qtybutton" onclick="change_detail_cart(<?= $item['id'] ?>, 1)">+</div>
        </div>
    </td>
    <td class="product-subtotal" id="subtotal_{{$item['id']}}"><span class="amount">$ {{$item['price'] *$item['quantity']}}</span></td>
    <td class="product-remove" onclick="cart_remove(<?= $item['id'] ?>)"><a style="cursor: pointer;"><i class="fa fa-times"></i></a></td>
</tr>
<?php $count += $item['price'] * $item['quantity']; ?>
@endforeach

<script>
    $(".qtybutton").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);
    });
</script>