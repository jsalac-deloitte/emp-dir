<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
       return $this->modelService->getAll($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate($this->modelService->validatePayload());
        DB::beginTransaction();
        try {
            $record = $this->modelService->create($request);
            $response = response()->json(["message" => "New $this->modelAlias saved.", "data" => $record], 201);
            DB::commit();
            return $response;

        } catch(\Exception $ex) {
            DB::rollback();
            return response()->json(["message" => $ex->getMessage()], $ex->statusCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->modelService->requestValidator->rules());
        DB::beginTransaction();
        try {
            $record = $this->modelService->store($request);
            $response = response()->json($record, 201);
            DB::commit();
            return $response;
        } catch(\Exception $ex) {
            Log::info($ex);
            DB::rollback();
            return response()->json(["message" => $ex->getMessage()], $ex->statusCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        try {
            $record = $this->modelService->find($id);
            return response()->json($record, 200);
        }catch(ModelNotFoundException $ex) {
            return response()->json(["message" => "Record not Found!"], 404);
        }  catch(\Exception $ex) {
            return response()->json(["message" => $ex->getMessage()], $ex->statusCode());
        }
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
        $validated = $request->validate($this->modelService->requestValidator->rules($id));
        DB::beginTransaction();
        try {
            $record = $this->modelService->store($request, $id);
            $response = response()->json($record, 200);
            DB::commit();
            return $response;
        }catch(ModelNotFoundException $ex) {
            return response()->json(["message" => "Record not Found!"], 404);
        }  catch(\Exception $ex) {
            return response()->json(["message" => $ex->getMessage()], $ex->statusCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $record = $this->modelService->delete($id);
            if ($record["success"] == true) {
                $response = response()->json($record, 200);
                DB::commit();
                return $response;
            }
        }catch(ModelNotFoundException $ex) {
            return response()->json(["message" => "Record not Found!"], 404);
        }  catch(\Exception $ex) {
            return response()->json(["message" => $ex->getMessage()], $ex->statusCode());
        }
    }

    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function allSoftDeleted(Request $request)
    {
        return $this->modelService->getAllSoftDeleted($request);
    }

    /**
     * Display a listing of the resource.
     * @param  id int
     * @return \Illuminate\Http\Response
     */
    public function findSoftDeleted($id)
    {
        return $this->modelService->findSoftDelete($id);
    }
}
