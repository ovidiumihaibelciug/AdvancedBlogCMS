<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::all();
        return view('permissions.index')->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        if ($request->permission_type == "basic") {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'display_name' => 'required|string|max:255',
                'description' => 'required|string|max:255'
            ]);
            $permission = new Permission();
            
            $permission->name         = $request->name;
            $permission->display_name = $request->display_name;
            $permission->description  = $request->description;
            if ($permission->save()) {     
                Session::flash('success', 'Permission created successfully');        
                return redirect()->route('permissions.index');
            } else {
                Session::flash('danger', 'Sorry a problem occured while creating this permission');
                return redirect()->route('permissions.create');
            }
        } elseif ($request->permission_type == "crud") {
            $this->validateWith([
                'resource' => 'required|min:3|max:100|alpha'
            ]);
            $crud = explode(',', $request->crud_selected);
            if (count($crud) > 0) {
                foreach ($crud as $x) {
                    $slug = strtolower($x) . '-' . strtolower($request->resource);
                    $display_name = ucwords($x . " " . $request->resource);
                    $description = "Allows a user to " . strtoupper($x) . ' a ' . ucwords($request->resource);

                    $permission = new Permission();
                    $permission->name = $slug;
                    $permission->display_name = $display_name;
                    $permission->description = $description;
                    
                    $permission->save();
                }
                Session::flash('success', 'Permissions were all successfully added');
                return redirect()->route('permissions.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
