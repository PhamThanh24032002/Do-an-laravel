<?php

// BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
function tableCategories($categories, $parent_id = 0, $char = '', $ch='')
{
    $stt = 1;
    foreach ($categories as $key => $item) {
        // Nếu là chuyên mục con thì hiển s
        if ($item->parent_id == $parent_id) {
            echo '<tr>';
            echo '<td>'.$ch. $stt . '</td>';//stt
            echo '<td>'.$char. $item->name . '</td>';             
            echo '<td>';
            echo $item->status=='0'?'ẩn':'hiện';
            echo '</td>';
            echo '<td>';
            echo '<form action="' . route('category.destroy', $item->id) . '" method="POST">
            '.csrf_field().'

            <input type="hidden" name="_method" id="input" class="form-control" value="DELETE">
                 <a href="' . route('category.edit', $item->id) . '" class="btn btn-secondary">
                     Sửa</a>
                 <button class="btn btn-danger" type="submit"
                     onclick="return confirm(\'Bạn có chắc muốn xóa danh mục này chứ\')">Xóa</button>
                     </form>';
            echo '</td>';

            echo '</tr>';

            // Xóa chuyên mục đã lặp
            unset($categories[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            tableCategories($categories, $item->id, $char . '-', $ch.$stt.'-');
            $stt++;
        }
    }
}

// BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
function showCategories($categories, $parent_id = 0, $char = '', $pro_cate_id='')
{
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent_id == $parent_id)
        {
            if ($pro_cate_id == $item->id) {
                echo'<option selected value='.$item->id.'>'.$char.$item->name.'</option>';
            } else {
                echo'<option value='.$item->id.'>'.$char.$item->name.'</option>';
            }      
            unset($categories[$key]);        
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item->id, $char.'--', $pro_cate_id);
        }
    }
}

// BƯỚC 2: HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
function userCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item) {
        // Nếu là chuyên mục con thì hiển s
        if ($item->parent_id == $parent_id) {
        echo "<div class=\"card\">".
            "<div class=\"card-header white-bg\" id=\"e-{$item->id}\">".
                "<h5 class=\"mb-0\">".
                    "<button class=\"shop-accordion-btn\" data-toggle=\"collapse\" data-target=\"#cate-{$item->id}Accessories\" aria-expanded=\"true\" aria-controls=\"cate-{$item->id}Accessories\">".
                        "{$item->name}".
                    "</button>".
                "</h5>".
            "</div>".
        
            "<div id=\"cate-{$item->id}Accessories\" class=\"cate-{$item->id} show\" aria-labelledby=\"e-{$item->id}\" data-parent=\"#accordion\">".
            "<div class=\"card-body\">".
                "<div class=\"categories__list\">".
                    "<ul>".
                        "<li>";
                        userCategories($categories, $item->id, $char . '-');
                    echo "<li>
                    </ul>
                </div>
            </div>
            </div>
        </div>";      

            // Xóa chuyên mục đã lặp
            unset($categories[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            // userCategories($categories, $item->id, $char . '-');
        }
    }
}


?>