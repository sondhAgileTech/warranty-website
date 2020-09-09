<?php

namespace App\Admin\Controllers;

use App\GuaranteeInfo;
use App\Contract;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GuaranteeInfoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'GuaranteeInfo';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GuaranteeInfo());

        $grid->column('name', __('Hạng mục'));
        $grid->column('provider', __('Đơn vị cung cấp'));
        $grid->column('status_mainten', __('Bảo trì'))->display(function($id){
            $status = ['Bảo trì','Không bảo trì'];
            return $status[$id];
        });

        $grid->column('contract_id', __('Thuộc Hợp đồng'))->display(function($id) {
            return Contract::find($id)->contract_code;
        });

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
        $show = new Show(GuaranteeInfo::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Hạng mục'));
        $show->field('provider', __('Đơn vị cung cấp'));
        $show->field('status_mainten', __('Bảo trì'));
        $show->field('contract_id', __('Thuộc Hợp đồng'));
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
        $form = new Form(new GuaranteeInfo());
        $contracts = Contract::getListContract();
        $form->text('name', __('Hạng mục'))->rules('required');
        $form->text('provider', __('Đơn vị cung cấp'))->rules('required');
        $status = ['Bảo trì','Không bảo trì'];
        $form->select('status_mainten', 'Bảo trì')->options($status)->rules('required');
        $form->select('contract_id', 'Chọn Hợp đồng')->options($contracts)->rules('required');

        return $form;
    }
}
