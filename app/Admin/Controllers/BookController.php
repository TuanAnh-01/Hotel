<?php

namespace App\Admin\Controllers;

use App\Models\Book;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BookController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Book';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Book());
        $grid->model()->orderBy('id', 'desc');
        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('Price', __('Price'));
        $grid->column('arrival', __('Arrival'));
        $grid->column('departure', __('Departure'));
        $grid->column('paymentstatus', __('Payment Status'));
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
        $show = new Show(Book::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('Price', __('Price'));
        $show->field('arrival', __('Arrival'));
        $show->field('departure', __('Departure'));
        $show->field('paymentstatus', __('Payment Status'));
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
        $form = new Form(new Book());

        $form->text('name', __('Name'));
        // $form->text('email', __('Email'));
        $form->text('phone', __('Phone'));
        $form->number('Price', __('Price'));
        $form->date('arrival', __('Arrival'))->default(date('Y-m-d'));
        $form->date('departure', __('Departure'))->default(date('Y-m-d'));
        $form->select('paymentstatus', __('Payment Status'))->options(['' => 'Payment','Paid' => 'Paid', 'Wait for confirmation' => 'Wait for confirmation']);
        return $form;
    }
}
