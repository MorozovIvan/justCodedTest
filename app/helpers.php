<?php

if (!function_exists('build_tree')) {

    function build_tree($categories, $parent_id){
        //dd($categories->where('parent_id', $parent_id));
        if($categories and $categories->where('parent_id', $parent_id)){
            $tree = '<ul>';

            foreach($categories->where('parent_id', $parent_id) as $category){
                //dd($category);
                $tree .= '<li><a href="' . route('category_edit', $category->id) . '">' . $category->name . '</a>';
                $tree .=  build_tree($categories, $category->id);
                $tree .= '</li>';
            }

            $tree .= '</ul>';
        } else return null;

        return $tree;
    }

}
