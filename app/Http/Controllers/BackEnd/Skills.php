<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Skills\Store;
use App\Models\Skill;

class Skills extends BackEndController
{
    public function __construct(Skill $model)
    {
        parent::__construct($model);
    }

    // Save in Database
    public function store(Store $request) {
        $this->model->create($request->all());
        return redirect()->route('skills.index');
    }

    // Update
    public function update($id , Store $request) {
        $row = $this->model->Find($id);
        $row->update($request->all());
        return redirect()->route('skills.index');
    }
}
