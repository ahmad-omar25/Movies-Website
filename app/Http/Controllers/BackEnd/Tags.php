<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Tags\Store;
use App\Models\Tag;

class Tags extends BackEndController
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    // Save in Database
    public function store(Store $request) {
        $this->model->create($request->all());
        return redirect()->route('tags.index');
    }

    // Update
    public function update($id , Store $request) {
        $row = $this->model->Find($id);
        $row->update($request->all());
        return redirect()->route('tags.index');
    }
}
