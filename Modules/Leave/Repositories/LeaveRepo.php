<?php
namespace Modules\Leave\Repositories;
use Modules\Leave\Entities\Leave;
use Auth;
class LeaveRepo
{
    public function getAll()
    {
        return Leave::orderBy('id','DESC')->paginate(5);
    }
    public function getMyItem()
    {
        return Leave::where('user_id',Auth::user()->id)->paginate(5);
    }
    public function findById($id)
    {
        return Leave::find($id);
    }
    public function count()
    {
        return Leave::count();
    }
    public function delete($id)
    {
        return Leave::find($id)->delete();
    }
    public function store($request)
    {
        if(!empty($request->document)) {
            $fileName = time().'_'.$request->document->getClientOriginalName();
            $filePath = $request->file('document')->storeAs('uploads', $fileName, 'public');
            $document = '/storage/' . $filePath;
            return Leave::create([
                'department_id'     => $request->department_id,
                'user_id'           => Auth::user()->id,
                'from_date'         => $request->from_date,
                'to_date'           => $request->to_date,
                'document'          => $document
            ]);
        }
        else{
            return Leave::create([
                'department_id'     => $request->department_id,
                'user_id'           => Auth::user()->id,
                'from_date'         => $request->from_date,
                'to_date'           => $request->to_date,    
            ]);
        }
    }
    public function update($request)
    {
        if(!empty($request->document))
        { 
            $fileName = time().'_'.$request->document->getClientOriginalName();
            $filePath = $request->file('document')->storeAs('uploads', $fileName, 'public');
            $document = '/storage/' . $filePath;
            $leave =  Leave::find($request->leave_id);
            $result = tap($leave)->update([
                'department_id'     => $request->department_id,
                'user_id'           => Auth::user()->id,
                'date_from'         => $request->date_from,
                'date_to'           => $request->date_to,
                'document'          => $document
            ]);
            return $result;
        }
        else{
            $leave =  Leave::find($request->leave_id);
            $result = tap($leave)->update([
                'department_id'     => $request->department_id,
                'user_id'           => Auth::user()->id,
                'date_from'         => $request->date_from,
                'date_to'           => $request->date_to,
            ]);
            return $result;
        }

    }
}
