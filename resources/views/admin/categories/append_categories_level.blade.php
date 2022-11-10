
<div class="form-group">
    <label for="parent_id">Select Category Level</label>
    <select name="parent_id" id="parent_id" class="form-control" style="color: #000;">
        <option value="0" @if(!empty($category) && $category->parent_id==0) selected @endif>Main Category</option>
        @if(!empty($getCategories))
           @foreach($getCategories as $getCategory)
                <option value="{{ $getCategory->id }}" @if(isset($category) && $category->parent_id==$getCategory->id) selected @endif>{{ $getCategory->category_name }}</option>
                @if(!empty($getCategory['subcategories']))
                    @foreach($getCategory['subcategories'] as $subcategory)
                        <option value="{{ $subcategory->id }}" @if($subcategory->parent_id==$subcategory->id) selected @endif>&nbsp;&raquo;&nbsp;{{ $subcategory->category_name }}</option>
                    @endforeach
                @endif
            @endforeach
        @endif
    </select>
</div>
