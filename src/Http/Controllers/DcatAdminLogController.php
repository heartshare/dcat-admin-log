<?php

namespace Dcat\Admin\Satan\Admin\Log\Http\Controllers;

use App\Admin\Repositories\User;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Satan\Admin\Log\DcatAdminLogServiceProvider;
use Dcat\Admin\Satan\Admin\Log\Models\SatanLog;
use Dcat\Admin\Show;

class DcatAdminLogController extends AdminController
{
    public function title()
    {
        return DcatAdminLogServiceProvider::trans('log.title');
    }

    public function grid()
    {
        return Grid::make(new SatanLog,function (Grid $grid){
            $grid->model()->orderBy(  'id','desc');
            $grid->disableCreateButton();
            $grid->disableEditButton();
            $grid->showColumnSelector();
            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('method')->label('info');
            $grid->column('url')->label('info');
            $grid->column('param');
            $grid->column('headers')->jsonSerialize();
            $grid->column('created_at')->label('danger');
            $grid->column('updated_at')->label('danger');
            $grid->filter(function (Grid\Filter $filter) {
                $filter->panel();
                $filter->equal('id');
                $filter->like('nickname');
                $filter->like('email');
                $filter->like('phone');
                $filter->equal('is_lock')
                    ->select([0=>'未锁定',1=>'已锁定']);
                $filter->between('created_at')
                    ->datetime()->toTimestamp();
                $filter->between('updated_at')
                    ->datetime()->toTimestamp();
            });
        });
    }
    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new SatanLog(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('url');
            $show->field('ip');
            $show->field('param')->json();
            $show->field('method');
            $show->field('headers')->json();
            $show->field('created_at');
            $show->field('updated_at');
        });
    }
    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new SatanLog(), function (Form $form) {
            $form->display('id');
            $form->text('user_id');
            $form->text('param');
            $form->text('method');
            $form->ip('ip');
            $form->text('headers');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
