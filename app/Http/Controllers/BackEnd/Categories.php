<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Categories\Store;
use App\Models\Category;

class Categories extends BackEndController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    // Save in Database
    public function store(Store $request) {
        $this->model->create($request->all());
        return redirect()->route('categories.index');
    }

    // Update
    public function update($id , Store $request) {
        $row = $this->model->Find($id);
        $row->update($request->all());
        return redirect()->route('categories.index');
    }
}
