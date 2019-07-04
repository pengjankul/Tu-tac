<?php

namespace App\Http\Controllers;

use App\DataTables\AccountAssetDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAccountAssetRequest;
use App\Http\Requests\UpdateAccountAssetRequest;
use App\Repositories\AccountAssetRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AccountAssetController extends AppBaseController
{
    /** @var  AccountAssetRepository */
    private $accountAssetRepository;

    public function __construct(AccountAssetRepository $accountAssetRepo)
    {
        $this->accountAssetRepository = $accountAssetRepo;
    }

    /**
     * Display a listing of the AccountAsset.
     *
     * @param AccountAssetDataTable $accountAssetDataTable
     * @return Response
     */
    public function index(AccountAssetDataTable $accountAssetDataTable)
    {
        return $accountAssetDataTable->render('account_assets.index');
    }

    /**
     * Show the form for creating a new AccountAsset.
     *
     * @return Response
     */
    public function create()
    {
        return view('account_assets.create');
    }

    /**
     * Store a newly created AccountAsset in storage.
     *
     * @param CreateAccountAssetRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountAssetRequest $request)
    {
        $input = $request->all();

        $accountAsset = $this->accountAssetRepository->create($input);

        Flash::success('Account Asset saved successfully.');

        return redirect(route('accountAssets.index'));
    }

    /**
     * Display the specified AccountAsset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountAsset = $this->accountAssetRepository->find($id);

        if (empty($accountAsset)) {
            Flash::error('Account Asset not found');

            return redirect(route('accountAssets.index'));
        }

        return view('account_assets.show')->with('accountAsset', $accountAsset);
    }

    /**
     * Show the form for editing the specified AccountAsset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountAsset = $this->accountAssetRepository->find($id);

        if (empty($accountAsset)) {
            Flash::error('Account Asset not found');

            return redirect(route('accountAssets.index'));
        }

        return view('account_assets.edit')->with('accountAsset', $accountAsset);
    }

    /**
     * Update the specified AccountAsset in storage.
     *
     * @param  int              $id
     * @param UpdateAccountAssetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountAssetRequest $request)
    {
        $accountAsset = $this->accountAssetRepository->find($id);

        if (empty($accountAsset)) {
            Flash::error('Account Asset not found');

            return redirect(route('accountAssets.index'));
        }

        $accountAsset = $this->accountAssetRepository->update($request->all(), $id);

        Flash::success('Account Asset updated successfully.');

        return redirect(route('accountAssets.index'));
    }

    /**
     * Remove the specified AccountAsset from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountAsset = $this->accountAssetRepository->find($id);

        if (empty($accountAsset)) {
            Flash::error('Account Asset not found');

            return redirect(route('accountAssets.index'));
        }

        $this->accountAssetRepository->delete($id);

        Flash::success('Account Asset deleted successfully.');

        return redirect(route('accountAssets.index'));
    }
}
