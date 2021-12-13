@foreach($data['wl_page'] as $item)
<tr>
    <td class="product-thumbnail"><a href=""><img src="{{url('uploads')}}/{{$item->image}}" alt=""></a></td>
    <td class="product-name"><a href="">{{$item->name}}</a></td>
    <td class="product-price"><span class="amount">{{$item->price}}</span></td>
    <td class="product-quantity">
        <button class="os-btn os-btn-black" type="submit">Mua ngay</button>
    </td>
    <td onclick="product_remove(<?= $item->id ?>)" ><a style="cursor: pointer;" ><i class="fa fa-times"></i></a></td>
</tr>
@endforeach