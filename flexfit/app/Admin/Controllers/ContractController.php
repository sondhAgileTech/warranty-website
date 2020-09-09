<?php

namespace App\Admin\Controllers;

use App\Contract;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ContractController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Contract';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Contract());

        $grid->column('contract_code', __('Mã code'));
        $grid->column('name_customer', __('Tên khách hàng'));
        $grid->column('construction_items', __('Hạng mục thi công'));
        $grid->column('phone', __('Số điện thoại'));
        $grid->column('address', __('Địa chỉ'));
        $grid->column('finish_date', __('Ngày hoàn thành'));
        $grid->column('language', __('Ngôn ngữ'));

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
        $show = new Show(Contract::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('contract_code', __('Mã code'));
        $show->field('name_customer', __('Tên khách hàng'));
        $show->field('construction_items', __('Hạng mục thi công'));
        $show->field('phone', __('Số điện thoại'));
        $show->field('address', __('Địa chỉ'));
        $show->field('finish_date', __('Ngày hoàn thành'));
        $show->field('language', __('Ngôn ngữ'));
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
        $form = new Form(new Contract());

        $form->text('contract_code', __('Mã code'))->rules('required');
        $form->text('name_customer', __('Tên khách hàng'))->rules('required');
        $form->text('construction_items', __('Hạng mục thi công'))->rules('required');
        $form->mobile('phone', __('Số điện thoại'))->rules('required');
        $form->text('address', __('Địa chỉ'))->rules('required');
        $form->datetime('finish_date', __('Ngày hoàn thành'))->default(date('Y-m-d'))->rules('required');
        $form->text('language', __('Ngôn ngữ'))->rules('required');

        return $form;
    }
}
