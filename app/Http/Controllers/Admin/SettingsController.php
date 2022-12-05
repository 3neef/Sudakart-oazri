<?php

namespace App\Http\Controllers\Admin;

use App\Collections\AttributesCollection;
use App\Collections\CategoriesCollection;
use App\Collections\MarketsCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrUpdateAttributeRequest;
use App\Http\Requests\CreateOrUpdateCategoryRequest;
use App\Http\Requests\CreateOrUpdateDeliveryMethodRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\City;
use App\Models\DeliveryMethod;
use App\Models\Market;
use App\Models\Option;
use App\Models\Reason;
use App\Services\OptionsServices;
use App\Services\UploadImageServices;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use function PHPSTORM_META\registerArgumentsSet;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories(Request $request)
    {
        $categories = CategoryResource::collection(CategoriesCollection::collection($request));
        return view('panel.settings.categories.index', compact('categories'));
    }
    public function createcategory()
    {
        return view('panel.settings.categories.create');
    }
    public function storecategory(CreateOrUpdateCategoryRequest $request)
    {
        $image = '';
        if ($request->file('image')) {
            $image = UploadImageServices::upload($request->file('image'), 'categories');
        }

        $category = Category::create([
            'name'          => $request->name,
            'en_name'       => $request->en_name,
            'parent_id'     => $request->parent_id,
            'commission'    => $request->commission,
            'image'         => $image,
            'color'         => $request->color,
        ]);

        return redirect()->route('admin.categories');
    }
    public function editcategory(Category $category)
    {
        return view('panel.settings.categories.edit', compact('category'));
    }
    public function updatecategory(CreateOrUpdateCategoryRequest $request, Category $category)
    {

        if ($request->file('image')) {
            $image = UploadImageServices::upload($request->file('image'), 'categories');
            $category->update(['image'=> $image]);
        }

        $category->update([
            'name'          => $request->name,
            'en_name'       => $request->en_name,
            'parent_id'     => $request->parent_id,
            'commission'    => $request->commission,
            'color'         => $request->color,
        ]);

        return redirect()->route('admin.categories');
    }
    public function destroycategory(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories');
    }


    public function delivery()
    {
        $methods = DeliveryMethod::all();
        return view('panel.settings.delivery.index', compact('methods'));
    }
    public function createdelivery()
    {
        return view('panel.settings.delivery.create');
    }
    public function storedelivery(CreateOrUpdateDeliveryMethodRequest $request)
    {
        $method = DeliveryMethod::create($request->validated());
        return redirect()->route('admin.delivery');
    }
    public function updatedelivery(CreateOrUpdateDeliveryMethodRequest $request, $id)
    {
        $method = DeliveryMethod::findorfail($id);
        $method->update($request->validated());
        return redirect()->route('admin.delivery');
    }
    public function editdelivery($id)
    {
        $method = DeliveryMethod::findorfail($id);
        return view('panel.settings.delivery.edit', compact('method'));
    }
    public function destroydelivery($id)
    {
        $method = DeliveryMethod::findorfail($id);
        $method->delete();
        return redirect()->route('admin.delivery');
    }


    public function attribute(Request $request)
    {
        $attributes = AttributesCollection::collection($request);
        return view('panel.settings.attributes.index', compact('attributes'));
    }
    public function showattribute($id)
    {
        $attribute = Attribute::findorfail($id);
        return view('panel.settings.attributes.show', compact('attribute'));
    }
    public function createattribute()
    {
        return view('panel.settings.attributes.create');
    }
    public function storeattribute(CreateOrUpdateAttributeRequest $request)
    {
        $attribute = Attribute::create($request->validated());
        if ($request->options) {
            OptionsServices::createOption($attribute->id, $request->options);
        }
        return redirect()->route('admin.attributes');
    }
    // public function updateattribute(CreateOrUpdateAttributeRequest $request, $id)
    // {
    //     $attribute = Attribute::findorfail($id);
    //     $attribute->update($request->validated());
    //     return redirect()->route('admin.attribute');
    // }
    public function editattribute($id)
    {
        // $attribute = ::findorfail($id);
        return view('panel.settings.attributes.edit', compact('attribute'));
    }
    public function destroyattribute($id)
    {
        $attribute = Attribute::findorfail($id);
        $attribute->delete();
            $options = Option::where('attribute_id', $attribute->id)->get();
            if($options->count() > 0){
                foreach($options as $option){
                    $option->delete();
                }
            }
        return redirect()->route('admin.attributes');
    }


    public function reason()
    {
        $reasons = Reason::all();
        return view('panel.settings.reasons.index', compact('reasons'));
    }
    public function createreason()
    {
        return view('panel.settings.reasons.create');
    }
    public function storereason(Request $request)
    {
        $reason = Reason::create([
            'name'=> $request->name,
            'en_name'=> $request->en_name,
    ]);
        return redirect()->route('admin.reasons');
    }
    public function updatereason(Request $request, $id)
    {
        $reason = Reason::findorfail($id);
        $reason->update([
            'name'=> $request->name,
            'en_name'=> $request->en_name,
    ]);
        return redirect()->route('admin.reasons');
    }
    public function editreason($id)
    {
        $reason = Reason::findorfail($id);
        return view('panel.settings.reasons.edit', compact('reason'));
    }
    public function destroyreason($id)
    {
        $reason = Reason::findorfail($id);
        $reason->delete();
        return redirect()->route('admin.reasons');
    }


    public function commissions()
    {
        return view('panel.settings.commissions');
    }

    public function roles() {
        $roles = Role::get();
        return view('panel.settings.roles.index', compact('roles'));

    }
    public function rolesEdit(Request $request, Role $role) {
        $role = Role::findOrFail($request->id);
        $permissions = Permission::get();
        return view('panel.settings.roles.edit', compact('role', 'permissions'));
    }
    public function rolesUpdate(Request $request, Role $role, Permission $permissions) {
        $role = Role::findOrFail($request->id);
        $role->update(['role' => $request->name]);
        // get per
        foreach ($role->permissions as $per) {
            $role->revokePermissionTo($per->name);
        }
        $role->givePermissionTo($request->permissions);
        return redirect()->back()->withSuccess('Role Permissions updated successfully');
    }
    public function rolesCreate() {
        $permissions = Permission::get();
        return view('panel.settings.roles.create', compact('permissions'));
    }
    public function rolesStore(Request $request, Role $role) {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
        $role->name = $request->name;
        $role->guard_name = 'web';
        $role->save();
        return redirect()->to(route('admin.roles.edit', $role->id))->withSuccess('Role Permissions created successfully');
    }
    public function rolesDelete(Request $request, Role $role) {
        $role = $role->findOrFail($request->id);
        $role->delete();
        return redirect()->back()->withSuccess('Role Deleted Successfully');
    }

    public function markets(Request $request)
    {
        $markets =  MarketsCollection::collection($request);
        return view('panel.settings.markets.index', compact('markets'));
    }

    public function marketscreate()
    {
        return view('panel.settings.markets.create');
    }

    public function marketsedit(Market $market)
    {
        return view('panel.settings.markets.edit', compact('market'));
    }

    public function getcities(Request $request)
    {
        if($request->search == ''){
            $cities = City::orderBy('id','desc')->limit(5)->get();
        }else {
            $cities = City::orderBy('id','desc')
            ->where('en_name', 'like', "%$request->search%")
            ->orWhere('name', 'like', "%$request->search%")
            ->get();
        }

        $response = array();

        foreach ($cities as $city) {
            $response[] = array(
                'id' => $city->id ,
                'text' => $city->en_name.' - '.$city->name
            );
        }

        echo json_encode($response);
        
        
    }

    
    public function store(Request $request)
    {
        //
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
