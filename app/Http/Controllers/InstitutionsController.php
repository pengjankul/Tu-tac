<?php

namespace App\Http\Controllers;

use App\DataTables\InstitutionsDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateInstitutionsRequest;
use App\Http\Requests\UpdateInstitutionsRequest;
use App\Repositories\InstitutionsRepository;
use Carbon\Carbon;
use Flash;
use Response;

class InstitutionsController extends AppBaseController
{
    /** @var  InstitutionsRepository */
    private $institutionsRepository;

    public function __construct(InstitutionsRepository $institutionsRepo)
    {
        $this->institutionsRepository = $institutionsRepo;
    }

    /**
     * Display a listing of the Institutions.
     *
     * @param InstitutionsDataTable $institutionsDataTable
     * @return Response
     */
    public function index(InstitutionsDataTable $institutionsDataTable)
    {
        return $institutionsDataTable->render('institutions.index');
    }

    /**
     * Show the form for creating a new Institutions.
     *
     * @return Response
     */
    public function create()
    {
        return view('institutions.create');
    }

    /**
     * Store a newly created Institutions in storage.
     *
     * @param CreateInstitutionsRequest $request
     *
     * @return Response
     */
    public function store(CreateInstitutionsRequest $request)
    {
        $input = $request->all();

        $input['user_add'] = auth()->user()->id;
        $input['user_update'] = auth()->user()->id;

        $input['datetime_add'] = Carbon::createFromTimestamp(date('now'))->toDateTimeString();
        $input['datetime_update'] = Carbon::createFromTimestamp(date('now'))->toDateTimeString();

        $institutions = $this->institutionsRepository->create($input);

        return response()->json(['responseText' => 'Success!'], 200);
    }

    /**
     * Display the specified Institutions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $institutions = $this->institutionsRepository->find($id);

        if (empty($institutions)) {
            Flash::error('Institutions not found');

            return redirect(route('institutions.index'));
        }

        return view('institutions.show')->with('institutions', $institutions);
    }

    /**
     * Show the form for editing the specified Institutions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $institutions = $this->institutionsRepository->find($id);

        if (empty($institutions)) {
            Flash::error('Institutions not found');

            return redirect(route('institutions.index'));
        }

        return response()->json(['responseText' => 'Success!', 'data' => $institutions], 200);
    }

    /**
     * Update the specified Institutions in storage.
     *
     * @param  int              $id
     * @param UpdateInstitutionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInstitutionsRequest $request)
    {
        $id = $request->id;
        $institutions = $this->institutionsRepository->find($id);

        if (empty($institutions)) {
            Flash::error('Institutions not found');

            return redirect(route('institutions.index'));
        }

        $input = $request->all();
        $input['user_update'] = auth()->user()->id;
        $input['datetime_update'] = Carbon::createFromTimestamp(date('now'))->toDateTimeString();

        $institutions = $this->institutionsRepository->update($input, $id);

        return response()->json(['responseText' => 'Success!'], 200);
    }

    /**
     * Remove the specified Institutions from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $institutions = $this->institutionsRepository->find($id);

        if (empty($institutions)) {
            Flash::error('Institutions not found');

            return redirect(route('institutions.index'));
        }

        $this->institutionsRepository->delete($id);

        Flash::success('Institutions deleted successfully.');

        return redirect(route('institutions.index'));
    }
}
