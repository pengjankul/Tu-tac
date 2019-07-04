<?php

namespace App\Http\Controllers;

use App\DataTables\ResearchersDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateResearchersRequest;
use App\Http\Requests\UpdateResearchersRequest;
use App\Repositories\ResearchersRepository;
use Carbon\Carbon;
use Flash;
use Response;

class ResearchersController extends AppBaseController
{
    /** @var  ResearchersRepository */
    private $researchersRepository;

    public function __construct(ResearchersRepository $researchersRepo)
    {
        $this->researchersRepository = $researchersRepo;
    }

    /**
     * Display a listing of the Researchers.
     *
     * @param ResearchersDataTable $researchersDataTable
     * @return Response
     */
    public function index(ResearchersDataTable $researchersDataTable)
    {
        return $researchersDataTable->render('researchers.index');
    }

    /**
     * Show the form for creating a new Researchers.
     *
     * @return Response
     */
    public function create()
    {
        return view('researchers.create');
    }

    /**
     * Store a newly created Researchers in storage.
     *
     * @param CreateResearchersRequest $request
     *
     * @return Response
     */
    public function store(CreateResearchersRequest $request)
    {
        $input = $request->all();

        $input['user_add'] = auth()->user()->id;
        $input['user_update'] = auth()->user()->id;

        $input['datetime_add'] = Carbon::createFromTimestamp(date('now'))->toDateTimeString();
        $input['datetime_update'] = Carbon::createFromTimestamp(date('now'))->toDateTimeString();

        $researchers = $this->researchersRepository->create($input);

        // Flash::success('เพิ่มข้อมูลนักวิจัยเรียบร้อย.');

        // return redirect(route('researchers.index'));
        return response()->json(['responseText' => 'Success!'], 200);
    }

    /**
     * Display the specified Researchers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $researchers = $this->researchersRepository->find($id);

        if (empty($researchers)) {
            Flash::error('Researchers not found');

            return redirect(route('researchers.index'));
        }

        return view('researchers.show')->with('researchers', $researchers);
    }

    /**
     * Show the form for editing the specified Researchers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $researchers = $this->researchersRepository->find($id);

        if (empty($researchers)) {
            Flash::error('Researchers not found');

            return redirect(route('researchers.index'));
        }

        return response()->json(['responseText' => 'Success!', 'data' => $researchers], 200);
    }

    /**
     * Update the specified Researchers in storage.
     *
     * @param  int              $id
     * @param UpdateResearchersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResearchersRequest $request)
    {
        $id = $request->id;
        $researchers = $this->researchersRepository->find($id);

        if (empty($researchers)) {
            return response()->json(['responseText' => 'error!'], 403);
        }

        $input = $request->all();
        $input['user_update'] = auth()->user()->id;
        $input['datetime_update'] = Carbon::createFromTimestamp(date('now'))->toDateTimeString();

        $researchers = $this->researchersRepository->update($input, $id);

        return response()->json(['responseText' => 'Success!'], 200);
    }

    /**
     * Remove the specified Researchers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $researchers = $this->researchersRepository->find($id);

        if (empty($researchers)) {
            Flash::error('Researchers not found');

            return redirect(route('researchers.index'));
        }

        $this->researchersRepository->delete($id);

        Flash::success('Researchers deleted successfully.');

        return redirect(route('researchers.index'));
    }
}
