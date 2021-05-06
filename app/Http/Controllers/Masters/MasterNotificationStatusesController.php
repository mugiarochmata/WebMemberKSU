<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\Masters\CreateMasterNotificationStatusesRequest;
use App\Http\Requests\Masters\UpdateMasterNotificationStatusesRequest;
use App\Repositories\Masters\MasterNotificationStatusesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MasterNotificationStatusesController extends AppBaseController
{
    /** @var  MasterNotificationStatusesRepository */
    private $masterNotificationStatusesRepository;

    public function __construct(MasterNotificationStatusesRepository $masterNotificationStatusesRepo)
    {
        $this->masterNotificationStatusesRepository = $masterNotificationStatusesRepo;
    }

    /**
     * Display a listing of the MasterNotificationStatuses.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $masterNotificationStatuses = $this->masterNotificationStatusesRepository->paginate(20);

        return view('masters.master_notification_statuses.index')
            ->with('masterNotificationStatuses', $masterNotificationStatuses);
    }

    /**
     * Show the form for creating a new MasterNotificationStatuses.
     *
     * @return Response
     */
    public function create()
    {
        return view('masters.master_notification_statuses.create');
    }

    /**
     * Store a newly created MasterNotificationStatuses in storage.
     *
     * @param CreateMasterNotificationStatusesRequest $request
     *
     * @return Response
     */
    public function store(CreateMasterNotificationStatusesRequest $request)
    {
        $input = $request->all();

        $masterNotificationStatuses = $this->masterNotificationStatusesRepository->create($input);

        Flash::success('Master Notification Statuses saved successfully.');

        return redirect(route('masters.masterNotificationStatuses.index'));
    }

    /**
     * Display the specified MasterNotificationStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $masterNotificationStatuses = $this->masterNotificationStatusesRepository->find($id);

        if (empty($masterNotificationStatuses)) {
            Flash::error('Master Notification Statuses not found');

            return redirect(route('masters.masterNotificationStatuses.index'));
        }

        return view('masters.master_notification_statuses.show')->with('masterNotificationStatuses', $masterNotificationStatuses);
    }

    /**
     * Show the form for editing the specified MasterNotificationStatuses.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $masterNotificationStatuses = $this->masterNotificationStatusesRepository->find($id);

        if (empty($masterNotificationStatuses)) {
            Flash::error('Master Notification Statuses not found');

            return redirect(route('masters.masterNotificationStatuses.index'));
        }

        return view('masters.master_notification_statuses.edit')->with('masterNotificationStatuses', $masterNotificationStatuses);
    }

    /**
     * Update the specified MasterNotificationStatuses in storage.
     *
     * @param int $id
     * @param UpdateMasterNotificationStatusesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMasterNotificationStatusesRequest $request)
    {
        $masterNotificationStatuses = $this->masterNotificationStatusesRepository->find($id);

        if (empty($masterNotificationStatuses)) {
            Flash::error('Master Notification Statuses not found');

            return redirect(route('masters.masterNotificationStatuses.index'));
        }

        $masterNotificationStatuses = $this->masterNotificationStatusesRepository->update($request->all(), $id);

        Flash::success('Master Notification Statuses updated successfully.');

        return redirect(route('masters.masterNotificationStatuses.index'));
    }

    /**
     * Remove the specified MasterNotificationStatuses from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $masterNotificationStatuses = $this->masterNotificationStatusesRepository->find($id);

        if (empty($masterNotificationStatuses)) {
            Flash::error('Master Notification Statuses not found');

            return redirect(route('masters.masterNotificationStatuses.index'));
        }

        $this->masterNotificationStatusesRepository->delete($id);

        Flash::success('Master Notification Statuses deleted successfully.');

        return redirect(route('masters.masterNotificationStatuses.index'));
    }
}
