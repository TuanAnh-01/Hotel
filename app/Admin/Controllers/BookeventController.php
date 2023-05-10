<?php

namespace App\Admin\Controllers;

use App\Models\Bookevent;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BookeventController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Bookevent';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Bookevent());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        // $grid->column('capacity', __('Capacity'));
        $grid->column('Price', __('Price'));
        $grid->column('start', __('Start'));
        $grid->column('end', __('End'));
        $grid->column('paymentstatus', __('Paymentstatus'));
        // $grid->column('room_id', __('Room id'));
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
        $show = new Show(Bookevent::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('capacity', __('Capacity'));
        $show->field('Price', __('Price'));
        $show->field('start', __('Start'));
        $show->field('end', __('End'));
        $show->field('paymentstatus', __('Paymentstatus'));
        $show->field('room_id', __('Room id'));
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
        $form = new Form(new Bookevent());
        $form->select('paymentstatus', __('Paymentstatus'))->options(['' => 'Payment','Paid' => 'Paid', 'Wait for confirmation' => 'Wait for confirmation']);

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'));
        $form->text('Price', __('Price'));
        $form->date('start', __('Start'))->default(date('Y-m-d'));
        $form->date('end', __('End'))->default(date('Y-m-d'));
      
        return $form;
    }
}
