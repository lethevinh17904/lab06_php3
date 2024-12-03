<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Moive;
use App\Models\Gene;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\DB;




class MoiveController extends Controller
{
    public function index()
    {
        $moives = Moive::query()->orderByDesc('id')->paginate(10);
        return view('admin.moives.index', compact('moives'));
    }

    public function create()
    {
        $genes = Gene::all();
        return view('admin.moives.create', compact('genes'));
    }

    public function store( StoreRequest $request)
    {
        $data = $request->except('poster');
        // Upload anh
        if($request->hasFile('poster')){
            $path_poster = $request->file('poster')->store('poster');
            $data['poster'] = $path_poster;
        }
        Moive::query()->create($data);
        return redirect()
            ->route('moives.index')
            ->with('message', 'Thêm dữ liệu thành công');
    }

    public function destroy($id)
    {
        Moive::query()->find($id)->delete();
        return redirect()->route('moives.index')->with('message', 'Xóa dữ liệu thành công');
    }

    public function edit($id)
    {
        $moive = Moive::query()->find($id);
        $genes = Gene::all();
        return view('admin.moives.edit', compact('moive','genes'));
    }

    public function update(StoreRequest $request, $id)
    {
        $moive = Moive::query()->find($id);
        $data = $request->except('poster');
        // Upload anh
        if($request->hasFile('poster')){
            $path_poster = $request->file('poster')->store('poster');
            $data['poster'] = $path_poster;
        }
        $moive->update($data);
        return redirect()->back()->with('message', 'Cập nhật dữ liệu thành công');

    }

    public function detail($id)
    {
        $moive = Moive::query()->find($id);
        $genes = Gene::all();
        return view('admin.moives.detail', compact('moive','genes'));
    }

    public function search(Request $request){
        $genes = Gene::all();
        $query = $request->input('query');
        $moives = Moive::query()->where('title', 'LIKE', "%$query%")->paginate(8);

        return view('admin.moives.index', compact('moives', 'genes'));
    }

}

