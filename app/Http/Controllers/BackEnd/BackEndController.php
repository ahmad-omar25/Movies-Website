<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BackEndController extends Controller {

    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    // Paginate
    public function index() {
        $rows = $this->model;
        $rows = $this->filter($rows);
        $with = $this->with();
        if(!empty($with)) {
            $rows = $rows->with($with);
        }
        $rows = $rows->paginate(5);
        $moduleName = $this->pluralModelName();
        $sModuleName =  $this->getModelName();
        $routeName = $this->getClassNameFromModel();
        $pageTitle = ' Control ' . $moduleName;
        $pageDes = 'Here you can add / edit / delete ' . $moduleName;

        return view('back-end.'.$this->getClassNameFromModel().'.index', compact(
            'rows',
            'moduleName',
            'pageTitle',
            'pageDes',
            'sModuleName',
            'routeName'
        ));
    }

    // Create
    public function create() {
        $moduleName = $this->getModelName();
        $pageTitle = ' Create ' . $moduleName;
        $pageDes = 'Here You Can Create ' . $moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();

        return view('back-end.'.$folderName.'.create', compact(
            'moduleName',
            'pageTitle',
            'pageDes',
            'folderName',
            'routeName'
        ))->with($append);
    }

    // Edit
    public function edit($id) {
        $row = $this->model->Find($id);
        $moduleName = $this->getModelName();
        $pageTitle =  'Edit ' . $moduleName;
        $pageDes = 'Here You Can Edit ' . $moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();

        return view('back-end.'.$folderName.'.edit', compact(
            'row',
            'moduleName',
            'pageTitle',
            'pageDes',
            'folderName',
            'routeName'
        ))->with($append);
    }

    // Delete
    public function destroy($id) {
        $this->model->find($id)->delete();
        return redirect()->route($this->getClassNameFromModel().'.index');
    }

    protected function filter($rows) {
        return $rows;
    }

    protected function with() {
        return [];
    }

    public function getClassNameFromModel() {
        return strtolower($this->pluralModelName());
    }

    protected function pluralModelName() {
        return Str::plural($this->getModelName());
    }

    protected function getModelName() {
        return class_basename($this->model );
    }

    protected function append(){
        return [];
    }
}

/*
php artisan make:migration create_messages_table
php artisan make:model Models/Message
php artisan make:controller BackEnd/Messages
php artisan make:request BackEnd/Messages/Store
php atrisan migrate
*/
