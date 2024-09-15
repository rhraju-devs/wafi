<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $pageTitle = "Employee List";
        $employees = User::where('role', Status::USER_ROLE_USER);

        if (request()->name || request()->date_of_birth || request()->email || request()->mobile) {
            $employees = $this->employeeSearch(request()->except('_token'));
        } else {
            $employees = $employees->orderBy('id', 'desc')->paginate(getPaginate());
        }

        return view('user.employee.index', compact('pageTitle', 'employees'));
    }

    public function employeeSearch($data)
    {
        $employees = User::where('role', Status::USER_ROLE_USER);

        if (!empty($data['name'])) {
            $employees->where('name', 'LIKE', '%' . $data['name'] . '%');
        }

        if (!empty($data['email'])) {
            $employees->where('email', 'LIKE', '%' . $data['email'] . '%');
        }

        if (!empty($data['mobile'])) {
            $employees->where('mobile', 'LIKE', '%' . $data['mobile'] . '%');
        }

        if (!empty($data['date_of_birth'])) {
            $dateOfBirth = \Carbon\Carbon::createFromFormat('Y-m-d', $data['date_of_birth'])->format('Y-m-d');
            $employees->whereDate('date_of_birth', $dateOfBirth);
        }

        return $employees->orderBy('id', 'desc')->paginate(10);
    }

    public function create()
    {
        $pageTitle = "Add New Employee";
        return view('user.employee.create', compact('pageTitle'));
    }


    public function store(EmployeeRequest $request)
    {
        $employee = new User();

        if ($request->hasFile('image')) {
            try {
                $path       = getFilePath('employee');
                $employee->image = fileUploader($request->image, $path, getFileSize('employee'));
            } catch (\Exception $exp) {
                $notify[] = ['error','Couldn\'t upload your image'];
                return redirect()->back()->withNotify($notify);
            }
        }

        $employee->name = $request->name;
        $employee ->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->role = Status::USER_ROLE_USER;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->mobile = $request->mobile;
        $employee->save();

        $notify[] = ['success','Employee added successfully'];
        return to_route('user.employee.list')->withNotify($notify);
    }


    public function edit($id)
    {
        $pageTitle = "Employee Update";
        $employee = User::findOrFail($id);
        return view('user.employee.edit', compact('pageTitle', 'employee'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        $employee = User::findOrFail($id);

        if ($request->hasFile('image')) {

            try {
                $old = $employee->image;
                $path       = getFilePath('employee');
                $employee->image = fileUploader($request->image, $path, getFileSize('employee'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error','Couldn\'t upload your image'];
                return redirect()->back()->withNotify($notify);
            }
        }

        $employee->name = $request->name;
        $employee ->email = $request->email;
        $employee->password = $request->password ? Hash::make($request->password) : $employee->password;
        $employee->role = Status::USER_ROLE_USER;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->mobile = $request->mobile;
        $employee->save();

        $notify[] = ['success','Employee updated successfully'];
        return to_route('user.employee.list')->withNotify($notify);
    }

    public function delete($id)
    {
        $employee = User::findOrFail($id);
        if($employee->image != null)
        {
            fileManager()->removeFile(getFilePath('employee') . '/' . $employee->image);
        }
        $employee->delete();

        $notify[] = ['success','Employee deleted successfully'];
        return to_route('user.employee.list')->withNotify($notify);
    }
}
