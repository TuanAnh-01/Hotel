<?php

namespace App\Admin\Controllers;

use App\Models\Event;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EventController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Event';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Event());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        // $grid->column('images', __('Images'));
        // $grid->column('title', __('Title'));
        // $grid->column('venue', __('Venue'));
        // $grid->column('Capacity', __('Capacity'));
        // $grid->column('services', __('Services'));
        $grid->column('Price', __('Price'));
        // $grid->column('content', __('Content'));
        $grid->column('organization', __('Organization'));
        $grid->column('Status', __('Status'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Event::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('images', __('Images'));
        $show->field('title', __('Title'));
        $show->field('venue', __('Venue'));
        $show->field('Capacity', __('Capacity'));
        $show->field('services', __('Services'));
        $show->field('Price', __('Price'));
        $show->field('content', __('Content'));
        $show->field('organization', __('Organization'));
        $show->field('Status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Event());
        $form->select('status', __('Status'))->options(['' => 'Status','Active' => 'Active', 'Inactive' => 'Inactive']);
        $form->text('name', __('Name'));
        $form->image('images', __('Images'))->uniqueName();;
        $form->text('title', __('Title'));
        $form->text('venue', __('Venue'));
        $form->text('Capacity', __('Capacity'));
        $form->ckeditor('services', __('Services'));
        $form->number('Price', __('Price'));
        $form->ckeditor('content', __('Content'));
        $form->date('organization', __('Organization'))->default(date('Y-m-d'));
     

        return $form;
    }
}
