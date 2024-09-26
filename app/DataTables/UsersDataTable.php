<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {   $query->where('id','!=',1);
        $permissions = auth()->user()->hasRole('superadministrator')
        ? Permission::all()
        : auth()->user()->permissions;

        $permissions_by_group = [];
        foreach ($permissions ?? [] as $permission) {
            $ability = \Str::after($permission->name, ' ');

            $permissions_by_group[$ability][] = $permission;
        }
        return (new EloquentDataTable($query))
            // ->rawColumns(['user', 'last_login_at'])
            ->editColumn('user', function (User $user) {
                return view(' user-management.users.columns._user', compact('user'));
            })
            ->editColumn('role', function (User $user) {
                return ucwords($user->roles->first()?->name);
            })



            ->editColumn('created_at', function (User $user) {
                return $user->created_at->format('d M Y, h:i a');
            })
            ->addColumn('action', function (User $user) use ($permissions, $permissions_by_group){
                return view(' user-management.users.columns._actions', compact('user','permissions', 'permissions_by_group'));
            })
            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {

        return $model->newQuery()->with('permissions','roles')->where('added_by', auth()->user()->id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12'tr>><'d-flex justify-content-between'<'col-sm-12 col-md-5'i><'d-flex justify-content-between'p>>",)
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(2)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/user-management/users/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
{
    $columns = [
        Column::make('user')->addClass('d-flex align-items-center')->name('name'),
    ];

    // Check if the authenticated user has the superadministrator role
    if (auth()->user()->hasRole('superadministrator')) {
        $columns[] = Column::make('role')->searchable(false);
        $columns[] = Column::make('location_id')->title('Location Id');
    }
    $columns[] = Column::make('created_at')->title('Joined Date')->addClass('text-nowrap');
    $columns[] = Column::computed('action')
    ->addClass('text-end text-nowrap')
    ->exportable(false)
    ->printable(false)
    ->width(60,);
    return $columns;
}
    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
