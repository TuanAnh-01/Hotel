<?php

namespace App\Admin\Controllers;

use App\Models\Booking;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BookingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Room';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Booking());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('Price', __('Price'));
        $grid->column('capacity', __('Capacity'));
        $grid->column('services', __('Services'));
        $grid->column('status', __('Status'));
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
        $show = new Show(Booking::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('images', __('Images'));
        $show->field('title', __('Title'));
        $show->field('Price', __('Price'));
        $show->field('capacity', __('Capacity'));
        $show->field('services', __('Services'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Booking());
        $form->select('status', __('Status'))->options(['' => 'Status','Active' => 'Active', 'Inactive' => 'Inactive']);

        $form->text('name', __('Name'));
        $form->image('images', __('Images'))->uniqueName();
        $form->text('title', __('Title'));
        $form->number('Price', __('Price'));
        $form->text('capacity', __('Capacity'));
        $form->text('services', __('Services'));
        $form->ckeditor('content', __('Content'));
        // $form->switch('status', __('Status'));
     
        return $form;
    }
}
