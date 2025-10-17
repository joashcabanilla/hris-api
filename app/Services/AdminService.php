<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;

//Models
use App\Models\UsertypeModel as UserType;
use App\Models\User;
use App\Models\EmployeeModel as Employee;
use App\Models\EmploymentHistoryModel as EmploymentHistory;
use App\Models\DepartmentListModel as DepartmentList;
use App\Models\PositionListModel as PositionList;
use App\Models\RegionModel as Region;

class AdminService{
    /**
     * Get user type list
     * @param id primary key
     */
    public function getUsertypeList($id = null){
       return $id != null ? UserType::find($id) : UserType::get();
    }

    /**
     * Get user list.
     * @param withTrashed include soft deleted users
     */
    public function getUserList($withTrashed = true){
        $user = User::with(["usertype:id,usertype"])->select("id","usertype_id","prefix","firstname","middlename","lastname","suffix","email","username","status","deleted_at","last_login_at","last_login_ip");
        if($withTrashed){
           $user = $user->withTrashed()->get();
        }else{
            $user = $user->get();
        }
        return $user;
    }

    /**
     * Get employee list. 
     */
    public function getEmployeeList($employeeId){
        //get users data
        $users = User::withTrashed()->get();
        $userList = [];
        foreach($users as $user){
            $userList[$user->id] = [
                "name" => trim(ucwords(strtolower($user->prefix . " " . $user->firstname . " " . $user->lastname . " " . $user->suffix))),
                "profilePicture" => $user->profile_picture 
            ];
        }

        //get department data
        $departments = DepartmentList::get();
        $departmentList = [];
        foreach($departments as $department){
            $departmentList[$department->id] = $department->department;
        }
        
        //get position data
        $positions = PositionList::get();
        $positionList = [];
        foreach($positions as $position){
            $positionList[$position->id] = $position->position;
        }
        
        //get current employment history data
        $employmentHistory = EmploymentHistory::whereNull("end_date")->get();
        $employmentHistoryList = [];
        foreach($employmentHistory as $employment){
            $employmentHistoryList[$employment->employee_id] = [
                "department" => isset($departmentList[$employment->department_id]) ? $departmentList[$employment->department_id] : null,
                "position" => isset($positionList[$employment->position_id]) ? $positionList[$employment->position_id] : null,
                "employmentStatus" => $employment->employment_status
            ];
        }

        //get employee data
        if($employeeId){
            $employees = Employee::where("id",$employeeId)->get();
        }else{
            $employees = Employee::get();
        }
        $employeeList = [];
        foreach($employees as $employee){
            $employeeList[] = [
                "id" => $employee->id,
                "employeeNo" => $employee->employee_no,
                "userId" => $employee->user_id,
                "pbno" => $employee->pb_no,
                "memid" => $employee->memid,
                "name" => $userList[$employee->user_id]["name"],
                "profile_picture" => $userList[$employee->user_id]["profilePicture"],
                "department" => isset($employmentHistoryList[$employee->id]) ? $employmentHistoryList[$employee->id]["department"] : null,
                "position" => isset($employmentHistoryList[$employee->id]) ? $employmentHistoryList[$employee->id]["position"] : null,
                "employmentStatus" => isset($employmentHistoryList[$employee->id]) ? $employmentHistoryList[$employee->id]["employmentStatus"] : null,
                "birthdate" => $employee->birthdate,
                "gender" => $employee->gender,
                "civilStatus" => $employee->civil_status,
                "contactNo" => $employee->contact_number,
                "region" => $employee->region,
                "province" => $employee->province,
                "city" => $employee->city,
                "barangay" => $employee->barangay,
                "address" => $employee->address,
                "zipCode" => $employee->zip_code,
                "emergencyContactName" => $employee->emergency_contact_name,
                "emergencyContactNo" => $employee->emergency_contact_number,
                "dateHired" => $employee->date_hired,
                "dateResigned" => $employee->date_resigned,
                "tin" => $employee->tin,
                "sss" => $employee->sss,
                "pagibig" => $employee->pag_ibig,
                "philhealth" => $employee->philhealth
            ];
        }

        return $employeeList;
    }
    
    /**
     * Get department list 
     */
    public function getDepartmentList(){
        return DepartmentList::get();
    }

    /**
     * Get position list 
     */
    public function getPositionList(){
        return PositionList::get();
    }

    /**
     * Get employment status list 
     */
    public function getEmploymentStatusList(){
        $list = [];
        $data = DB::select("SHOW COLUMNS FROM employment_history WHERE Field = 'employment_status'");
        if (!empty($data)) {
            preg_match("/^enum\((.*)\)$/", $data[0]->Type, $matches);
            $list = str_getcsv($matches[1], ',', "'");
        }

        return $list;
    }

     /**
     * Get civil status list 
     */
    public function getCivilStatusList(){
        $list = [];
        $data = DB::select("SHOW COLUMNS FROM employees WHERE Field = 'civil_status'");
        if (!empty($data)) {
            preg_match("/^enum\((.*)\)$/", $data[0]->Type, $matches);
            $list = str_getcsv($matches[1], ',', "'");
        }

        return $list;
    }

    /**
     * Get region list 
     */
    public function getRegionList(){
        return Region::get();
    }

    /**
     * Update user status
     * @param id user id.
     */
    public function updateUserStatus($id, $status){
        $user = User::withTrashed()->find($id);
        if (!$user) {
            return false;
        }

        if($status == "deactivate"){
            return (bool) $user->delete();
        }

        if($user->trashed()){
            $user->restore();
        }

        return $user->update(['status' => $status]);
    }
}